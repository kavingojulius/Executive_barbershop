<!doctype html>
<html class="no-js" lang="zxx">

<?php
session_start();
include_once("./includes/head.php");

// Include database configuration
include_once("./config/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);

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
        // Insert into contact_messages
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Your message has been sent successfully! We will respond soon.'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Failed to send message. Please try again.'];
        }
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['message'] = ['type' => 'danger', 'text' => implode('<br>', $errors)];
    }

    // Redirect to avoid form resubmission and PHP output
    header("Location: contact.php#cntf");
    exit;
}
?>

<body>
    <?php include_once("./includes/navbar.php") ?>

    <!-- Breadcrumb -->
     
    <div class="breadcumb-wrapper" data-bg-src="./assets/best/backg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact <span class="inner-text">Us</span></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="./">Home</a></li>
                        <li>Contact <span class="inner-text">Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Area -->

    <style>
        /* Contact Form Styling */
        .form-style6 input,
        .form-style6 textarea {
            color: #333 !important; /* Dark gray text */
            background-color: #fff !important; /* White background */
            border: 1px solid #ddd !important;
            padding: 10px 15px !important;
            width: 100% !important;
            margin-bottom: 15px !important;
            font-size: 16px !important;
        }
        
        /* Textarea specific styling */
        .form-style6 textarea {
            min-height: 120px !important;
            resize: vertical !important;
        }
        
        /* Placeholder text */
        .form-style6 input::placeholder,
        .form-style6 textarea::placeholder {
            color: #666 !important;
            opacity: 1 !important;
        }
        
        /* Focus states */
        .form-style6 input:focus,
        .form-style6 textarea:focus {
            outline: none !important;
            border-color: #666 !important;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.1) !important;
        }
        
        /* Submit button */
        .form-style6 .vs-btn {
            cursor: pointer;
            background-color: #333 !important; /* Dark button */
            color: white !important;
            border: none !important;
            padding: 12px 25px !important;
            font-weight: bold !important;
            transition: all 0.3s ease !important;
        }
        
        .form-style6 .vs-btn:hover {
            background-color: #555 !important;
        }
        
        /* Remove conflicting classes */
        .form-style6 .form-control {
            all: unset !important;
        }
    </style>

    <section class="space">
        <div class="container">
            <div class="row gx-70">
                <div class="col-lg-6 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center text-lg-start">
                        <span class="sec-subtitle">Connect with Us</span>
                        <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Contact Our <span class="text-theme">Barbershop</span></h2>
                        <div class="col-xxl-10 pb-xl-3" id="cntf">
                            <p class="pe-xxl-4">Have questions about our services, want to book an appointment, or just say hello? Fill out the form below, and we'll get back to you as soon as possible.</p>
                        </div>
                    </div>

                    <!-- Display session message -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo htmlspecialchars($_SESSION['message']['type']); ?> alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars($_SESSION['message']['text']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <form action="contact.php" method="POST" class="form-style6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name*">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Your Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" id="subject" placeholder="Service to book* (e.g., Haircut, Beard Trim, Styling)">                            
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="Tell us more about your service request*"></textarea>
                        </div>
                        <button class="vs-btn" type="submit" id="submit-btn">Send Message</button>
                        <p class="form-messages"></p>
                    </form>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10228.333094808544!2d8.71427116977539!3d50.14087400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd0efc21096a2f%3A0x9c0f8cba401c081c!2sWilhelmsh%C3%B6her%20Str.%2077%2C%2060389%20Frankfurt%20am%20Main%2C%20Germany!5e0!3m2!1sen!2sbd!4v1677669261209!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="contact-table">
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">Address :</span>
                                <span class="td">Lexo Petrol Station, next to Club Step Two, Embu</span>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">email :</span>
                                <span class="td"><a href="mailto:kings2023@gmail.com" class="text-inherit">kings2023@gmail.com</a></span>
                            </div>
                            <div class="tb-col">
                                <span class="th">time : </span>
                                <span class="td">09 : 00 am -  8 : 00 pm</span>
                            </div>
                        </div>
                    </div>
                    <span class="h4">
                        <i class="fal fa-headset me-3 text-theme"></i>
                        <a href="tel:0704843035" class="text-inherit">0704843035</a> 
                            /
                        <a href="tel:0727656828" class="text-inherit">0727656828</a>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

   
</body>
</html>