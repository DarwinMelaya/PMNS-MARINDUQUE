<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location:../../../");
    exit;
}

if (!isset($_GET['id']) || !isset($_GET['uid'])) {
    die("Required parameters are missing.");
}

include '../../connection/connection.php';

// Securely fetch project type
$stmt = $conn->prepare("SELECT project_type FROM projects WHERE project_id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($project_type);
$stmt->fetch();
$stmt->close();

if (empty($project_type)) {
    die("Project not found.");
}

// Fetch report ID
$stmt = $conn->prepare("SELECT report_id FROM progress_uploads WHERE upload_id = ?");
$stmt->bind_param("i", $_GET['uid']);
$stmt->execute();
$stmt->bind_result($report_id);
$stmt->fetch();
$stmt->close();

// Delete upload record
$stmt = $conn->prepare("DELETE FROM progress_uploads WHERE upload_id = ?");
$stmt->bind_param("i", $_GET['uid']);
$stmt->execute();
$stmt->close();

if ($stmt) {
    switch ($project_type) {
        case '1': // Handle GIA
            if ($report_id == '19') {
                $stmt = $conn->prepare("UPDATE projects SET revised_duration = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            if ($report_id == '18') {
                $stmt = $conn->prepare("UPDATE projects SET realigned_budget = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_gia.php?id=" . $_GET['id']);
            break;

        case '2': // Handle SETUP
            if ($report_id == '19') {
                $stmt = $conn->prepare("UPDATE projects SET revised_duration = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            if ($report_id == '18') {
                $stmt = $conn->prepare("UPDATE projects SET realigned_budget = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_setup.php?id=" . $_GET['id']);
            break;

        case '3': // Handle CEST
            if ($report_id == '19') {
                $stmt = $conn->prepare("UPDATE projects SET revised_duration = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            if ($report_id == '18') {
                $stmt = $conn->prepare("UPDATE projects SET realigned_budget = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_cest.php?id=" . $_GET['id']);
            break;

        case '4': // Handle SSCP
            if ($report_id == '19') {
                $stmt = $conn->prepare("UPDATE projects SET revised_duration = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            if ($report_id == '18') {
                $stmt = $conn->prepare("UPDATE projects SET realigned_budget = 'no' WHERE project_id = ?");
                $stmt->bind_param("i", $_GET['id']);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_sscp.php?id=" . $_GET['id']);
            break;

        default:
            header("Location: ../frontend/dashboard.php");
            break;
    }
} else {
    die("Failed to delete the upload.");
}

$conn->close();
?>
