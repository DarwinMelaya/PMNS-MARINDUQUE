<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

// Get form data
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
$date_encoded = date("Y-m-d | H:i:s");

// Prepare SQL statement
$sql = "INSERT INTO psi_service_providers (sp_name, sp_other_service, sp_designation, sp_expertise, sp_product_line,
 sp_fname, sp_mname, sp_lname, sp_email, sp_website, 
 sp_phone, sp_mobile, sp_address, date_encoded)
VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?,? ,?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssiiss",
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
    $date_encoded
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/supplier_list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
