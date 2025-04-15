<?php
include '../../connection/connections.php';

if (isset($_POST['citymun_c'])) {
    $citymunCode = $_POST['citymun_c'];
    $stmt = $pdo->prepare("SELECT barangay_c, barangay_m FROM barangay WHERE citymun_c = :citymun_c");
    $stmt->execute(['citymun_c' => $citymunCode]);
    $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<option value="">Select Barangay</option>';
    foreach ($barangays as $barangay) {
        echo '<option value="' . $barangay['barangay_c'] . '">' . $barangay['barangay_m'] . '</option>';
    }
}
?>
