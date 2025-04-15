<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../../cms/connection/connection.php';

$sql = "UPDATE users SET `status`  = '1', `attempts` = '0'  WHERE user_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    sleep(3);
    header("Location: ../frontend/list_user.php?unlock=success");
}
mysqli_close($conn);
