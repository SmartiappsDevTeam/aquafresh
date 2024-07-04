<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if necessary

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'email-smtp.ap-south-1.amazonaws.com'; // SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'AKIAUIQABBUSGX4RXZ24'; // SMTP username
    $mail->Password   = 'BBt4qA9gTEB/81Rt/IvRz00rvrUEi7VVZMb6ICnrUW12';     // SMTP password
    $mail->SMTPSecure = 'ssl';              // Enable TLS encryption; `ssl` also accepted
    $mail->Port       = 465;                // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@smartiapps.com');
    $mail->addAddress('iswarya@smartiapps.com');
    //$mail->addAddress('iconicresearchtechnology@gmail.com');  // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];   
    $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>
Message: $message";
$mail->Subject ='New Message Received';
    $mail->send();
    echo 'Message has been sent';
} else {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
