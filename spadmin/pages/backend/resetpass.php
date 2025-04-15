<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../../../");
include '../../../cms/connection/connection.php';
$def_pass = "dost4b";
$sql = "UPDATE users SET `password`  = '" . password_hash(sha1($def_pass), PASSWORD_BCRYPT, ['cost' => 12]) . "'  WHERE user_id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    sleep(3);
    header("Location: ../frontend/list_user.php?reset=success");
}
mysqli_close($conn);
