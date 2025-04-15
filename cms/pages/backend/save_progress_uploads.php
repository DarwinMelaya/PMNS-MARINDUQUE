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
    $report_id = $_POST["documentTitle"]; // Assuming you are using the name "documentTitle" for the select
    $project_id = $_POST["project_id"];
    $date_time_now = date("Y-m-d H:i:s");
    $completion_rate = $_POST["completion_rate"];
    $utilization_rate = $_POST["utilization_rate"];
    $as_of_date = $_POST["as_of_date"];

    //For the extension
    $duration_from = $_POST["duration_from"];
    $duration_to= $_POST["duration_to"];

    //For the realignment
    $counterpart = $_POST["counterpart"];
    $ps= $_POST["ps"];
    $mooe = $_POST["mooe"];
    $eo= $_POST["eo"];

    // Move the uploaded file to the server with the encrypted name
    $uploadDir = '../uploads/'; // Ensure this directory exists and has appropriate permissions
    if (!move_uploaded_file($fileTmpName, $uploadDir . $encryptedFileName)) {
        echo "Failed to move uploaded file.";
        exit();
    }

    // Insert data into `pidocs_uploads` table
    $stmt = $conn->prepare("INSERT INTO progress_uploads (report_id, file_name, project_id, completion_rate, utilization_rate, as_of_date, date_time_uploaded, date_time_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issddsss", $report_id, $encryptedFileName, $project_id, $completion_rate, $utilization_rate, $as_of_date, $date_time_now, $date_time_now);

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
            if($report_id == '19'){
                $stmt = $conn->prepare("UPDATE projects set revised_duration = 'yes', updated_duration_from = ?, updated_duration_to = ? where project_id = ?");
                $stmt->bind_param("ssi", $duration_from, $duration_to, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            if($report_id == '18'){
                $stmt = $conn->prepare("UPDATE projects set realigned_budget = 'yes', realigned_counterpart_fund = ?, realigned_personal_service = ?, realigned_maintenance_other = ?, realigned_equip_outlay = ? where project_id = ?");
                $stmt->bind_param("ddddi", $counterpart, $ps, $mooe, $eo, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_gia.php?id=" . $project_id);
        }elseif ($project_type == 2) {
                if($report_id == '19'){
                    $stmt = $conn->prepare("UPDATE projects set revised_duration = 'yes', updated_duration_from = ?, updated_duration_to = ? where project_id = ?");
                    $stmt->bind_param("ssi", $duration_from, $duration_to, $project_id);
                    $stmt->execute();
                    $stmt->close();
                }
                if($report_id == '18'){
                    $stmt = $conn->prepare("UPDATE projects set realigned_budget = 'yes', realigned_counterpart_fund = ?, realigned_personal_service = ?, realigned_maintenance_other = ?, realigned_equip_outlay = ? where project_id = ?");
                    $stmt->bind_param("ddddi", $counterpart, $ps, $mooe, $eo, $project_id);
                    $stmt->execute();
                    $stmt->close();
                }
                header("Location: ../frontend/view_project_setup.php?id=" . $project_id);
            } elseif ($project_type == 3) {
            if($report_id == '19'){
                $stmt = $conn->prepare("UPDATE projects set revised_duration = 'yes', updated_duration_from = ?, updated_duration_to = ? where project_id = ?");
                $stmt->bind_param("ssi", $duration_from, $duration_to, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            if($report_id == '18'){
                $stmt = $conn->prepare("UPDATE projects set realigned_budget = 'yes', realigned_counterpart_fund = ?, realigned_personal_service = ?, realigned_maintenance_other = ?, realigned_equip_outlay = ? where project_id = ?");
                $stmt->bind_param("ddddi", $counterpart, $ps, $mooe, $eo, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_cest.php?id=" . $project_id);
        } elseif ($project_type == 4) {
            if($report_id == '19'){
                $stmt = $conn->prepare("UPDATE projects set revised_duration = 'yes', updated_duration_from = ?, updated_duration_to = ? where project_id = ?");
                $stmt->bind_param("ssi", $duration_from, $duration_to, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            if($report_id == '18'){
                $stmt = $conn->prepare("UPDATE projects set realigned_budget = 'yes', realigned_counterpart_fund = ?, realigned_personal_service = ?, realigned_maintenance_other = ?, realigned_equip_outlay = ? where project_id = ?");
                $stmt->bind_param("ddddi", $counterpart, $ps, $mooe, $eo, $project_id);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: ../frontend/view_project_sscp.php?id=" . $project_id);
        }else {
            echo "Invalid project type.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
