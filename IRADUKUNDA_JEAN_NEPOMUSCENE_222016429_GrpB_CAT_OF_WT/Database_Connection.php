<?php
// Connection details
$host = "localhost";
$user = "nepomuscene";
$pass = "222016429";
$database = "stock_management_system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>