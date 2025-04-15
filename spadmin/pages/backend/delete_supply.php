<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../connection/connection.php';
$sql = "DELETE FROM psi_service_providers WHERE sp_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location: ../frontend/supplier_list.php");
}
mysqli_close($conn);
