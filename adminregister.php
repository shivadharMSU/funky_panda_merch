<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $designation = $_POST['designation'];
   
    $username = $_POST['username'];
    $password = $_POST['password'];


          $sql_customer  = "INSERT INTO `employee`( `name`, `mobile`, `email`, `salary`,`designation_id`)
                      VALUES ('$name','$mobile','$email','$salary','$designation')";
    echo $sql_customer;
    $conn->query($sql_customer);
    $customer_id = $conn->insert_id; 


    $sql_login = "INSERT INTO login_details (user_name, password, login_user_type, login_user_id) 
                  VALUES ('$username', '$password', 'employee', '$customer_id')";
                  
    $conn->query($sql_login);

  
    header("Location: login.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees Registration</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #343a40; 
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
                    <h2>Employee Registration</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="First Name">
                        </div>
                       
                        <div class="mb-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="salary" placeholder="Salary">
                        </div>
                        
                        <!-- <div class="mb-3">
                            <input type="text" class="form-control" name="gender" placeholder="Gender">
                        </div> -->
                        
                         <div class="mb-3">
                            <label for="designation">Designation</label>
                            <select class="form-control" name="designation" placeholder="Designation">
                                <option value="1">Admin</option>
                                <option value="2">Employee</option>
                            </select>
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