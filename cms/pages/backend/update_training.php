<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

$sp_id = $_GET['sp_id'];
$date_encoded = date("Y-m-d H:i:s");

// Prepare SQL query to update data in the database
$sql = "UPDATE psi_service_providers SET sp_name=?, 

date_encoded=? WHERE sp_id=?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "i",

    $sp_id
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/edit_training.php");
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
