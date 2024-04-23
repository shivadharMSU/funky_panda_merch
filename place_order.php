<?php
session_start();
include 'db_connect.php';

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get payment method and customer ID from session
    $payment_method = $_POST['payment_method'];
    $customer_id = $_SESSION['user_id'];

    // Fetch cart items from the form
    $sql_cart_ids = "SELECT cart_id FROM cart WHERE customer_id = ?";
    $stmt_cart_ids = $conn->prepare($sql_cart_ids);
    $stmt_cart_ids->bind_param("i", $customer_id);
    $stmt_cart_ids->execute();
    $result_cart_ids = $stmt_cart_ids->get_result();

    // Initialize array to store cart IDs
    $cart_ids = [];

    // Store fetched cart IDs in the array
    while ($row = $result_cart_ids->fetch_assoc()) {
        $cart_ids[] = $row['cart_id'];
    }

    // Initialize total purchase cost
    $total_purchase_cost = 0;

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Insert data into purchases table
        $sql_purchase = "INSERT INTO purchases (customer_id, total_purchase_cost, purchase_method) 
                         VALUES (?, ?, ?)";
        $stmt_purchase = $conn->prepare($sql_purchase);
        $stmt_purchase->bind_param("ids", $customer_id, $total_purchase_cost, $payment_method);
        $stmt_purchase->execute();

        // Get the last inserted purchase ID
        $purchase_id = $conn->insert_id;

        // Insert data into purchase_product table for each cart item
        $sql_purchase_product = "INSERT INTO purchase_product (purchase_id, product_id, quantity) 
                                 VALUES (?, ?, ?)";
        $stmt_purchase_product = $conn->prepare($sql_purchase_product);

        foreach ($cart_ids as $cart_id) {
            $sql_cart_item = "SELECT product_id, quiantity FROM cart WHERE cart_id = ?";
            $stmt_cart_item = $conn->prepare($sql_cart_item);
            $stmt_cart_item->bind_param("i", $cart_id);
            $stmt_cart_item->execute();
            $result_cart_item = $stmt_cart_item->get_result();
            $cart_item = $result_cart_item->fetch_assoc();

            $product_id = $cart_item['product_id'];
            $quantity = $cart_item['quiantity'];

            // Calculate total purchase cost
            $sql_product_price = "SELECT price FROM product WHERE product_id = ?";
            $stmt_product_price = $conn->prepare($sql_product_price);
            $stmt_product_price->bind_param("i", $product_id);
            $stmt_product_price->execute();
            $result_product_price = $stmt_product_price->get_result();
            $product_price = $result_product_price->fetch_assoc()['price'];
            $total_purchase_cost += $quantity * $product_price;

            // Insert purchase_product record
            $stmt_purchase_product->bind_param("iii", $purchase_id, $product_id, $quantity);
            $stmt_purchase_product->execute();

            // Delete cart item
            $sql_delete_cart_item = "DELETE FROM cart WHERE cart_id = ?";
            $stmt_delete_cart_item = $conn->prepare($sql_delete_cart_item);
            $stmt_delete_cart_item->bind_param("i", $cart_id);
            $stmt_delete_cart_item->execute();
        }

        // Update total purchase cost in purchases table
        $sql_update_total_cost = "UPDATE purchases SET total_purchase_cost = ? WHERE purchase_id = ?";
        $stmt_update_total_cost = $conn->prepare($sql_update_total_cost);
        $stmt_update_total_cost->bind_param("di", $total_purchase_cost, $purchase_id);
        $stmt_update_total_cost->execute();

        // Commit transaction
        $conn->commit();

        // Redirect to a success page or display a success message
        header("Location: order_success.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
