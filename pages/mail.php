<?php

// Start session (if not already started in head.php)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database configuration
include_once("../config/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = filter_var($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '');
    $subject = filter_var($_POST['subject'] ?? '');
    $message = filter_var($_POST['message'] ?? '');
        

    $errors = [];
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }
    if (empty($message)) {
        $errors[] = 'Your message is required';
    }
    

    if (empty($errors)) {
        // Insert into contact_us_tb
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Your message has been sent successfully! We will respond soon.'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Failed to send message. Please try again.'];
        }
        $stmt->close();
        } 
    else {
        $_SESSION['message'] = ['type' => 'danger', 'text' => implode('<br>', $errors)];
    }

}
?>