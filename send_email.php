<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        echo "Invalid email format";
        exit;
    }

    $subject = strip_tags(trim($_POST['subject']));
    $message = strip_tags(trim($_POST['message']));

    $to = 'your-email@example.com';

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    if(mail($to, $subject, $message, $headers)){
        echo 'Thank you for your message!';
    } else {
        echo 'Sorry, there was an error sending your message.';
    }
}
?>
