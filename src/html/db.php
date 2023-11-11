<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suivi";

// Create a connection to the database using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>