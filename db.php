<?php

$host = "localhost";  // Change if needed
$user = "root";       // DB Username
$pass = "";           // DB Password
$dbname = "skyhightrip";   // Database Name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>