<?php
session_start();
include 'db_connect.php';

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if cart_id is provided via POST
if (isset($_POST['cart_id'])) {
    $cart_id = $_POST['cart_id'];

    // Delete the record from the cart table
    $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the cart page
        header("Location: cart.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect back to the cart page if cart_id is not provided
    header("Location: cart.php");
    exit();
}

$conn->close();
?>
