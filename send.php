<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create instance
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';         // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'naina011974@gmail.com'; // 🔁 Replace with your Gmail
    $mail->Password = 'gqnyngjrtrmupkoc';   // 🔁 Use Gmail App Password (not regular password)
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('naina011974@gmail.com', 'Query Bot');
    $mail->addAddress('naina011974@gmail.com'); // You will receive it here

    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Query Received';
    $mail->Body    = "
        <h3>New Query Submission</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    $mail->send();
    echo 'Query sent successfully!';
} catch (Exception $e) {
    echo "Error sending query: {$mail->ErrorInfo}";
}
?>
