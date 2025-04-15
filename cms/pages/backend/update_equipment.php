<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

$eqp_id = $_GET['eqp_id'];
$eqp_specs = $_GET['eqp_specs'];
$eqp_property_no = $_GET['eqp_property_no'];
$eqp_qty = $_GET['eqp_qty'];
$eqp_amount_approved = $_GET['eqp_amount_approved'];
$type_eqp = $_GET['type_eqp'];
$eqp_receipt_no = $_GET['eqp_receipt_no'];
$eqp_warranty = $_GET['eqp_warranty'];
$eqp_receipt_date = $_GET['eqp_receipt_date'];
$eqp_date_tagged = $_GET['eqp_date_tagged'];
$eqp_remarks = $_GET['eqp_remarks'];
$eqp_spec_acquired = $_GET['eqp_spec_acquired'];
$brand_id = $_GET['brand_id'];
$eqp_amount_acquired = $_GET['eqp_amount_acquired'];
$eqp_qty_acquired = $_GET['eqp_qty_acquired'];
$eqp_acquired = $_GET['eqp_acquired'];
$date_encoded = date("Y-m-d | H:i:s");

$sql = "UPDATE psi_equipment SET 
eqp_specs = ?, 
eqp_property_no = ?, 
eqp_qty = ?, 
eqp_amount_approved = ?, 
type_eqp = ?, 
eqp_receipt_no = ?, 
eqp_warranty = ?, 
eqp_receipt_date = ?, 
eqp_date_tagged = ?, 
eqp_remarks = ?, 
eqp_specs_acquired = ?, 
brand_name = ?, 
eqp_amount_acquired = ?, 
eqp_qty_acquired = ?, 
eqp_acquired = ?, 
date_encoded = ? 
WHERE eqp_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssisisssssssiiisi",
    $eqp_specs,
    $eqp_property_no,
    $eqp_qty,
    $eqp_amount_approved,
    $type_eqp,
    $eqp_receipt_no,
    $eqp_warranty,
    $eqp_receipt_date,
    $eqp_date_tagged,
    $eqp_remarks,
    $eqp_spec_acquired,
    $brand_id,
    $eqp_amount_acquired,
    $eqp_qty_acquired,
    $eqp_acquired,
    $date_encoded,
    $eqp_id
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/equipment_list.php");
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
