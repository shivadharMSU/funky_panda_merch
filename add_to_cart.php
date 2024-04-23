<?php
session_start();
include 'db_connect.php';

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if quantity and product_id are provided
if(isset($_POST['quantity']) && isset($_POST['product_id'])) {
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['user_id'];
    
    // Insert data into cart table
    $sql = "INSERT INTO cart (product_id, customer_id, quiantity) VALUES ('$product_id', '$customer_id', '$quantity')";
   echo $sql;
    if ($conn->query($sql) === TRUE) {
        // Redirect to productsDisplay.php with category_id
           
            header("Location: productsDisplay.php?category_id=$customer_id");
           
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect to index page if data is missing
    header("Location: index.php");
    exit();
}

$conn->close();
?>
