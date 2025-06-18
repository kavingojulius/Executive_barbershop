<!doctype html>
<html class="no-js" lang="zxx">


<?php 
session_start();
include_once("../includes/head.php");

// Include database configuration
include_once("../config/db.php");

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
    header("Location: appointment.php");
    exit;
}


?>

<style>
    .form-messages .text-success {
        color: green;
        font-weight: bold;
    }
    .form-messages .text-danger {
        color: red;
        font-weight: bold;
    }
</style>

<body>


    <?php  include_once("../includes/navbar.php")?>

    <!-- Breadcumb -->

    <div class="breadcumb-wrapper " data-bg-src="../assets/img/breadcumb/breadcumb-bg-3.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Appointment</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--==============================
    Appointment Area
    ==============================-->
    <section class="bg-light-3 space">
        <div class="shape-mockup jump-img d-none d-xxl-block" data-right="4%" data-top="10%"><img src="assets/img/shape/leaf-1-5.png" alt="shape"></div>
        <div class="shape-mockup jump-reverse-img d-none d-xxl-block" data-right="2%" data-bottom="5%"><img src="assets/img/shape/b-s-1-3.png" alt="shape"></div>
        <div class="shape-mockup jump-reverse-img d-none d-xxl-block" data-left="0" data-bottom="4%"><img src="assets/img/shape/b-s-1-2.png" alt="shape"></div>
        <div class="container">
            <div class="row gx-60">
                <div class="col-xl-5 mb-40 mb-xl-0 pb-20 pb-xl-0 wow fadeInUp" data-wow-delay="0.2s">

                    <p class="form-messages">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo '<span class="text-' . $_SESSION['message']['type'] . '">' . $_SESSION['message']['text'] . '</span>';
                            unset($_SESSION['message']); // Clear message after displaying
                        }
                        ?>
                    </p>

                    <form action="" class="form-style2   appointment-form">
                        <h2 class="form-title">Book Appointment</h2>
                        <p class="form-label">Today For Free</p>
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
                            <input type="text" name="appointment_date" id="date" autocomplete="off" class="form-control dateTime-pick" placeholder="Select Date">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" id="subject"  class="form-control " placeholder="Input your subject">                            
                        </div>
                        <div class="form-group">
                            <button class="vs-btn" type="submit">Make Appointment</button>
                        </div>
                        <!-- <p class="form-messages"></p> -->
                    </form>
                </div>
                <div class="col-xl-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h2 class="h3 mb-4 mt-n2">Get Expert Health Consultation</h2>
                            <p class="fs-md font-title mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat xcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                            <div class="row gy-2">
                                <div class="col-auto">
                                    <p class="vs-info"><i class="fal fa-envelope"></i><a href="mailto:example@info.com" class="text-inherit">example@info.com</a></p>
                                </div>
                                <div class="col-auto">
                                    <p class="vs-info"><i class="fal fa-phone-alt"></i><a href="tel:+441233456789" class="text-inherit">+441233456789</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 mb-30">
                            <img src="assets/img/about/appoin-1-2.jpg" alt="about" class="w-100">
                        </div>
                        <div class="col-md-5 mb-30">
                            <img src="assets/img/about/appoin-1-1.jpg" alt="about" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- footer -->

    <?php include '../includes/footer.php'; ?>
    
    <!-- All Js File -->
    
    <!-- Jquery -->
    <script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <script src="../assets/js/jquery-ui.min.js"></script>
    <!-- Slick Slider -->
    <script src="../assets/js/slick.min.js"></script>
    <!-- <script src="assets/js/app.min.js"></script> -->

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Parallax Scroll -->
    <script src="../assets/js/universal-parallax.min.js"></script>
    <!-- Wow.js Animation -->
    <script src="../assets/js/wow.min.js"></script>
    <!-- jQuery Datepicker -->
    <script src="../assets/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope Filter -->
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="../assets/js/main.js"></script>


</body>

</html>