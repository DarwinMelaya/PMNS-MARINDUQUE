<?php
// Start Session
session_start();

// Get the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if (empty($_SESSION['id'])) {
    header("Location: ../../../");
    exit(); // Stop further execution
}

// Include the database connection php script
include '../../connection/connection.php';

// Get data from the URL parameters
$project_type = $_GET['project_type'];
$project_code = $_GET['project_code'];
$project_title = $_GET['project_title'];
$province = $_GET['province'];
$city_mun = $_GET['city_mun'];
$barangay = $_GET['barangay'];
$district = $_GET['district'];
$street = $_GET['district'];
$prog_desc = $_GET['prog_desc'];
$duration_from = $_GET['duration_from'];
$duration_to = $_GET['duration_to'];
$proponent = $_GET['proponent'];
$collab = $_GET['collab'];
$beneficiaries = $_GET['beneficiaries'];
$sector = $_GET['sector'];
$total_project_cost = $_GET['totalprojcost'];
$amount_assist = $_GET['aoa'];
$counterpart_fund = $_GET['cpf'];
$date_fund_rel = $_GET['date_fund_rel'];
$personal_service = $_GET['ps'];
$maintenance_other = $_GET['moe'];
$equip_outlay = $_GET['eo'];
$modepro = $_GET['modepro'];
$counterdesc = $_GET['counterdesc'];
$project_id = $_GET['proj_id'];


// Prepare SQL query to update data in the database
$sql = "UPDATE projects SET project_code=?, project_type=?, project_title=?, duration_from=?, 
duration_to=?, beneficiaries=?, collaborating_agencies=?, proponent=?, sector=?, district=?, street=?,
province=?, city_mun=?, barangay=?,total_project_cost=?, amount_assist=?, counterpart_fund=?, personal_service=?,
maintenance_other=?, equip_outlay=?, modepro=?, counterpart_desc=?, user_id=?, date_updated=? WHERE project_id=?";

$date_updated = date("Y-m-d H:i:s");
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sisssiisiisiiiiiiiiiisisi",
    $project_code,
    $project_type,
    $project_title,
    $duration_from,
    $duration_to,
    $beneficiaries,
    $collab,
    $proponent,
    $sector,
    $district,
    $street,
    $province,
    $city_mun,
    $barangay,
    $total_project_cost,
    $amount_assist,
    $counterpart_fund,
    $personal_service,
    $maintenance_other,
    $equip_outlay,
    $modepro,
    $counterpart_desc,
    $_GET['id'],
    $date_updated,
    $project_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/gia_masterlist.php");
    exit(); // Stop further execution
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
