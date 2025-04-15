<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

$col_name = $_GET['col_name'];
$col_abbr = $_GET['col_abbr'];
$ot_id = $_GET['ot_id'];
$col_id = $_GET['col_id'];
$date_encoded = date("Y-m-d | H:i:s");

// SQL query to insert data into the database
$sql = "UPDATE psi_collaborators SET col_name=?, col_abbr=?, ot_id=?, date_encoded=? where col_id=?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssisi",
    $col_name,
    $col_abbr,
    $ot_id,
    $date_encoded,
    $col_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/collaborator_list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
