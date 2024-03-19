<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'daphnepearl101@gmail.com';
$mail->Password   = 'jwcj uezm supz pgfy';
$mail->Port       = 587;

// Set email content (HTML with inline styles)
$mail->isHTML(true);

// Capture form data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
$subject = htmlspecialchars($_POST['subject']);

// Set email recipients and sender
$mail->setFrom($email, $name);
$mail->addAddress($email, $name);
$mail->addAddress('daphnepearl101@gmail.com');
$mail->Subject = $subject;
$mail->Body = "Dear " . $name . ",\n\nThank you for contacting us. We will get back to you as soon as possible.\n\n Message: \n\n" . $message;

// Attempt to send the email and handle potential exceptions
try {
    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Remove unnecessary code for sending with PHP's mail() function 
