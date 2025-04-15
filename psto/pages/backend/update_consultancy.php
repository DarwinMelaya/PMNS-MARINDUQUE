<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';


$date_encoded = date("Y-m-d | H:i:s");

// SQL query to insert data into the database
$sql = "UPDATE consultancies SET consultancy_type=?, consultant_name=?, consultancy_start=?, consultancy_end=?, consultancy_cost=?,
no_male=?, no_female=?, no_sr=?, no_ip=?, firm_name=?,
propietor=?, contact_no=?, gender=?, street=?, district=?,
province=?, city_mun=?, barangay=?, prod_line=?, sectors=?, 
user_id=?, date_encoded=? where consultancy_id=?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssiiiiissiisiiiissisi",
    $_GET['consultancy_type'],
    $_GET['consultant_name'],
    $_GET['duration_from'],
    $_GET['duration_to'],
    $_GET['amount'],
    $_GET['male'],
    $_GET['female'],
    $_GET['sr'],
    $_GET['ip'],
    $_GET['firm_name'],
    $_GET['propietor'],
    $_GET['contact_no'],
    $_GET['sex'],
    $_GET['street'],
    $_GET['district'],
    $_GET['province'],
    $_GET['city_mun'],
    $_GET['barangay'],
    $_GET['prod_line'],
    $_GET['sector'],
    $_SESSION['id'],
    $date_encoded,
    $_GET['consult_id']
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/consultancy_masterlist.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
