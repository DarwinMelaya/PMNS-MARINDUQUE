<?php
include '../../../connection/connection.php';
if (!empty($_POST["id"])) {

    $select_category = "SELECT * FROM barangays WHERE city_id='" . $_POST['id'] . "'";

    $res = mysqli_query($conn, $select_category);
    $rowCount = mysqli_num_rows($res);

    if ($rowCount > 0) {
        echo '<option value="">Select barangay</option>';

        while ($row = mysqli_fetch_array($res)) {

            echo '<option value="' . $row['barangay_id'] . '">' . $row['barangay_name'] . '</option>';
        }
    } else {
        echo '<option value="">DATA NOT AVAILABLE</option>';
    }
}
