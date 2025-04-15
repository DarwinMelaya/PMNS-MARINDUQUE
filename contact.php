<?php

$to = "reyesryan137@gmail.com";
$subject = $_POST['subject'];
$message = "This Message is from " . $_POST['name'] . " " . $_POST['message'];

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= $_POST['email'] . "\r\n";


if (mail($to, $subject, $message, $headers)) {
    echo 'send';
} else {
    echo 'not sent';
}
