<?php
$to = "reyesryan137@gmail.com";
$subject = "PMNS Application Document Deadline";
$message = "
                                      Dear Mr/Ms. Ryan,
                                      <br><br>
                                      You have not submitted the following document: <br/><ol></ol> <br/>pending due date on <br/>
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
$headers .= 'From: PMNS Administrator' . "\r\n";
$headers .= 'Reply-To: PMNS Administrator <info@dostmimaropa.ph>' . "\r\n";
$headers .= 'Cc: reyesryan1123@gmail.com' . "\r\n";
$headers .= 'Bcc: reyesryan1123@gmail.com' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Error sending email: " . mail_error();
}
