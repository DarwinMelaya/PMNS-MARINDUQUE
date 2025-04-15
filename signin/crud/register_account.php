<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

include '../../cms/connection/connection.php';
date_default_timezone_set('Asia/Manila');

$sql1 = "Select * from users where username = '" . $_POST['username'] . "'";
$result = mysqli_query($conn, $sql1);

switch ($_POST['province']) {
  case '119':
    $access = 1;
    break;
  default:
    $access = 2;
    break;
}

if (mysqli_num_rows($result) > 0) {
  header("Location:../register.php?status=0");
} else {
  $sql = "INSERT INTO users (username, password, user_fname, user_lname, email, access_level,province, date_registered)
      VALUES ('" . strtoupper($_POST["username"]) . "','" . password_hash(sha1($_POST["password"]), PASSWORD_BCRYPT, ['cost' => 12]) . "','" . $_POST["fname"] . "','" . $_POST["lname"] . "','" . base64_encode(strtolower($_POST["email"])) . "','" . strtolower($access) . "','" . $_POST["province"] . "','" . date("Y-m-d | H:i:s") . "')";
  if (mysqli_query($conn, $sql)) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pmns.dostmimaropa@gmail.com';                     //SMTP username
    $mail->Password   = 'rfcghafuppypyfgy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pmns.administrator@gmail.com', 'PMNS Administrator');
    $mail->addAddress($_POST['email'], $_POST['username']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'PMNS Application Registration Confirmation';
    $mail->Body    = "Dear User. " . $_POST['username'] . ",
          <br><br>
          You have successfully created an account in the Project Management and Notification System. <br />
          You can now login to <a href='http://www.pmns.dostmimaropa.ph/signin'> Project Management and Notification System. </a>       

          <br /><br />
          Thank you,<br /><br />
          <b>PMNS Administrator</b>
          <br /> <br />

          Privacy Note: All information entered in this site (including names, contact number and email address) will be used exclusively for the stated purposes of this site and will not be made available for any other purpose or to any other party. This is an automatically generated email, please do not reply.
          ";

    $mail->send();
    //SMS

    header('Location: ../index.php?status=1');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
