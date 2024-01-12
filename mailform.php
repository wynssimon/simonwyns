<?php
// Define the recipient email address
$recipient_email = "wynssimonw@gmail.com";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $voornaam = filter_input(INPUT_POST, 'voornaam', FILTER_SANITIZE_STRING);
    $familienaam = filter_input(INPUT_POST, 'familienaam', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nummer = filter_input(INPUT_POST, 'nummer', FILTER_SANITIZE_NUMBER_INT);
    $bericht = filter_input(INPUT_POST, 'bericht', FILTER_SANITIZE_STRING);

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Prepare email content
    $email_subject = "$voornaam $familienaam sent you an email";
    $email_body = "Name: $familienaam $voornaam\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Telefoonnummer: $nummer\n";
    $email_body .= "Message: $bericht\n";

    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Send the email
    if (mail($recipient_email, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully";
    } else {
        echo "Message could not be sent";
    }
} else {
    die("Invalid request");
}
?>
