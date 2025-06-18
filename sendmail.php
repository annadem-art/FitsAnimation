<?php
$log = date('Y-m-d H:i:s') . " | To: " . $_POST['to'] . "\n";
file_put_contents('mail.log', $log, FILE_APPEND);

$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = "From: no-reply@yourdomain.com\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

if(mail($to, $subject, $message, $headers)) {
    file_put_contents('mail.log', "SUCCESS\n", FILE_APPEND);
    echo json_encode(['success' => true]);
} else {
    file_put_contents('mail.log', "FAILED\n", FILE_APPEND);
    echo json_encode(['error' => 'Send failed']);
}
?>
