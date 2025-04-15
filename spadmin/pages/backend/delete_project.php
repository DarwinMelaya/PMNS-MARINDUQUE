<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../../cms/connection/connection.php';
$sql1 = "SELECT * from projects where project_id='" . $_GET['id'] . "'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $project_type = $row['project_type'];
    }
}
$sql = "DELETE FROM projects WHERE project_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    switch ($project_type) {
        case '1':
            header("Location: ../frontend/gia_masterlist.php");
            break;
        case '2':
            header("Location: ../frontend/setup_masterlist.php");
            break;
        case '3':
            header("Location: ../frontend/cest_masterlist.php");
            break;
        case '4':
            header("Location: ../frontend/sscp_masterlist.php");
            break;
        default:
            break;
    }
}
mysqli_close($conn);
