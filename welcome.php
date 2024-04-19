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
                        <a class="nav-link" href="#">Logout</a>
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
                    <li class="list-group-item"><a href="#" class="nav-link">Categories</a></li>
                    <li class="list-group-item"><a href="#" class="nav-link">Purchase History</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="company-section">
                    <h2>About Funky Panda Merch</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero ac augue volutpat vehicula. Integer id mi id elit suscipit consectetur. Nulla eu nibh euismod, tempus felis sed, sagittis ipsum. Proin eu mi nec sapien finibus tempor. Duis interdum venenatis vestibulum.</p>
                    <p>Proin in ultrices ipsum, id rutrum metus. Sed ac urna orci. Vivamus at risus eget ligula vestibulum viverra. Cras aliquam libero in gravida tincidunt. Curabitur lobortis, lectus vel aliquet accumsan, felis elit finibus arcu, a luctus neque libero eget justo.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>