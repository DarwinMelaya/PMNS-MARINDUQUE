<?php
include '../../../connection/connection.php';
if (!empty($_POST["id"])) {
    $holder = $_POST["id"];
    $select_category = "SELECT * FROM citymun WHERE province_id ='" . $holder . "'";

    $res = mysqli_query($conn, $select_category);
    $rowCount = mysqli_num_rows($res);

    if ($rowCount > 0) {
        echo '<option value="">Select State</option>';

        while ($row = mysqli_fetch_array($res)) {

            echo '<option value="' . $row['citymun_id'] . '"';
            if ($city_mun == $row['citymun_id']) {
                echo 'selected';
            }
            echo '>' . $row['citymun_m'] . '</option>';
        }
    } else {
        echo '<option value="">not available</option>';
    }
}
