<?php
// Database configuration
$servername = "localhost"; // Usually "localhost" if the database is on the same server
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "db_mybucket"; // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
