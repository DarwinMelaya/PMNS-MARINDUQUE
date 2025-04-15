<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pmns_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Define date comparison logic (replace with your specific criteria)
$comparisonDate = date('Y-m-d', strtotime('+7 days')); // Check for dates 7 days from today

$sql = "SELECT * FROM projects proj
LEFT JOIN users us on us.user_id = proj.user_id
 WHERE duration_to = '$comparisonDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Dates found! Perform actions (e.g., send notifications)
  while ($row = $result->fetch_assoc()) {
    $date = $row["duration_to"];
    // Replace with your specific notification logic (e.g., email, SMS)
    $date = date_create($date);
    $to = base64_decode($row['email']);
    $subject = "PMNS Application Document Deadline";
    $message = "
          Dear Mr/Ms. " . ucfirst(strtolower($row['user_fname'])) . ",
          <br><br>
          You have pending due date on " . date_format(date_create($row['duration_to']), "F d,Y") . "<br/>
          You can login and upload to <a href='http://www.pmns.dostmimaropa.ph/signin'> Project Management and Notification System. </a>       
        
          <br /><br />
          Thank you,<br /><br />
          <b>PMNS Administrator</b>
          <br /> <br />

          Privacy Note: All information entered in this site (including names, contact number and email address) will be used exclusively for the stated purposes of this site and will not be made available for any other purpose or to any other party. This is an automatically generated email, please do not reply.
          ";

    // Please wait for your Web Administrator to validate and approve your registration!
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: PMNS Administrator <info@pmns.dostmimaropa.ph>' . "\r\n";

    mail($to, $subject, $message, $headers);
    var_dump($to, $subject, $message, $headers);
  }
}

$conn->close();
