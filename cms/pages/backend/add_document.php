<?php
    switch ($_GET['project_type']) {
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
?>
