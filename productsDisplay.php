<?php
session_start();
include 'db_connect.php';

// Check if user is not logged in, redirect to login page
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if category_id is provided in the URL
if(isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    // Fetch products for the given category_id from the database
    $sql = "SELECT * FROM product WHERE category_id = $category_id";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
} else {
    // Redirect to index page if category_id is not provided
    header("Location: index.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Display</title>
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
            height: 200px; /* Adjust height as needed */
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
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Products Display</h2>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="res/img<?php echo $product['product_id']; ?>.jpeg" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text">Description: <?php echo $product['description']; ?></p>
                            <p class="card-text">Color: <?php echo $product['color']; ?></p>
                            <p class="card-text">Price: <?php echo $product['price']; ?></p>
                            <form action="add_to_cart.php" method="post">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                                </div>
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $product['category_id']; ?>">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
