<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch registration form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert customer details into customer table
    $sql_customer = "INSERT INTO customer (first_name, last_name, mobile, email, address, age, gender) 
                     VALUES ('$first_name', '$last_name', '$mobile', '$email', '$address', '$age', '$gender')";
    $conn->query($sql_customer);
    $customer_id = $conn->insert_id; // Get the last inserted customer ID

    // Insert login details into login_details table
    $sql_login = "INSERT INTO login_details (user_name, password, login_user_type, login_user_id) 
                  VALUES ('$username', '$password', 'customer', '$customer_id')";
    $conn->query($sql_login);

    // Redirect to login page
    header("Location: login.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #343a40; /* Black background */
            color: #ffffff; /* White text */
            padding-top: 50px;
        }
        .registration-container {
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
            <div class="col-md-6">
                <div class="registration-container">
                    <h2>Customer Registration</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="age" placeholder="Age">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="gender" placeholder="Gender">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
