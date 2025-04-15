<?php
include '../../connection/connection.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $training_id = $_POST['training_id'];
    $training_title = $_POST['training_title'];
    $charging_program = $_POST['charging_program'];
    $charge_remark = $_POST['charge_remarks'];
    $amount_training = $_POST['amount_training'];
    $breakdown = $_POST['breakdown'];
    $rps_details = $_POST['rps'];
    $dateconducted = $_POST['dateconducted'];
    $resource_venue = $_POST['resource_venue'];
    $participant_name = $_POST['participant_name'];
    $participant_address = $_POST['participant_address'];
    $dost_assist_firm_male = $_POST['dost_assist_firm_male'];
    $dost_assist_firm_female = $_POST['dost_assist_firm_female'];
    $nondost_assist_firm_male = $_POST['nondost_assist_firm_male'];
    $nondost_assist_firm_female = $_POST['nondost_assist_firm_female'];
    $coop_male = $_POST['coop_male'];
    $coop_female = $_POST['coop_female'];
    $startup_male = $_POST['startup_male'];
    $startup_female = $_POST['startup_female'];
    $individual_male = $_POST['individual_male'];
    $individual_female = $_POST['individual_female'];
    $academe_male = $_POST['academe_male'];
    $academe_female = $_POST['academe_female'];
    $government_male = $_POST['government_male'];
    $government_female = $_POST['government_female'];
    $pwd_participants = $_POST['pwd_participants'];
    $sr_participants = $_POST['sr_participants'];
    $ipe = $_POST['ipe'];

    
    // SQL query to update training data
    $sql = "UPDATE trainings SET
                training_title = '$training_title',
                charging_program = '$charging_program',
                charge_remark = '$charge_remark',
                amount_training = '$amount_training',
                breakdown = '$breakdown',
                rps_details = '$rps_details',
                dateconducted = '$dateconducted',
                resource_venue = '$resource_venue',
                participant_name = '$participant_name',
                participant_address = '$participant_address',
                dost_assist_firm_male = '$dost_assist_firm_male',
                dost_assist_firm_female = '$dost_assist_firm_female',
                nondost_assist_firm_male = '$nondost_assist_firm_male',
                nondost_assist_firm_female = '$nondost_assist_firm_female',
                coop_male = '$coop_male',
                coop_female = '$coop_female',
                startup_male = '$startup_male',
                startup_female = '$startup_female',
                individual_male = '$individual_male',
                individual_female = '$individual_female',
                academe_male = '$academe_male',
                academe_female = '$academe_female',
                government_male = '$government_male',
                government_female = '$government_female',
                pwd_participants = '$pwd_participants',
                sr_participants = '$sr_participants',
                ipe = '$ipe'
                WHERE training_id = '$training_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Redirect to the training master list or any other page as needed
        header("Location: ../frontend/training_masterlist.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
