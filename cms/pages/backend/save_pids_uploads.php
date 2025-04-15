<?php
// Database connection
include '../../connection/connection.php';
date_default_timezone_set('Asia/Manila');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
    // File variables
    $fileName = $_FILES["pdfFile"]["name"];
    $fileTmpName = $_FILES["pdfFile"]["tmp_name"];
    $fileType = $_FILES["pdfFile"]["type"];
    
    // Validate PDF file
    if ($fileType != "application/pdf") {
        echo "Only PDF files are allowed.";
        exit();
    }

    // Encrypt the file name using SHA-256
    $encryptedFileName = hash('sha256', $fileName) . '.pdf';

    // Parameters to insert into table
    $doc_id = $_POST["documentTitle"]; // Assuming you are using the name "documentTitle" for the select
    $project_id = $_POST["project_id"];
    $date_time_now = date("Y-m-d H:i:s");

    // Move the uploaded file to the server with the encrypted name
    $uploadDir = '../uploads/'; // Ensure this directory exists and has appropriate permissions
    if (!move_uploaded_file($fileTmpName, $uploadDir . $encryptedFileName)) {
        echo "Failed to move uploaded file.";
        exit();
    }

    // Insert data into `pidocs_uploads` table
    $stmt = $conn->prepare("INSERT INTO pidocs_uploads (doc_id, file_name, project_id, date_time_uploaded, date_time_updated) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $doc_id, $encryptedFileName, $project_id, $date_time_now, $date_time_now);

    if ($stmt->execute()) {
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
        } elseif ($project_type == 2) {
            header("Location: ../frontend/view_project_setup.php?id=" . $project_id);
        }
        elseif ($project_type == 3) {
            header("Location: ../frontend/view_project_cest.php?id=" . $project_id);
        }
        elseif ($project_type == 4) {
            header("Location: ../frontend/view_project_sscp.php?id=" . $project_id);
        } else {
            echo "Invalid project type.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
