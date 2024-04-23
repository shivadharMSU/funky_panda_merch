<?php
session_start();
include 'db_connect.php';

// Check if user is not logged in, redirect to login page
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch products from cart for the logged-in customer
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            color: #212529; /* Black text */
        }
        .navbar {
            background-color: #000000; /* Black navbar background */
        }
        .navbar-brand {
            color: #ffffff !important; /* White text for navbar brand */
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important; /* White text for navbar links */
        }
        .navbar-nav .nav-link.active {
            color: #000000 !important; /* Black text for active navbar link */
            background-color: #ffffff !important; /* White background for active navbar link */
        }
        .company-section {
            background-color: #ffffff; /* White background */
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            height: 100px; /* Adjust height as needed */
            width: auto; /* Adjust width as needed */
            object-fit: cover; /* Cover the entire card */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Funky Panda Merch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase History</a>
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
                                    <p>Quantity: <?php echo $product['quantity']; ?></p>
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
        <div class="form-group">
            <label for="paymentMethod">Select Payment Method:</label>
            <select class="form-control" id="paymentMethod" name="payment_method">
                <option value="card">Card</option>
                <option value="cash">Cash on Delivery</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <form action="place_order.php" method="POST">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
