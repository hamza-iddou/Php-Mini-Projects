<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hamza.live222@gmail.com';
    $mail->Password = 'swpqiizmhoxfbjoe';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->isHTML(true);
} catch (Exception $e) {
    echo "Mailer Config Failed: {$mail->ErrorInfo}";
}
?>