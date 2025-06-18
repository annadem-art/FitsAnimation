<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$to = filter_input(INPUT_POST, 'to', FILTER_VALIDATE_EMAIL);
$subject = htmlspecialchars($_POST['subject'] ?? '');
$message = $_POST['message'] ?? '';
$contentType = $_POST['content-type'] ?? 'text/plain';

if (!$to || !$subject || !$message) {
    echo json_encode(['success' => false, 'error' => 'Invalid parameters']);
    exit;
}

$headers = [
    'From' => 'noreply@yourdomain.com',
    'Reply-To' => 'support@yourdomain.com',
    'Content-Type' => $contentType . '; charset=UTF-8',
    'X-Mailer' => 'PHP/' . phpversion()
];

$formattedHeaders = implode("\r\n", array_map(
    fn($k, $v) => "$k: $v",
    array_keys($headers),
    $headers
));

$success = mail($to, $subject, $message, $formattedHeaders);

echo json_encode([
    'success' => $success,
    'message' => $success ? 'Email sent' : 'Failed to send email'
]);
?>
