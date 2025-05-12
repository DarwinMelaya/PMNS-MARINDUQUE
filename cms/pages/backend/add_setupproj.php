<?php
// Start Session
session_start();

// POST the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

// Get email from the form
$project_email = isset($_POST['email']) ? $_POST['email'] : '';

// Calculate totals from arrays with proper decimal handling
$setup_amounts = isset($_POST['setup_amount']) ? $_POST['setup_amount'] : array();
$counterpart_amounts = isset($_POST['counterpart_amount']) ? $_POST['counterpart_amount'] : array();

// Calculate totals without using number_format initially
$eo = 0;
foreach ($setup_amounts as $amount) {
    $eo += (float)str_replace(',', '', $amount);
}

$cpf = 0;
foreach ($counterpart_amounts as $amount) {
    $cpf += (float)str_replace(',', '', $amount);
}

// Prepare SQL statement
$sql = "INSERT INTO projects (proj_email, project_code, project_type, tag, project_title, project_desc, 
    typeorg, beneficiaries, collaborating_agencies, implementor, counterpart_fund, 
    date_released, personal_service, maintenance_other, equip_outlay, modepro,
    counterpart_desc, street, province, city_mun, barangay, project_fname, 
    project_mname, project_lname, project_sex, project_age,
    date_approved, liquidated, user_id, date_encoded)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$date_encoded = date("Y-m-d | H:i:s");

// Prepare and bind parameters
$stmt = $conn->prepare($sql);

// Don't format the numbers until the final binding
$ps = (float)$_POST['ps'];
$moe = (float)$_POST['moe'];

$stmt->bind_param(
    "ssisssisssdsdddissiiisssiisiis",
    $project_email,
    $_POST['project_code'],
    $_POST['project_type'],
    $_POST['tag'],
    $_POST['project_title'],
    $_POST['project_desc'],
    $_POST['typeorg'],
    $_POST['beneficiaries'],
    $_POST['collaborating_agencies'],
    $_POST['implementor'],
    $cpf,  // Direct float value
    $_POST['date_released'],
    $ps,   // Direct float value
    $moe,  // Direct float value
    $eo,   // Direct float value
    $_POST['modepro'],
    $_POST['counterdesc'],
    $_POST['street'],
    $_POST['province'],
    $_POST['city_mun'],
    $_POST['barangay'],
    $_POST['fname'],
    $_POST['mname'],
    $_POST['lname'],
    $_POST['setgender'],
    $_POST['age'],
    $_POST['date_approved'],
    $_POST['liquidated'],
    $_SESSION['id'],
    $date_encoded
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/setup_masterlist.php");
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
