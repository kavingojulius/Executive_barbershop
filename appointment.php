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
    $number = filter_var($_POST['phone_number'] ?? '', FILTER_SANITIZE_STRING);
    $date = filter_var($_POST['appointment_date'] ?? '', FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);

    $errors = [];
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    if (empty($number)) {
        $errors[] = 'Phone number is required';
    }
    if (empty($date)) {
        $errors[] = 'Date is required';
    }
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }

    if (empty($errors)) {
        // Insert into appointments
        $stmt = $conn->prepare("INSERT INTO appointment_requests (name, email, phone_number, appointment_date, subject) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $number, $date, $subject);

        if ($stmt->execute()) {
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Your appointment has been booked successfully!'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Failed to book appointment. Please try again.'];
        }
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['message'] = ['type' => 'danger', 'text' => implode('<br>', $errors)];
    }

    // Redirect to avoid form resubmission and PHP output
    header("Location: appointment.php#apf");
    exit;
}
?>

<body>


    <?php  include_once("./includes/navbar.php")?>

    <!-- Breadcumb -->

    <div class="breadcumb-wrapper" data-bg-src="./assets/best/backg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Appointment</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="./">Home</a></li>
                        <li>Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Area -->
    
    <section class="bg-light-3 space">        
    <div class="container">
        <div class="row justify-content-center"> <!-- Changed to center content -->
            <div class="col-xl-8 col-lg-10 wow fadeInUp" data-wow-delay="0.2s"> <!-- Adjusted column width -->
                <div class="text-center"> <!-- Centered all text -->
                    <span class="sec-subtitle">Book Now</span>
                    <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Make an <span class="text-theme">Appointment</span></h2>
                    <div class="col-xxl-10 mx-auto pb-xl-3" id="apf"> <!-- Added mx-auto for center alignment -->
                        <p class="px-xxl-4">Schedule your next haircut or grooming session with our expert barbers. We offer a range of services to keep you looking sharp.</p>
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

                <style>
                    .form-style6 {
                        background: white;
                        border-radius: 15px !important; /* Smooth rounded corners */
                        box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important; /* Soft shadow */
                        padding: 30px !important;
                        border: 1px solid rgba(0,0,0,0.1) !important; /* Light border */
                        max-width: 800px !important; /* Limit form width */
                        margin: 0 auto !important; /* Center the form */
                    }
                    
                    .form-style6 input {
                        color: #333 !important;
                        background-color: #fff !important;
                        border: 1px solid #ddd !important;
                        padding: 12px 15px !important; /* Slightly taller inputs */
                        width: 100% !important;
                        margin-bottom: 20px !important;
                        font-size: 16px !important;
                        border-radius: 8px !important; /* Rounded input corners */
                        transition: all 0.3s ease !important;
                    }
                    
                    .form-style6 input[type="date"] {
                        min-height: 45px !important;
                        appearance: none !important;
                        -webkit-appearance: none !important;
                    }
                    
                    .form-style6 input::placeholder {
                        color: #666 !important;
                        opacity: 1 !important;
                    }
                    
                    .form-style6 input:focus {
                        outline: none !important;
                        border-color: #666 !important;
                        box-shadow: 0 0 0 3px rgba(0,0,0,0.05) !important;
                    }
                    
                    .form-style6 .vs-btn {
                        cursor: pointer;
                        width: 100% !important;
                        padding: 15px !important;
                        font-weight: 600 !important;
                        border-radius: 8px !important;
                        background-color: #333 !important;
                        color: white !important;
                        border: none !important;
                        transition: all 0.3s ease !important;
                    }
                    
                    .form-style6 .vs-btn:hover {
                        background-color: #555 !important;
                        transform: translateY(-2px) !important;
                    }
                    
                    .form-title {
                        text-align: center !important;
                        margin-bottom: 25px !important;
                        font-size: 24px !important;
                        color: #333 !important;
                    }
                </style>

                <form action="appointment.php" method="POST" class="form-style6">
                    <h2 class="form-title">Book Appointment</h2>                        
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone_number" id="number" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="date" name="appointment_date" id="date" autocomplete="off" placeholder="Select Date">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" id="subject" placeholder="Input your subject">                            
                    </div>
                    <div class="form-group">
                        <button class="vs-btn" type="submit">Make Appointment</button>
                    </div>
                    <p class="form-messages"></p>
                </form>
            </div>
        </div>
    </div>
</section>
    
    <!-- footer -->

    <?php include './includes/footer.php'; ?>


</body>

</html>