<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../../connection/connection.php';

$sql = "SELECT * FROM document_name WHERE doc_id='" . $_POST['doc'] . "'";
// Execute the query
$result = $conn->query($sql);
// Check if any records are returned
if ($result->num_rows > 0) {
    // Fetch each row and store its data into separate variables
    while ($row = $result->fetch_assoc()) {
        $doc_name = $row['doc_name'];
    }
}
$report = "SELECT * FROM projects where project_id = '" . $_POST['project_id'] . "'";
$result_report = $conn->query($report);
if ($result_report->num_rows > 0) {
    while ($row = $result_report->fetch_assoc()) {
        $proj_email = $row['proj_email'];
        $project_type = $row['project_type'];
    }
}

switch ($project_type) {
    case '1':
        $type = 'gia';
        break;
    case '2':
        $type = 'setup';
        break;
    case '3':
        $type = 'cest';
        break;
    case '4':
        $type = 'sscp';
        break;
    default:
        break;
}

if (isset($_POST['action']) && $_POST['action'] === 'request') {


    switch ($_POST['deadline']) {
        case '1':
            $deadline = date('l (m-d-Y)', strtotime('+1 week'));
            break;
        case '2':
            $deadline = date('l (m-d-Y)', strtotime('+1 week'));
            break;
        case '3':
            $deadline = date('l (m-d-Y)', strtotime('+1 month'));
            break;
        case '4':
            $deadline = date('l (m-d-Y)', strtotime('+2 months'));
            break;
        default:
            break;
    }

    //Load Composer's autoloader
    require '../../../vendor/autoload.php';

    try {
        //Server settings
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pmns.dostmimaropa@gmail.com';                     //SMTP username
        $mail->Password   = 'axcqjrkxgiyjhedb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('pmns.administrator@gmail.com', 'PMNS Administrator');
        $mail->addAddress($proj_email, 'User');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Requesting Document (PMNS)';
        $mail->Body    = 'Good day <br /><br />
        Project Management and Notification System have requested for the document of <b> ' . $doc_name . ' </b> to be submitted on/before <b> ' . $deadline . ' </b>.
           <br />
              Thank you,<br /><br />
              <b>PMNS Administrator</b>
              <br /> <br />
    
              Privacy Note: All information entered in this site (including names, contact number and email address) will be used exclusively for the stated purposes of this site and will not be made available for any other purpose or to any other party. This is an automatically generated email, please do not reply.
              
        ';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Handle the file upload action here
    if (isset($_FILES['file'])) {
        $doc_id = $_POST['doc'];
        $download = '0';
        // Check if the file was uploaded successfully
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            // Name of the uploaded file
            $filename = $_FILES['file']['name'];

            // Get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename1 = pathinfo($filename, PATHINFO_FILENAME);
            $hashname = sha1($filename1);

            // Destination of the file on the server
            $destination = '../../../uploads/' . sha1($filename1) . '.' . $extension;

            // Check if the file extension is allowed
            if (!in_array($extension, ['pdf'])) {
                echo "You file extension must be .pdf";
            } elseif ($_FILES['file']['size'] > 10000000) { // File shouldn't be larger than 1Megabyte
                echo "File too large!";
            } else {
                // Move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                    $sql = "INSERT INTO project_files (filename, temp_filename,type, size, downloads, project_id, doc_id, datecreated) VALUES (?,?,?,?,?,?,?,?)";

                    $date_encoded = date("Y-m-d | H:i:s");
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param(

                        "sssiiiis",
                        $hashname,
                        $doc_name,
                        $extension,
                        $_FILES['file']['size'],
                        $download,
                        $_POST['project_id'],
                        $_POST['doc'],
                        $date_encoded
                    );

                    // Execute the statement
                    if ($stmt->execute()) {
                        header("Location: ../frontend/view_" . $type . ".php?id=" . $_POST['project_id'] . "");
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    echo "Failed to upload file.";
                }
            }
        } else {
            // Handle upload errors
            echo "File upload error: " . $_FILES['file']['error'];
        }
    }
}
