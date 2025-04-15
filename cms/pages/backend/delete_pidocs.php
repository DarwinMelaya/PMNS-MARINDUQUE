<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../connection/connection.php';
$sql1 = "SELECT * from projects where project_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $project_type = $row['project_type'];
    }
}
$sql = "DELETE FROM pidocs_uploads WHERE upload_id='" . $_GET['uid'] . "'";
if (mysqli_query($conn, $sql)) {
    switch ($project_type) {
        case '1':
            header("Location: ../frontend/view_project_gia.php?id=".$_GET['id']);
            break;
        case '2':
            header("Location: ../frontend/view_project_setup.php?id=".$_GET['id']);
            break;
        case '3':
            header("Location: ../frontend/view_project_cest.php?id=".$_GET['id']);
            break;
        case '4':
            header("Location: ../frontend/view_project_sscp.php?id=".$_GET['id']);
            break;
        default:
            break;
    }
}
mysqli_close($conn);
?> 