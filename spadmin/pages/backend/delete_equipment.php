<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../connection/connection.php';
$sql = "DELETE FROM psi_equipment WHERE eqp_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    header("Location: ../frontend/equipment_list.php");
}
mysqli_close($conn);
