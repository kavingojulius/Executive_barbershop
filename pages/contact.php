<!doctype html>
<html class="no-js" lang="zxx">

<?php include_once("../includes/head.php")?>

<body>


    <?php  include_once("../includes/navbar.php")?>

    <!-- Breadcumb -->

    <div class="breadcumb-wrapper " data-bg-src="../assets/img/breadcumb/breadcumb-bg-4.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact <span class="inner-text">Us</span></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact <span class="inner-text">Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--==============================
      Contact Form Area
    ==============================-->
    <section class=" space">
        <div class="container">
            <div class="row gx-70">
                <div class="col-lg-6 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center text-lg-start">
                        <span class="sec-subtitle">Experience</span>
                        <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Get in <span class="text-theme">Touch</span></h2>
                        <div class="col-xxl-10 pb-xl-3">
                            <p class="pe-xxl-4">We think your skin should look and refshed matter Nourish your outer inner beauty with our essential</p>
                        </div>
                    </div>
                    <form action="mail.php" method="POST" class="ajax-contact form-style6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name*">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Your Email*">
                        </div>
                        <div class="form-group">
                            <select name="subject" id="subject">
                                <option value="" selected disabled hidden>Subject*</option>
                                <option value="Skin Care">Skin Care</option>
                                <option value="Beauty Makeup">Beauty Makeup</option>
                                <option value="Body Massage">Body Massage</option>
                                <option value="Skin Checkup">Skin Checkup</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="Message*"></textarea>
                        </div>
                        <button class="vs-btn" type="submit">Send Message</button>
                        <p class="form-messages"></p>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10228.333094808544!2d8.71427116977539!3d50.14087400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd0efc21096a2f%3A0x9c0f8cba401c081c!2sWilhelmsh%C3%B6her%20Str.%2077%2C%2060389%20Frankfurt%20am%20Main%2C%20Germany!5e0!3m2!1sen!2sbd!4v1677669261209!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    <div class="contact-table">
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">Address :</span>
                                <span class="td">Centerl Park West LA87, New York</span>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">email :</span>
                                <span class="td"><a href="mailto:info@example.com" class="text-inherit">info@example.com</a></span>
                            </div>
                            <div class="tb-col">
                                <span class="th">time : </span>
                                <span class="td">16 : 00 - 19 : 00</span>
                            </div>
                        </div>
                    </div>
                    <span class="h1">
                        <a href="tel:+1222999408" class="text-inherit"><i class="fal fa-headset me-3 text-theme"></i>+1 222 999 408</a>
                    </span>
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