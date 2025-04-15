<?php include '../../connection/connection.php';
session_start();
// Get the actual date in Manila date_default_timezone_set('Asia/Manila'); 
// Remove unauthorized users if ($_SESSION['id']=="" ) header("Location:../../../"); 

$sql = "SELECT * FROM projects WHERE project_type = '" . $_GET['project_type'] . "' and user_id = '" . $_SESSION['id'] . "' order by date_encoded asc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $project_id = $row['project_id'];
    }
}

$sqldoc = "INSERT INTO document_list (doc_list_id, semi_annual_prog_rep, annual_prog_rep, liquidation_rep, completion_rep, termination_rep, req_ext_liquidation, req_eqp_transfer, req_donation, req_condonation, letter_intent, tna_form, permits_license_issued, sec_dti_cda, photocopy_rep_firm, article_corp, board_resolution, notarized_swon_statement, financial_statement, sworn_affidavit, projected_financial_statement, tech_spec_design_eqp, layout_facility, eqp_qoutation, proj_proposal, partial_budget_analysis, tna_form4, rtec_report, response_rtec_comments, approval_letter, bank_account, moa, promissory_note, form_008, cert_dost_agency, acknowledgement_reciept, csf, proj_id, date_created) 
VALUES (0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'" . $project_id . "','" . date("Y-m-d | H:i:s") . "')";
if (mysqli_query($conn, $sqldoc)) {
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
}
