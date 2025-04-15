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
$sql = "INSERT INTO projects (project_code, project_type,tag,project_title, project_desc, typeorg, beneficiaries,collaborating_agencies,
implementor,total_project_cost, amount_assist, counterpart_fund, date_fund_rel, personal_service, maintenance_other, equip_outlay, modepro,
counterpart_desc, street, district, province, city_mun, barangay, project_fname, project_mname, project_lname, project_sex, project_age,
date_approved,liquidated,user_id, date_encoded)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$date_encoded = date("Y-m-d | H:i:s");
$aoa = $_GET['ps'] + $_GET['moe'] + $_GET['eo'];
$totalprojcost = $aoa + $_GET['cpf'];
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(

    "sisssiiiiiiisiiiissiiiisssiisiis",
    $_GET['project_code'],
    $_GET['project_type'],
    $_GET['tag'],
    $_GET['project_title'],
    $_GET['project_desc'],
    $_GET['typeorg'],
    $_GET['beneficiaries'],
    $_GET['collaborating_agencies'],
    $_GET['implementor'],
    $totalprojcost,
    $aoa,
    $_GET['cpf'],
    $_GET['date_fund_rel'],
    $_GET['ps'],
    $_GET['moe'],
    $_GET['eo'],
    $_GET['modepro'],
    $_GET['counterdesc'],
    $_GET['street'],
    $_GET['district_id'],
    $_GET['province'],
    $_GET['city_mun'],
    $_GET['barangay'],
    $_GET['fname'],
    $_GET['mname'],
    $_GET['lname'],
    $_GET['setgender'],
    $_GET['age'],
    $_GET['date_approved'],
    $_GET['liquidated'],
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
