<?php
$servername = "localhost";
// $username = "pmns";
$username = "root";
// $password = "dost4bpmns";
$password = "";
$dbname = "pmns_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
