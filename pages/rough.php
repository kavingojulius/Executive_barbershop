<?php
// Set JSON header
// header('Content-Type: application/json');

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
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
        exit;
    }

    // Check for recent duplicate submission (within last 60 seconds)
    $checkStmt = $conn->prepare("SELECT id FROM contact_messages WHERE name = ? AND email = ? AND subject = ? AND message = ? AND created_at >= NOW() - INTERVAL 60 SECOND");
    if ($checkStmt) {
        $checkStmt->bind_param("ssss", $name, $email, $subject, $message);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if ($checkStmt->num_rows > 0) {
            $checkStmt->close();
            echo json_encode(['status' => 'error', 'message' => 'Duplicate submission detected. Please wait a moment before submitting again.']);
            exit;
        }
        $checkStmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database query preparation failed']);
        exit;
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database query preparation failed']);
        exit;
    }
    
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
    } else {
        if ($conn->errno == 1062) { // MySQL error code for duplicate entry
            echo json_encode(['status' => 'error', 'message' => 'Duplicate submission detected.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error sending message']);
        }
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>

// for displaying contact form messages success or error 
  $(document).ready(function() {
      $('.ajax-contact').on('submit', function(e) {
          e.preventDefault();
          var form = $(this);
          var formMessages = form.find('.form-messages');
          var submitButton = form.find('button[type="submit"]');
          
          // Clear and reset message area
          formMessages.removeClass('success error info').html('');
          
          // Disable submit button and show loading state
          submitButton.prop('disabled', true).text('Sending...');
          formMessages.html('Sending message...').addClass('info');
          
          $.ajax({
              url: form.attr('action'),
              type: 'POST',
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {
                  let messageText = response.message;
                  if (typeof messageText === 'object') {
                      messageText = messageText.text || JSON.stringify(messageText);
                  }
                  formMessages.html(messageText);
                  if (response.status === 'success') {
                      formMessages.addClass('success').removeClass('error info');
                      form[0].reset(); // Reset the form
                  } else {
                      formMessages.addClass('error').removeClass('success info');
                  }
              },
              error: function(xhr, status, error) {
                  var errorMessage = 'An error occurred while sending the message. Please try again.';
                  if (xhr.responseJSON && xhr.responseJSON.message) {
                      errorMessage = xhr.responseJSON.message;
                  }
                  formMessages.html(errorMessage).addClass('error').removeClass('success info');
                  console.error('AJAX Error:', status, error, xhr.responseText);
              },
              complete: function() {
                  // Re-enable submit button
                  submitButton.prop('disabled', false).text('Send Message');
              }
          });
      });
  });










