<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch login form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check login credentials
    $sql = "SELECT * FROM login_details WHERE user_name = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $row['login_user_type'];
        $_SESSION['user_id'] = $row['login_user_id'];
        header("Location: welcome.php");
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #343a40; /* Black background */
            color: #ffffff; /* White text */
            padding-top: 50px;
        }
        .login-container {
            background-color: #212529; /* Dark grey background */
            padding: 20px;
            border-radius: 10px;
        }
        .form-control {
            background-color: #343a40; /* Black input field */
            color: #ffffff; /* White text */
            border: 1px solid #ffffff; /* White border */
        }
        .btn-primary {
            background-color: #000000; /* Black button */
            border-color: #000000; /* Black border */
        }
        .btn-primary:hover {
            background-color: #212529; /* Dark grey hover color */
            border-color: #212529; /* Dark grey hover color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <?php if(isset($error)) echo '<div class="text-danger">' . $error . '</div>'; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>