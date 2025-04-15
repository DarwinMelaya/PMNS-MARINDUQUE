<?php
// Start Session
session_start();

// Set the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if (empty($_SESSION['id'])) {
    header("Location: ../../../");
    exit();
}

// Include the database connection script
include '../../connection/connection.php';

// Function to sanitize input
function sanitize_input($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}

// Calculate total project cost and amount of assistance
$aoa = floatval($_POST['ps']) + floatval($_POST['moe']) + floatval($_POST['eo']);
$totalprojcost = $aoa + floatval($_POST['cpf']);

$date_updated = date("Y-m-d H:i:s");

// Prepare SQL statement for UPDATE
$sql = "UPDATE projects SET 
    proj_email = ?, project_code = ?, project_type = ?, tag = ?, project_title = ?, 
    project_desc = ?, typeorg = ?, beneficiaries = ?, collaborating_agencies = ?,
    implementor = ?, counterpart_fund = ?, 
    date_released = ?, personal_service = ?, maintenance_other = ?, equip_outlay = ?, 
    modepro = ?, counterpart_desc = ?, street = ?, province = ?, 
    city_mun = ?, barangay = ?, project_fname = ?, project_mname = ?, project_lname = ?, 
    project_sex = ?, project_age = ?, date_approved = ?, liquidated = ?, 
    user_id = ?, date_updated = ?
WHERE project_id = ?";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Sanitize and assign each value to variables before binding
$proj_email = sanitize_input($_POST['proj_email']);
$project_code = sanitize_input($_POST['project_code']);
$project_type = intval($_POST['project_type']);
$tag = sanitize_input($_POST['tag']);
$project_title = sanitize_input($_POST['project_title']);
$project_desc = sanitize_input($_POST['project_desc']);
$typeorg = sanitize_input($_POST['typeorg']);
$beneficiaries = sanitize_input($_POST['beneficiaries']);
$collaborating_agencies = sanitize_input($_POST['collaborating_agencies']);
$implementor = sanitize_input($_POST['implementor']);
$cpf = floatval($_POST['cpf']);
$date_released = sanitize_input($_POST['date_released']);
$ps = floatval($_POST['ps']);
$moe = floatval($_POST['moe']);
$eo = floatval($_POST['eo']);
$modepro = intval($_POST['modepro']);
$counter_desc = sanitize_input($_POST['counterdesc']);
$street = sanitize_input($_POST['street']);
$province = intval($_POST['province']);
$city_mun = intval($_POST['city_mun']);
$barangay = intval($_POST['barangay']);
$project_fname = sanitize_input($_POST['fname']);
$project_mname = sanitize_input($_POST['mname']);
$project_lname = sanitize_input($_POST['lname']);
$project_sex = sanitize_input($_POST['setgender']);
$project_age = intval($_POST['age']);
$date_approved = sanitize_input($_POST['date_approved']);
$liquidated = sanitize_input($_POST['liquidated']);
$user_id = $_SESSION['id'];
$project_id = intval($_POST['project_id']);

// Bind parameters
$stmt->bind_param(
    "ssisssissdsssdddssiiissssisiisi",
    $proj_email,
    $project_code,
    $project_type,
    $tag,
    $project_title,
    $project_desc,
    $typeorg,
    $beneficiaries,
    $collaborating_agencies,
    $implementor,
    $cpf,
    $date_released,
    $ps,
    $moe,
    $eo,
    $modepro,
    $counter_desc,
    $street,
    $province,
    $city_mun,
    $barangay,
    $project_fname,
    $project_mname,
    $project_lname,
    $project_sex,
    $project_age,
    $date_approved,
    $liquidated,
    $user_id,
    $date_updated,
    $project_id
);


// Execute the statement
if ($stmt->execute()) {
    header("Location: ../frontend/setup_masterlist.php");
    exit();
} else {
    error_log("Update failed: (" . $stmt->errno . ") " . $stmt->error);
    echo "An error occurred while updating the project. Please try again.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
