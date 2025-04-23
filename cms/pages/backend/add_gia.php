<?php
session_start();
date_default_timezone_set('Asia/Manila');

// Redirect if not authenticated
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: ../../../");
    exit();
}

include '../../connection/connection.php';

$sql = "INSERT INTO projects (
    proj_email, project_type, investment_map, project_code, tag, project_title, 
    province, city_mun, barangay, street, project_desc, 
    duration_from, duration_to, proponent, collaborating_agencies, sector, 
    counterpart_fund, personal_service, maintenance_other, 
    equip_outlay, modepro, counterpart_desc, user_id, date_approved, date_released, 
    beneficiaries, type_of_beneficiaries, no_household, no_individual, 
    beneficiary_remarks, date_encoded
) 
VALUES (
    ?, ?, ?, ?, ?, ?, 
    ?, ?, ?, ?, ?, 
    ?, ?, ?, ?, ?, 
    ?, ?, ?, 
    ?, ?, ?, ?, ?, ?, 
    ?, ?, ?, ?, ?, 
    ?
)";

$date_encoded = date("Y-m-d H:i:s");

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$proj_email = $_GET['proj_email'] ?? null;
$project_type = intval($_GET['project_type'] ?? 0);
$investment_map = $_GET['investment_map'] ?? null;
$project_code = $_GET['project_code'] ?? null;
$tag = $_GET['tag'] ?? null;
$project_title = $_GET['project_title'] ?? null;
$province = $_GET['province'] ?? null;
$city_mun = $_GET['city_mun'] ?? null;
$barangay = $_GET['barangay'] ?? null;
$street = $_GET['street'] ?? null;
$project_desc = $_GET['project_desc'] ?? null; // fixed from prog_desc
$duration_from = $_GET['duration_from'] ?? null;
$duration_to = $_GET['duration_to'] ?? null;
$proponent = $_GET['proponent'] ?? null;
$collab = $_GET['collab'] ?? null;
$sector = $_GET['sector'] ?? null;
$counterpart_fund = floatval($_GET['cpf'] ?? 0.0);
$personal_service = floatval($_GET['ps'] ?? 0.0);
$maintenance_other = floatval($_GET['moe'] ?? 0.0);
$equip_outlay = floatval($_GET['eo'] ?? 0.0);
$modepro = $_GET['modepro'] ?? null;
$counterdesc = $_GET['counterdesc'] ?? null;
$user_id = intval($_SESSION['id'] ?? 0);
$date_approved = $_GET['date_approved'] ?? null;
$date_released = $_GET['date_released'] ?? null;
$beneficiaries = $_GET['beneficiaries'] ?? null;
$type_of_beneficiaries = $_GET['type_bene'] ?? null;
$no_household = intval($_GET['no_of_household'] ?? 0);
$no_individual = intval($_GET['no_of_individual'] ?? 0);
$beneficiary_remarks = $_GET['beneficiary_remarks'] ?? null;

$stmt->bind_param(
    "sissssssssssssssddddssissssiiss",
    $proj_email,
    $project_type,
    $investment_map,
    $project_code,
    $tag,
    $project_title,
    $province,
    $city_mun,
    $barangay,
    $street,
    $project_desc,
    $duration_from,
    $duration_to,
    $proponent,
    $collab,
    $sector,
    $counterpart_fund,
    $personal_service,
    $maintenance_other,
    $equip_outlay,
    $modepro,
    $counterdesc,
    $user_id,
    $date_approved,
    $date_released,
    $beneficiaries,
    $type_of_beneficiaries,
    $no_household,
    $no_individual,
    $beneficiary_remarks,
    $date_encoded
);

if ($stmt->execute()) {
    error_log("Project added successfully");
    header("Location: add_document.php?user_id=" . urlencode($_SESSION['id']) . "&project_type=" . urlencode($project_type));
    exit();
} else {
    error_log("Error adding project: " . $stmt->error);
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
