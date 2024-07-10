<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and trim their values
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $tourType = trim($_POST["tour-type"]);
    $country = trim($_POST["country"]);
    $route = trim($_POST["route"]);
    $path = trim($_POST["path"]);
    $popularPath = trim($_POST["popular-path"]);

    // Set up email content
    $to = "ahmedfaizanxid@gmail.com"; // Your email address
    $subject = "New Tour Planning Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Tour Type: $tourType\n";
    if ($tourType === 'group') {
        $message .= "Country: $country\n";
    } elseif ($tourType === 'self') {
        $message .= "Selected Path: $path\n";
    }
    if (!empty($popularPath)) {
        $message .= "Popular Path: $popularPath\n";
    }

    // Send email
    $headers = "From: $email";
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your form has been submitted.";
    } else {
        echo "Oops! Something went wrong.";
    }
}
?>
