<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignmentdb";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}