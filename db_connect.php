<?php

$servername = "localhost"; // Assuming your MySQL server is on the same machine
$username = "pandaroot";
$password = "pandapassword";
$dbname = "funky_panda_merch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo 'connection establishbest failed';
    die("Connection failed: " . $conn->connect_error);
}
?>
