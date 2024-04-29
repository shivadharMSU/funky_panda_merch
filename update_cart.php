<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['cart_id'])) {
    
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE `cart` SET `quiantity`= $quantity WHERE `cart_id` = $cart_id";
   
    if ($conn->query($sql) === TRUE) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: cart.php");
    exit();
}

$conn->close();
?>
