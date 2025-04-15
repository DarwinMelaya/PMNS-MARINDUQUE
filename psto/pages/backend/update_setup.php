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
$project_code = $_GET['project_code'];
$tag = $_GET['tag'];
$proj_title = $_GET['project_title'];
$project_desc = $_GET['project_desc'];
$typeorg = $_GET['typeorg'];
$bene = $_GET['beneficiaries'];
$collab = $_GET['collaborating_agencies'];
$implementor = $_GET['implementor'];
$total_project_cost = $_GET['totalprojcost'];
$amount_assist = $_GET['aoa'];
$counterpar_fund = $_GET['cpf'];
$date_fund_rel = $_GET['date_fund_rel'];
$personal_service = $_GET['ps'];
$maintenance_other = $_GET['moe'];
$equip_outlay = $_GET['eo'];
$modepro = $_GET['modepro'];
$counterpart_desc = $_GET['counterdesc'];
$street = $_GET['street'];
$district = $_GET['district_id'];
$province = $_GET['province'];
$city_mun = $_GET['city_mun'];
$brgy = $_GET['barangay'];
$fname = $_GET['fname'];
$mname = $_GET['mname'];
$lname = $_GET['lname'];
$sex = $_GET['setgender'];
$age = $_GET['age'];
$liquidated = $_GET['liquidated'];
$date_approved = $_GET['date_approved'];

$date_updated = date("Y-m-d H:i:s");

// Prepare SQL query to update data in the database
$sql = "UPDATE projects SET project_id=?, project_code=?, tag=?, project_title=?, project_desc=?, typeorg=? beneficiaries=?, collaborating_agencies=?, total_project_cost=?, amount_assist=?, counterpart_fund=?, date_fund_rel=?, personal_service=?, maintenance_other=?, equip_outlay=?, modepro=?, counterpat_desc=?, street=?, district=?, province=?, city_mun=?, barangay=?, project_fname=?, project_mname=?, project_lname=?, project_sex=?, liquidated=?, date_approved=?,  user_id=?, date_updated=? WHERE project_id=?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "iissssiiiiiiisiiiisiiiiisssiiisisi",
    $project_id,
    $project_type,
    $project_code,
    $tag,
    $proj_title,
    $project_desc,
    $typeorg,
    $bene,
    $collab,
    $implementor,
    $total_project_cost,
    $amount_assist,
    $counterpar_fund,
    $date_fund_rel,
    $personal_service,
    $maintenance_other,
    $equip_outlay,
    $modepro,
    $counterpart_desc,
    $street,
    $district,
    $province,
    $city_mun,
    $brgy,
    $fname,
    $mname,
    $lname,
    $sex,
    $age,
    $liquidated,
    $date_approved,
    $_SESSION['id'],
    $date_updated,
    $consultancy_id
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/setup_masterlist.php");
    exit(); // Stop further execution
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
