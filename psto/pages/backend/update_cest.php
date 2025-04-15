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
$project_id = $_GET['project_id'];
$project_type = $_GET['project_type'];
$proj_code = $_GET['project_code'];
$project_title = $_GET['project_title'];
$province = $_GET['province'];
$city_mun = $_GET['city_mun'];
$barangay = $_GET['barangay'];
$district = $_GET['district'];
$street = $_GET['street'];
$date_approved = $_GET['date_approved'];
$project_desc = $_GET['desc'];
$duration_from = $_GET['duration_from'];
$duration_to = $_GET['duration_to'];
$proponent = $_GET['proponent'];
$personal_service = $_GET['ps'];
$maintenance_other = $_GET['moe'];
$equip_outlay = $_GET['eo'];
$modepro = $_GET['modepro'];
$amount_assist = $_GET['aoa'];
$counterpart_fund = $_GET['cpf'];
$date_fund_rel = $_GET['date_fund_rel'];
$total_project_cost = $_GET['totalprojcost'];
$counterpart_desc = $_GET['counterdesc'];
$beneficiaries = $_GET['beneficiaries'];
$type_of_beneficiaries = $_GET['type_bene'];
$no_household = $_GET['no_of_household'];
$no_individual = $_GET['no_of_individual'];
$project_entry_point = $_GET['proj_entry'];


// Prepare SQL query to update data in the database
$sql = "UPDATE projects SET project_id=?, project_type=?, project_code=?, project_title=?, province=?,city_mun=?,barangay=?,district=?,street=?,date_approved=?,
project_desc=?, duration_from=?, duration_to=?,proponent=?, personal_service=?, maintenance_other=?,equip_outlay=?,modepro=?,amount_assist=?,
counterpart_fund=?, date_fund_rel=?, total_project_cost=?,counterpart_desc=? , beneficiaries=?,type_of_beneficiaries=?,no_household=?, no_individual=?,project_entry_point=?,
user_id=?, date_updated=? WHERE project_id=?";

$date_updated = date("Y-m-d H:i:s");
// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "iissiiiissssssiiiiiisisiiiiiisi",
    $project_id,
    $project_type,
    $proj_code,
    $project_title,
    $province,
    $city_mun,
    $barangay,
    $district,
    $street,
    $date_approved,
    $project_desc,
    $duration_from,
    $duration_to,
    $proponent,
    $personal_service,
    $maintenance_other,
    $equip_outlay,
    $modepro,
    $amount_assist,
    $counterpart_fund,
    $date_fund_rel,
    $total_project_cost,
    $counterpart_desc,
    $beneficiaries,
    $type_of_beneficiaries,
    $no_household,
    $no_individual,
    $project_entry_point,
    $_GET['id'],
    $date_updated,
    $project_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/cest_masterlist.php");
    exit(); // Stop further execution
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
