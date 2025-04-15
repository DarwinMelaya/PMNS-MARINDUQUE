<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if (empty($_SESSION['id'])) {
    header("Location: ../../../");
    exit(); // Stop further execution
}

// Include the database connection php script
include '../../connection/connection.php';

// Get data from the URL parameters

$sp_name = $_GET['sp_name'];
$sp_other_service = $_GET['sp_other_service'];
$sp_designation = $_GET['sp_designation'];
$sp_expertise = $_GET['sp_expertise'];
$sp_product_line = $_GET['sp_product_line'];
$sp_fname = $_GET['sp_fname'];
$sp_mname = $_GET['sp_mname'];
$sp_lname = $_GET['sp_lname'];
$sp_email = $_GET['sp_email'];
$sp_website = $_GET['sp_website'];
$sp_phone = $_GET['sp_phone'];
$sp_mobile = $_GET['sp_mobile'];
$sp_address = $_GET['street'] . "," . $_GET['barangay'] . "," . $_GET['city_mun'] . "," . $_GET['province'];
$sp_id = $_GET['sp_id'];
$date_encoded = date("Y-m-d H:i:s");

// Prepare SQL query to update data in the database
$sql = "UPDATE psi_service_providers SET sp_name=?, 
sp_other_service=?, 
sp_designation=?,
sp_expertise=?, 
sp_product_line=?,
sp_fname=?, 
sp_mname=?, 
sp_lname=?, 
sp_email=?, 
sp_website=?, 
sp_phone=?, 
sp_mobile=?, 
sp_address=?,
date_encoded=? WHERE sp_id=?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssiissi",
    $sp_name,
    $sp_other_service,
    $sp_designation,
    $sp_expertise,
    $sp_product_line,
    $sp_fname,
    $sp_mname,
    $sp_lname,
    $sp_email,
    $sp_website,
    $sp_phone,
    $sp_mobile,
    $sp_address,
    $date_encoded,
    $sp_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/supplier_list.php");
    exit(); // Stop further execution
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
