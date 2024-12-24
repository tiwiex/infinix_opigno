<?php
$to = "tiwiex@gmail.com";
$subject = "Test Email";
$message = "This is a test email.";
$headers = "From: info@infinixtechcloud.com";
mail($to, $subject, $message, $headers);
?>

