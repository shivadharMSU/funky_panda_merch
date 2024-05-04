<?php
session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <img src="res/applogoblack.jpeg" alt="panda logo" width="80" height="70">

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
        <div class="row">
            <div class="col-md-3">
                <br>
                <ul class="list-group">
                    <li class="list-group-item active"><a href="#" class="nav-link active">Home</a></li>
                    <li class="list-group-item"><a href="categories.php" class="nav-link">Categories</a></li>
                    <li class="list-group-item"><a href="#" class="nav-link">Purchase History</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                
            <div class="company-section">
    <h2>About Chunkey Panda Merch</h2>
    <p>Welcome to Chunkey Panda Merch!</p>
    <p>At Chunkey Panda Merch, we're more than just an online store – we're a haven for fans of the beloved Kung Fu Panda series. Since our launch on April 30th, 2024, we've been dedicated to bringing the magic of Po and his friends to life through an exciting array of clothing, accessories, home decor, and more.</p>
    <p>Our journey began with a passion for the timeless story of a panda who dreams of becoming a Kung Fu master. Inspired by the warmth, humor, and wisdom of the films, we set out to create a space where fans like us could find unique, high-quality merchandise to celebrate their love for the franchise.</p>
    <p>What sets Chunkey Panda Merch apart is our commitment to excellence in both product and service. Each item in our collection is carefully curated, ensuring that it meets our standards of quality, authenticity, and craftsmanship. Whether you're searching for a cozy hoodie featuring Po's iconic grin or a stylish mug adorned with your favorite characters, you'll find it here.</p>
    <p>But our dedication doesn't stop with our products – it extends to our customers as well. We strive to provide an exceptional shopping experience, from the moment you browse our website to the day your order arrives at your doorstep. With secure payment options, fast shipping, and responsive customer support, we're here to make your journey with Chunkey Panda Merch as smooth and enjoyable as possible.</p>
    <p>As fellow fans of Kung Fu Panda, we understand the joy that comes from surrounding yourself with reminders of the adventures, lessons, and friendships found in the films. Whether you're treating yourself or searching for the perfect gift for a fellow fan, we invite you to explore our collection and join us in celebrating the spirit of Chunkey Panda.</p>
    <p>Thank you for choosing Chunkey Panda Merch – where every purchase brings a little piece of the Valley of Peace into your world.</p>
</div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
