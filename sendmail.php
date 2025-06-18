<?php
header('Content-Type: application/json');

$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = "From: no-reply@yourdomain.com\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n"; // Важно для HTML-писем

if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Ошибка отправки']);
}
?>
