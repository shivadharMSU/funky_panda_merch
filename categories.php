<?php
session_start();
include 'db_connect.php';

// Check if logout request is made
if(isset($_GET['logout'])) {
    // Destroy session data
    session_destroy();
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Fetch categories from the database
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#" class="nav-link active">Home</a></li>
                    <li class="list-group-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="list-group-item"><a href="#" class="nav-link">Purchase History</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php foreach ($categories as $category) : ?>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="productsDisplay.php?category_id=<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></a></h5>
                                    <!-- You can add more information here if needed -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
