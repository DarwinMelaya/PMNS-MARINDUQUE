<?php
// Start Session (Assuming it's used for identifying the cooperative to update)
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users (Optional, adjust based on your logic)
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the database connection php script
include '../../connection/connection.php';

$coop_id = $_GET['coop_id']; // Assuming you have a coop_id to identify the record
$coop_name = $_GET['coop_name'];
$coop_year_established = $_GET['coop_year_established'];
$coop_reg_dti = $_GET['coop_reg_dti'];
$coop_reg_dti_date = $_GET['coop_reg_dti_date'];
$coop_p_fname = $_GET['coop_p_fname'];
$coop_p_mname = $_GET['coop_p_mname'];
$coop_p_lname = $_GET['coop_p_lname'];
$coop_phone = $_GET['coop_phone'];
$coop_mobile = $_GET['coop_mobile'];
$coop_email = $_GET['coop_email'];
$coop_website = $_GET['coop_website'];
$coop_address = $_GET['street'] . "," . $_GET['barangay'] . " " . $_GET['city_mun'] . " " . $_GET['province'];
$date_encoded = date("Y-m-d | H:i:s");

// SQL query to update data in the database
$sql = "UPDATE psi_cooperators SET 
  coop_name = ?,
  coop_year_established = ?,
  coop_reg_dti = ?,
  coop_reg_dti_date = ?,
  coop_p_fname = ?,
  coop_p_mname = ?,
  coop_p_lname = ?,
  coop_phone = ?,
  coop_mobile = ?,
  coop_email = ?,
  coop_website = ?,
  coop_address = ?,
  date_encoded = ?
WHERE coop_id = ?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sisssssiissssi",
    $coop_name,
    $coop_year_established,
    $coop_reg_dti,
    $coop_reg_dti_date,
    $coop_p_fname,
    $coop_p_mname,
    $coop_p_lname,
    $coop_phone,
    $coop_mobile,
    $coop_email,
    $coop_website,
    $coop_address,
    $date_encoded,
    $coop_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/customer_list.php"); // Redirect after successful update
} else {
    echo "Error: " . $conn->error; // Improved error handling, avoid exposing query
}

// Close statement and connection
$stmt->close();
$conn->close();
