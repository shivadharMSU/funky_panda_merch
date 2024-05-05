<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_details WHERE user_name = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $row['login_user_type'];
        $_SESSION['user_id'] = $row['login_user_id'];
        if ($row['login_user_type'] == "customer") {
            header("Location: welcome.php");
        } else {
            header("Location: admin.php");
        }
        
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: #343a40;  */
            color: #ffffff; 
            padding-top: 50px;
        }
        .login-container {
            background-color: black; 
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
        <h1 style="color: black; text-align: center;">Welcome Funky Panda Merch</h1>

            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                            <label for="">User name</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
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
