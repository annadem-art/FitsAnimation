<?php
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mail($to, $subject, $message);
?>