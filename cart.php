<?php
session_start();
include 'db_connect.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['user_id'];
$sql = "SELECT cart.cart_id, cart.product_id, cart.quiantity, product.name FROM cart INNER JOIN product ON cart.product_id = product.product_id WHERE cart.customer_id = $customer_id";

$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529; 
        }
        .navbar {
            background-color: #000000; 
        }
        .navbar-brand {
            color: #ffffff !important; 
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important; 
        }
        .navbar-nav .nav-link.active {
            color: #000000 !important; 
            background-color: #ffffff !important; 
        }
        .company-section {
            background-color: #ffffff; 
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            height: 100px; 
            width: auto; 
            object-fit: cover; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="welcome.php">Funky Panda Merch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Shopping Cart</h2>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="res/img<?php echo $product['product_id']; ?>.jpeg" class="card-img-top" alt="Product Image">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <p>Quantity: <?php echo $product['quiantity']; ?></p>
                                    <form action="update_cart.php" method="post">
                                        <input type="number" name="quantity" value="<?php echo $product['quiantity']; ?>">
                                        <input type="hidden" name="cart_id" value="<?php echo $product['cart_id']; ?>">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <form action="remove_from_cart.php" method="post">
                                        <input type="hidden" name="cart_id" value="<?php echo $product['cart_id']; ?>">
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <div class="row">
   
    <div class="col-md-6">
        <form action="place_order.php" method="POST">
        <label for="paymentMethod">Select Payment Method:</label>
            <select class="form-control" id="paymentMethod" name="payment_method">
                <option value="card">Card</option>
                <option value="cash">Cash on Delivery</option>
            </select>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</div>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
