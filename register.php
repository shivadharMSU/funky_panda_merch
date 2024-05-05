<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_customer = "INSERT INTO customer (first_name, last_name, mobile, email, address, age, gender) 
                     VALUES ('$first_name', '$last_name', '$mobile', '$email', '$address', '$age', '$gender')";
    $conn->query($sql_customer);
    $customer_id = $conn->insert_id; 

    $sql_login = "INSERT INTO login_details (user_name, password, login_user_type, login_user_id) 
                  VALUES ('$username', '$password', 'customer', '$customer_id')";
    $conn->query($sql_login);

    header("Location: login.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            color: #ffffff; 
            padding-top: 50px;
        }
        .registration-container {
            background-color: #212529; 
            padding: 20px;
            border-radius: 10px;
        }
        .form-control {
            background-color: #343a40; 
            color: #ffffff; 
            border: 1px solid #ffffff; 
        }
        .btn-primary {
            background-color: #000000; 
            border-color: #000000; 
        }
        .btn-primary:hover {
            background-color: #212529; 
            border-color: #212529; 
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
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="mb-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                        </div>
                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" placeholder="Gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
