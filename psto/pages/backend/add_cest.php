<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if ($_SESSION['id'] == "") header("Location:../../../");

// Include the  database connection php script
include '../../connection/connection.php';

// Prepare SQL statement
$sql = "INSERT INTO projects (project_type, project_code, project_title, province, city_mun,
barangay, district, street, date_approved, project_desc,
duration_from, duration_to, proponent, total_project_cost, amount_assist,
counterpart_fund, date_fund_rel, personal_service, maintenance_other, equip_outlay,
modepro, counterpart_desc, beneficiaries, type_of_beneficiaries, no_household,
no_individual, project_entry_point, user_id, date_encoded)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$date_encoded = date("Y-m-d | H:i:s");
$aoa = $_GET['ps'] + $_GET['moe'] + $_GET['eo'];
$totalprojcost = $aoa + $_GET['cpf'];
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(

    "issiiiissssssiiisiiiissiiiiis",
    $_GET['project_type'],
    $_GET['project_code'],
    $_GET['project_title'],
    $_GET['province'],
    $_GET['city_mun'],
    $_GET['barangay'],
    $_GET['district'],
    $_GET['street'],
    $_GET['date_approved'],
    $_GET['desc'],
    $_GET['duration_from'],
    $_GET['duration_to'],
    $_GET['proponent'],
    $totalprojcost,
    $aoa,
    $_GET['cpf'],
    $_GET['date_fund_rel'],
    $_GET['ps'],
    $_GET['moe'],
    $_GET['eo'],
    $_GET['modepro'],
    $_GET['counterdesc'],
    $_GET['beneficiaries'],
    $_GET['type_bene'],
    $_GET['no_of_household'],
    $_GET['no_of_individual'],
    $_GET['proj_entry'],
    $_SESSION['id'],
    $date_encoded
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/cest_masterlist.php");
} else {
    echo "Error: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
