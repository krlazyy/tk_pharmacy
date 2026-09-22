<?php
// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php'; // Relative path works better on different servers


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tinigkalinga23@gmail.com';  // Your Gmail address
        $mail->Password = 'zvjitkqlingjvscn';  // Your Gmail password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('tinigkalinga23@gmail.com');  // Recipient email

        //Content
        $mail->isHTML(false);  // Set email format to plain text
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "From: $name\nEmail: $email\nContact Number: $contact_no\n\nMessage:\n$message\n";

        $mail->send();
        header("location:../contact.php?msg=Thank you! Your message has been sent.");
    } catch (Exception $e) {
        echo "Sorry, something went wrong. Error: {$mail->ErrorInfo}";
    }
}
?>
