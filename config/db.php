
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershop_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}           

// Set the character set to UTF-8
$conn->set_charset("utf8mb4");

?>
