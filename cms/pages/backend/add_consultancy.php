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

// Set checkbox values (1 if checked, 0 if not)
$senior = isset($_GET['senior']) ? 1 : 0;
$pwd = isset($_GET['pwd']) ? 1 : 0;
$ip = isset($_GET['ip']) ? 1 : 0;

// SQL query to insert data into the database
$sql = "INSERT INTO consultancies (consultancy_type, consultant_name, consultancy_start, consultancy_end, consultancy_cost,
no_male, no_female, no_sr, no_ip, firm_name,
proprietor, contact_no, gender, street,
province, city_mun, barangay, prod_line, sector, 
user_id, date_encoded, is_senior, is_pwd, is_ip) 
VALUES 
(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssiiiiisssssissssisiii",
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
    $_GET['proprietor'],
    $_GET['contact_no'],
    $_GET['sex'],
    $_GET['street'],
    $_GET['province'],
    $_GET['city_mun'],
    $_GET['barangay'],
    $_GET['prod_line'],
    $_GET['sector'],
    $_SESSION['id'],
    $date_encoded,
    $senior,
    $pwd,
    $ip
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
