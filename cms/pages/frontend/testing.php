<?php
$servername = "localhost";
$username = "syspmns";
$password = "verifyb4password";
$dbname = "pmns_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$threemonths = date('Y-m-d', strtotime('+3 months')); // Check for dates 7 days from today
$twoweeks = date('Y-m-d', strtotime('+2 weeks')); // Check for dates 7 days from today
$oneweek = date('Y-m-d', strtotime('+7 days')); // Check for dates 7 days from today

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$checking_proj = "SELECT * FROM document_list dl left join projects pr on dl.proj_id = pr.project_id left join users u on pr.user_id = u.user_id";

$check_proj_result = $conn->query($checking_proj);
if ($check_proj_result->num_rows > 0) {
  while ($row = $check_proj_result->fetch_assoc()) {
    $duration_to = $row['duration_to'];
    $project_type = $row['project_type'];
    $proj_id = $row['project_id'];
    $user_fname = $row['user_fname'];
    $user_lname = $row['user_lname'];
    $email = $row['email'];
    $semi_annual_prog_rep = $row['semi_annual_prog_rep'];
    $annual_prog_rep = $row['annual_prog_rep'];
    $liquidation_rep = $row['liquidation_rep'];
    $completion_rep = $row['completion_rep'];
    $termination_rep = $row['termination_rep'];
    $req_ext_liquidation = $row['req_ext_liquidation'];
    $req_eqp_transfer = $row['req_eqp_transfer'];
    $req_donation = $row['req_donation'];
    $req_condonation = $row['req_donation'];
    $letter_intent = $row['letter_intent'];
    $tna_form = $row['tna_form'];
    $permits_license_issued = $row['permits_license_issued'];
    $sec_dti_cda = $row['sec_dti_cda'];
    $photocopy_rep_firm = $row['photocopy_rep_firm'];
    $article_corp = $row['article_corp'];
    $board_resolution = $row['board_resolution'];
    $notarized_swon_statement = $row['notarized_swon_statement'];
    $financial_statement = $row['financial_statement'];
    $swon_affidavit = $row['sworn_affidavit'];
    $project_financial_statement = $row['projected_financial_statement'];
    $tech_spec_design_eqp = $row['tech_spec_design_eqp'];
    $layout_facility = $row['layout_facility'];
    $eqp_qoutation = $row['eqp_qoutation'];
    $proj_proposal = $row['proj_proposal'];
    $partial_budget_analysis = $row['partial_budget_analysis'];
    $tna_form4 = $row['tna_form4'];
    $rtec_report = $row['rtec_report'];
    $response_rtec_comments = $row['response_rtec_comments'];
    $approval_letter = $row['approval_letter'];
    $bank_account = $row['bank_account'];
    $moa = $row['moa'];
    $promissory_note = $row['promissory_note'];
    $form_oo8 = $row['form_008'];
    $cert_dost_agency = $row['cert_dost_agency'];
    $acknowledgement_receipt = $row['acknowledgement_reciept'];
    $csf = $row['csf'];

    switch ($project_type) {
      case '1':
        $missingdoc = [];
        if ($semi_annual_prog_rep == 0) {
          $missingdoc[] = "Semi annual progress report";
        }
        if ($annual_prog_rep == 0) {
          $missingdoc[] = 'Annual progress report';
        }
        if ($liquidation_rep == 0) {
          $missingdoc[] = 'Liquidation report';
        }
        if ($completion_rep == 0) {
          $missingdoc[] = 'Completion report';
        }
        if ($termination_rep == 0) {
          $missingdoc[] = 'Termination report';
        }
        if ($req_ext_liquidation == 0) {
          $missingdoc[] = 'Request for extension of liquidation period';
        }
        if ($req_eqp_transfer == 0) {
          $missingdoc[] = 'Request for equipment transfer';
        }
        if ($req_donation == 0) {
          $missingdoc[] = 'Request for donation';
        }
        if ($req_condonation == 0) {
          $missingdoc[] = 'Request for condonation of penalties';
        }
        break;
      case '2':
        $missingdoc = [];
        if ($letter_intent == 0) {
          $missingdoc[] = 'Letter of intent';
        }
        if ($tna_form == 0) {
          $missingdoc[] = 'TNA form';
        }
        if ($permits_license_issued == 0) {
          $missingdoc[] = 'Permits and licenses issued by LGUs and Other Government';
        }
        if ($sec_dti_cda == 0) {
          $missingdoc[] = 'SEC/DTI/CDA registration';
        }
        if ($photocopy_rep_firm == 0) {
          $missingdoc[] = 'Photocopy of Official Report Receipt of the Firm ';
        }
        if ($article_corp == 0) {
          $missingdoc[] = 'Articles of Coporation';
        }
        if ($board_resolution == 0) {
          $missingdoc[] = 'Board resolution';
        }
        if ($notarized_swon_statement == 0) {
          $missingdoc[] = 'Notarized Sworn statement';
        }
        if ($financial_statement == 0) {
          $missingdoc[] = 'Financial Statements';
        }
        if ($swon_affidavit == 0) {
          $missingdoc[] = 'Sworn Affidavit';
        }
        if ($project_financial_statement == 0) {
          $missingdoc[] = 'Projected Financial Statement';
        }
        if ($tech_spec_design_eqp == 0) {
          $missingdoc[] = 'Technical Specification and Design of Equipment';
        }
        if ($layout_facility == 0) {
          $missingdoc[] = 'Layout of Facility';
        }
        if ($eqp_qoutation == 0) {
          $missingdoc[] = 'Equipment Quotation';
        }
        if ($proj_proposal == 0) {
          $missingdoc[] = 'Project Proposal';
        }
        if ($partial_budget_analysis == 0) {
          $missingdoc[] = 'Partial Budget Analysis';
        }
        if ($tna_form4 == 0) {
          $missingdoc[] = 'TNA Form 4';
        }
        if ($rtec_report == 0) {
          $missingdoc[] = 'RTEC Report';
        }
        if ($response_rtec_comments == 0) {
          $missingdoc[] = 'Response to Rtec Comments';
        }
        if ($approval_letter == 0) {
          $missingdoc[] = 'Approval Letter';
        }
        if ($bank_account == 0) {
          $missingdoc[] = 'Bank Account';
        }
        if ($moa == 0) {
          $missingdoc[] = 'Memorandum of Agreement';
        }
        if ($promissory_note == 0) {
          $missingdoc[] = 'Promissory Note';
        }
        if ($form_oo8) {
          $missingdoc[] = 'Form 008';
        }
        if ($cert_dost_agency == 0) {
          $missingdoc[] = 'Certification from DOST Agency';
        }
        if ($acknowledgement_receipt == 0) {
          $missingdoc[] = 'Acknowledgement Receipt';
        }
        if ($csf == 0) {
          $missingdoc[] = 'CSF';
        }
        break;
      case '3':
        break;

      case '4':
        break;

      default:
        break;
    }

    if ((empty($missingdoc)) != true) {
      $missingdoclist = implode("<ul></ul>", $missingdoc);
      if ($duration_to == $twoweeks or $duration_to == $threemonths or $duration_to == $oneweek) {
        $date = date_create($duration_to);
        $to = base64_decode($email);
        $subject = "PMNS Application Document Deadline";
        $message = "
                                            Dear Mr/Ms. " . ucfirst(strtolower($user_fname)) . ",
                                            <br><br>
                                            You have not submitted the following document: <br/><ol>" . $missingdoclist . "</ol> <br/>pending due date on " . date_format(date_create($duration_to), "F d,Y") . "<br/>
                                            You can login and upload to <a href='http://www.pmns.dostmimaropa.ph/signin'> Project Management and Notification System. </a>       
    
                                            <br /><br />
                                            Thank you,<br /><br />
                                            <b>PMNS Administrator</b>
                                            <br /> <br />
                                            Note: Please disregard if you have submitted the reports <br />
                                            Privacy Note: All information entered in this site (including names, contact number and email address) will be used exclusively for the stated purposes of this site and will not be made available for any other purpose or to any other party. This is an automatically generated email, please do not reply.
                                            ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: PMNS Administrator <info@pmns.dostmimaropa.ph>' . "\r\n";

        mail($to, $subject, $message, $headers);
      }
    }
  }
}
$conn->close();
