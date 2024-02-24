<?php
// Include PHPMailer Autoload file
require './vendor/phpmailer/phpmailer/src/get_oauth_token.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your Gmail email address and password
    $from_email = 'daphnepearl101@gmail.com';
    $password = 'your_password';

    // Extract form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Email content
    $to_email = 'daphnepearl101@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Set up SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $from_email;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set up email content
    $mail->setFrom($from_email);
    $mail->addAddress($to_email);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send the email
    if ($mail->send()) {
        echo "Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an error sending your message.";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
