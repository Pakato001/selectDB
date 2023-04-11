<?php 

// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "pakachon01";
$dbName = "testdb";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db -> connect_error){
    die("Connection Failed: " . $db->connect_error);
}

?>