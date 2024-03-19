<?php

require 'vendor/autoload.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'daphnepearl101@gmail.com';
$mail->Password   = 'FHFHF';
$mail->Port       = 587;

// Set email content (HTML with inline styles)
$mail->isHTML(true);                                 // Set email format to HTML
$mail->Body    = 'This is the <b>HTML</b> body content of your email.<br>
                  You can also include images using the `<img>` tag with a `src` attribute referencing a valid URL.';

// Set plain text alternative (optional)
$mail->AltBody = 'This is the plain text body content of your email.';

// Set email recipients and sender
$mail->setFrom('daphnepearl101@gmail.com', 'DAPHNE');
$mail->addAddress('daphnepearl101@gmail.com', 'DAPHNE');

$mail->Subject = 'Mail Subject';
$mail->Body = 'Mail Body';
// $mail->addReplyTo('daphnpearl101@gmail.com', 'Reply-To Name');

// Attempt to send the email and handle potential exceptions
try {
    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$send = $mail->send();
if ($send) {
    echo "Mail sent";
} else {
    echo "Mail not sent";
}
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
$subject = htmlspecialchars($_POST['subject']);

$to = $_POST['email'];
$subject = "Thank you for contacting us";
$message = "Dear " . $_POST['name'] . ",\n\nThank you for contacting us. We will get back to you as soon as possible.";
$headers = "From: webmaster@example.com\r\n";
if (mail($to, $subject, $message, $headers)) {
    echo "Message sent";
} else {
    // Error handling
    echo "Message not sent";
}
