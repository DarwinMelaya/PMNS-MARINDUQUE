<?php
// Start Session
session_start();

// POST the actual date in Manila
date_default_timezone_set('Asia/Manila');

// Remove unauthorized users
if (empty($_SESSION['id'])) {
    header("Location: ../../../");
    exit(); // Stop further execution
}

// Include the database connection php script
include '../../connection/connection.php';

// POST data from the URL parameters
$project_email = $_POST['proj_email'];
$project_type = $_POST['project_type'];
$project_code = $_POST['project_code'];
$tag = $_POST['tag'];
$project_title = $_POST['project_title'];
$province = $_POST['province'];
$city_mun = $_POST['city_mun'];
$barangay = $_POST['barangay'];
$street = $_POST['street'];
$date_approved = $_POST['date_approved'];
$prog_desc = $_POST['prog_desc'];
$duration_from = $_POST['duration_from'];
$duration_to = $_POST['duration_to'];
$proponent = $_POST['proponent'];
$collab = $_POST['collab'];
$investment_map = $_POST['investment_map'];
$counterpart_fund = $_POST['cpf'];
$date_fund_rel = $_POST['date_released'];
$personal_service = $_POST['ps'];
$maintenance_other = $_POST['moe'];
$equip_outlay = $_POST['eo'];
$eo_details = $_POST['eo_details'];
$modepro = $_POST['modepro'];
$counterdesc = $_POST['counterdesc'];
$project_id = $_POST['project_id'];
$sector = $_POST['sector'];

$beneficiaries = mysqli_real_escape_string($conn, $_POST['beneficiaries']);
$type_bene = mysqli_real_escape_string($conn, $_POST['type_bene']);
$no_of_household = mysqli_real_escape_string($conn, $_POST['no_of_household']);
$no_of_individual = mysqli_real_escape_string($conn, $_POST['no_of_individual']);
$beneficiary_remarks = mysqli_real_escape_string($conn, $_POST['beneficiary_remarks']);

// Sanitize input data
$project_email = mysqli_real_escape_string($conn, $project_email);
$project_code = mysqli_real_escape_string($conn, $project_code);
$tag = mysqli_real_escape_string($conn, $tag);
$project_title = mysqli_real_escape_string($conn, $project_title);
$province = mysqli_real_escape_string($conn, $province);
$city_mun = mysqli_real_escape_string($conn, $city_mun);
$barangay = mysqli_real_escape_string($conn, $barangay);
$street = mysqli_real_escape_string($conn, $street);
$prog_desc = mysqli_real_escape_string($conn, $prog_desc);
$duration_from = mysqli_real_escape_string($conn, $duration_from);
$duration_to = mysqli_real_escape_string($conn, $duration_to);
$proponent = mysqli_real_escape_string($conn, $proponent);
$collab = mysqli_real_escape_string($conn, $collab);
$investment_map = mysqli_real_escape_string($conn, $investment_map);
$counterdesc = mysqli_real_escape_string($conn, $counterdesc);
$date_fund_rel = mysqli_real_escape_string($conn, $date_fund_rel);
$eo_details = mysqli_real_escape_string($conn, $eo_details);

$date_updated = date("Y-m-d H:i:s");

// Add this near the top of the file after getting POST data
echo "Equipment Outlay Details: " . $_POST['eo_details']; // For debugging

// Updated SQL query with correct number of parameters
$sql = "UPDATE projects SET 
        proj_email=?,
        project_code=?,
        tag=?,
        project_type=?,
        investment_map=?,
        sector=?,
        project_title=?,
        project_desc=?,
        duration_from=?,
        duration_to=?,
        collaborating_agencies=?,
        proponent=?,
        street=?,
        province=?,
        city_mun=?,
        barangay=?,
        date_approved=?,
        counterpart_fund=?,
        personal_service=?,
        maintenance_other=?,
        equip_outlay=?,
        eo_details=?,
        modepro=?,
        counterpart_desc=?,
        date_released=?,
        beneficiaries=?,
        type_of_beneficiaries=?,
        no_household=?,
        no_individual=?,
        beneficiary_remarks=?,
        date_updated=?
        WHERE project_id=?";

// Prepare and bind parameters - updated with correct number of types
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssisssssssssssssddddssssssiissi",  // Exactly 31 type definitions
    $project_email,      // s
    $project_code,       // s
    $tag,       // s
    $project_type,       // i
    $investment_map,     // s
    $sector,            // s
    $project_title,      // s
    $prog_desc,         // s
    $duration_from,      // s
    $duration_to,        // s
    $collab,            // s
    $proponent,         // s
    $street,            // s
    $province,          // s
    $city_mun,          // s
    $barangay,          // s
    $date_approved,     // s
    $counterpart_fund,  // d
    $personal_service,  // d
    $maintenance_other, // d
    $equip_outlay,     // d
    $eo_details,       // s
    $modepro,          // s
    $counterdesc,      // s
    $date_fund_rel,    // s
    $beneficiaries,    // s
    $type_bene,        // s
    $no_of_household,  // i
    $no_of_individual, // i
    $beneficiary_remarks, // s
    $date_updated,     // s
    $project_id        // i
);

// Execute statement
if ($stmt->execute()) {
    header("Location: ../frontend/edit_gia.php?id=".$project_id."&s=1");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>