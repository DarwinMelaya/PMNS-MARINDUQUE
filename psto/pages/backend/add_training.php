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

// Prepare SQL statement
$sql = "INSERT INTO trainings (training_title, charging_program, charge_remark, amount_training, resource_fname, 
resource_mname, resource_lname, resource_designation, resource_agency, dateconducted,
resource_venue, participant_name, participant_address, dost_assist_firm_male, dost_assist_firm_female,
nondost_assist_firm_male, nondost_assist_firm_female, coop_male, coop_female, startup_male,
startup_female, individual_male, individual_female, academe_male, academe_female, 
government_male, government_female, pwd_participants, sr_participants, ipe, 
user_id, date_encoded)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sisisssssssssiiiiiiiiiiiiiiiiiis",
    $_GET['training_title'],
    $_GET['charging'],
    $_GET['charge_remarks'],
    $_GET['amount_training'],
    $_GET['resource_fname'],
    $_GET['resource_mname'],
    $_GET['resource_lname'],
    $_GET['resource_designation'],
    $_GET['resource_agency'],
    $_GET['dateconducted'],
    $_GET['resource_venue'],
    $_GET['participant_name'],
    $_GET['participant_address'],
    $_GET['dost_assist_firm_male'],
    $_GET['dost_assist_firm_female'],
    $_GET['nondost_assist_firm_male'],
    $_GET['nondost_assist_firm_female'],
    $_GET['coop_male'],
    $_GET['coop_female'],
    $_GET['startup_male'],
    $_GET['startup_female'],
    $_GET['individual_male'],
    $_GET['individual_female'],
    $_GET['academe_male'],
    $_GET['academe_female'],
    $_GET['government_male'],
    $_GET['government_female'],
    $_GET['pwd'],
    $_GET['senior'],
    $_GET['ipe'],
    $_SESSION['id'],
    $date_encoded
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/training_masterlist.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
