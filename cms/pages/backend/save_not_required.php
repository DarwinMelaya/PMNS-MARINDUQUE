<?php
// Database connection
include '../../connection/connection.php';
date_default_timezone_set('Asia/Manila');

$doc_id = $_POST["documentTitle"]; // Assuming you are using the name "documentTitle" for the select
$project_id = $_POST["project_id"];

// Insert data into `pidocs_uploads` table
$stmt = $conn->prepare("INSERT INTO pidocs_uploads (doc_id, file_name, project_id, date_time_uploaded, date_time_updated) VALUES (?, ?, ?, ?, ?)");

// Set static values for placeholders
$file_name = 'N/A';
$date_time_uploaded = 'N/A';
$date_time_updated = 'N/A';

// Correct bind_param with 5 placeholders
$stmt->bind_param("issss", $doc_id, $file_name, $project_id, $date_time_uploaded, $date_time_updated);

if ($stmt->execute()) {
    // Close the statement after execution
    $stmt->close();

    // Fetch the `project_type` for the specified `project_id`
    $stmt = $conn->prepare("SELECT project_type FROM projects WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $stmt->bind_result($project_type);
    $stmt->fetch();
    $stmt->close();

    // Redirect based on `project_type`
    if ($project_type == 1) {
        header("Location: ../frontend/view_project_gia.php?id=" . $project_id);
        exit();
    } elseif ($project_type == 2) {
        header("Location: ../frontend/view_project_setup.php?id=" . $project_id);
        exit();
    } elseif ($project_type == 3) {
        header("Location: ../frontend/view_project_cest.php?id=" . $project_id);
        exit();
    } elseif ($project_type == 4) {
        header("Location: ../frontend/view_project_sscp.php?id=" . $project_id);
        exit();
    } else {
        echo "Invalid project type.";
    }
} else {
    // Show error if the query fails
    echo "Error: " . $stmt->error;
}

// Close the connection
$conn->close();
?>
