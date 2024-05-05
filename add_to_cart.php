<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['quantity']) && isset($_POST['product_id'])) {
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['user_id'];
    $category_id = $_POST['category_id'];
    $sql = "INSERT INTO cart (product_id, customer_id, quiantity) VALUES ('$product_id', '$customer_id', '$quantity')";

    if ($conn->query($sql) === TRUE) {
           
            header("Location: productsDisplay.php?category_id=$category_id");
           
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>
