<?php

$servername = "localhost"; 
$username = "pandaroot";
$password = "pandapassword";
$dbname = "funky_panda_merch";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo 'connection establishbest failed';
    die("Connection failed: " . $conn->connect_error);
}
?>
