<?php
// Database connection configuration
$servername = "localhost";     // Server hostname 
$username = "root";             // Database username
$password = "";                 // Database password 
$database = "hau_store";        // Database name

// Create a mysqli connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
