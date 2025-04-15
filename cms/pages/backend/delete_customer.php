<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../connection/connection.php';
$sql = "DELETE FROM psi_cooperators WHERE coop_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    sleep(3);
    header("Location: ../frontend/customer_list.php");
}
mysqli_close($conn);
