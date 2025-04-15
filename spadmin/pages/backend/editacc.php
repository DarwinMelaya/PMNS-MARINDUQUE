<?php
session_start();
date_default_timezone_set('Asia/Manila');
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../../cms/connection/connection.php';

$sql = "UPDATE users SET username=?,user_fname=?, user_lname=?, email=?, province=?, status=?, access_level=?,
        date_updated=? WHERE user_id=?";

$date_updated = date("Y-m-d | H:i:s");
$email = base64_encode($_GET['email']);
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssiiisi",
    $_GET['username'],
    $_GET['fname'],
    $_GET['lname'],
    $email,
    $_GET['province'],
    $_GET['status'],
    $_GET['access'],
    $date_updated,
    $_GET['user_id'] // Assuming 'project_id' is passed in the GET parameters for identifying the record to update
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/list_user.php");
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
