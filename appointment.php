<!doctype html>
<html class="no-js" lang="zxx">

<?php include_once("includes/head.php")?>


<body>


    <?php  include_once("includes/navbar.php")?>

    <!-- Breadcumb -->

    <div class="breadcumb-wrapper " data-bg-src="assets/img/breadcumb/breadcumb-bg-3.jpg">
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
                    <form action="appointment-mail.php" class="form-style2   appointment-form">
                        <h2 class="form-title">Book Appointment</h2>
                        <p class="form-label">Today For Free</p>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="number" name="number" id="number" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="date" id="date" autocomplete="off" class="form-control dateTime-pick" placeholder="Select Date">
                        </div>
                        <div class="form-group">
                            <select name="subject" id="subject">
                                <option disabled hidden selected>Select Subject</option>
                                <option>Sports Massage</option>
                                <option>Stone Massage</option>
                                <option>Head Massage</option>
                                <option>Head Massage</option>
                                <option>Facial &amp; Massage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="vs-btn" type="submit">Make Appointment</button>
                        </div>
                        <p class="form-messages"></p>
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
    </section><!--==============================
    Price Plan Area
    ==============================-->
    <section class=" space">
        <div class="parallax" data-parallax-image="assets/img/bg/price-bg-2-1.jpg"></div>
        <div class="container">
            <div class="row flex-row-reverse gx-55">
                <div class="col-md-6 col-lg-6 col-xl-4 col-xxl align-self-end mb-40 mb-md-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="img-box3 style2">
                        <div class="shape-line">
                            <svg viewBox="0 0 442 357">
                                <path class="shape-line" d="M220.6 3C339.98 3 437.1 100.12 437.1 219.5V351.99H440.1V219.5C440.1 160.87 417.27 105.75 375.81 64.29C334.35 22.83 279.23 0 220.6 0C161.97 0 106.85 22.83 65.39 64.29C28.67 101.01 6.57 148.46 2 199.56H5.02C15.12 89.5 107.94 3 220.6 3Z" />
                                <path class="shape-dot" d="M7 198.5C7 200.433 5.433 202 3.5 202C1.567 202 0 200.433 0 198.5C0 196.567 1.567 195 3.5 195C5.433 195 7 196.567 7 198.5Z" />
                                <path class="shape-dot" d="M442 353.5C442 355.433 440.433 357 438.5 357C436.567 357 435 355.433 435 353.5C435 351.567 436.567 350 438.5 350C440.433 350 442 351.567 442 353.5Z" />
                            </svg>
                        </div>
                        <div class="text-shape">
                            <svg viewBox="0 0 408 579">
                                <path id="textboxpath2" d="M0 204C0 91.3339 91.3339 0 204 0V0C316.666 0 408 91.3339 408 204V316.879V375C408 487.666 316.666 579 204 579V579C91.3339 579 0 487.666 0 375V204Z"></path>
                                <text>
                                    <textPath href="#textboxpath2" startOffset="810">Onsectttur adipiscung</textPath>
                                </text>
                            </svg>
                        </div>
                        <div class="img-product">
                            <a href="shop-details.html"><img src="assets/img/about/price-2-1-1.png" alt="about"></a>
                            <p class="product-title"><a href="shop-details.html" class="text-inherit">face vitamin</a></p>
                            <p class="product-price">$12.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-8 col-xxl-auto wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area text-center text-md-start">
                        <span class="text-white sec-subtitle">Experience Wellnez <span class="sec-subtext bg-theme">25 Years</span></span>
                        <h2 class="text-white sec-title">Perfect Package</h2>
                    </div>
                    <div class="price-inner2">
                        <div class="row vs-carousel" data-slide-show="2" data-lg-slide-show="1">
                            <div class="col-lg-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-left">
                                            <p class="package-price">12<span class="currency">$</span></p>
                                            <p class="package-duration">Billed Monthly</p>
                                        </div>
                                        <h3 class="package-name">Basic Plan</h3>
                                    </div>
                                    <div class="package-shape"><img src="assets/img/shape/price-shape-2.png" alt="shape"></div>
                                    <div class="package-list">
                                        <ul class="list-unstyled">
                                            <li><span class="text-title">Mobile-Optimized</span></li>
                                            <li>Free Custom Domain</li>
                                            <li>Best Hosting</li>
                                            <li>Max Makup</li>
                                            <li>Outstanding Support</li>
                                            <li>Happy Customers</li>
                                        </ul>
                                    </div>
                                    <div class="package-btn">
                                        <a href="contact.html" class="vs-btn style3">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-left">
                                            <p class="package-price">29<span class="currency">$</span></p>
                                            <p class="package-duration">Billed Yearly</p>
                                        </div>
                                        <h3 class="package-name">Mega Plan</h3>
                                    </div>
                                    <div class="package-shape"><img src="assets/img/shape/price-shape-2.png" alt="shape"></div>
                                    <div class="package-list">
                                        <ul class="list-unstyled">
                                            <li><span class="text-title">Mobile-Optimized</span></li>
                                            <li>Free Custom Domain</li>
                                            <li>Best Hosting</li>
                                            <li>Max Makup</li>
                                            <li>Outstanding Support</li>
                                            <li>Happy Customers</li>
                                        </ul>
                                    </div>
                                    <div class="package-btn">
                                        <a href="contact.html" class="vs-btn style3">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
    Testimonial Area
    ==============================-->
    <section class=" space">
        <div class="parallax" data-parallax-image="assets/img/bg/testi-bg-2-1.jpg"></div>
        <div class="shape-mockup jump-reverse d-none d-xxl-block" data-top="12%" data-right="6%"><img src="assets/img/shape/leaf-1-1.png" alt="shape"></div>
        <div class="shape-mockup jump  d-none d-xxl-block" data-top="35%" data-left="17.5%"><img src="assets/img/shape/leaf-1-8.png" alt="shape"></div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sec-subtitle">client testimonial</span>
                <h2 class="sec-title">Wellnez Customers</h2>
            </div>
            <div class="pb-1px"></div>
            <div class="testi-style2">
                <span class="vs-icon"><img src="assets/img/icon/quote-1-1.png" alt="icon"></span>
                <div class="vs-carousel" data-slide-show="1" data-fade="true" data-arrows="true" data-ml-arrows="true" data-xl-arrows="true" data-lg-arrows="true" data-prev-arrow="fal fa-long-arrow-left" data-next-arrow="fal fa-long-arrow-right">
                    <div>
                        <p class="testi-text">“We think your skin should look and refshed matter Nourish your outer inner beauty with our essential oil infused beauty products”</p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5">Thomas Muller</h3>
                        <span class="testi-degi">CEO, SPATHINK</span>
                    </div>
                    <div>
                        <p class="testi-text">“From its medieval origins to the digital era, learn everything there is to know about the ubiquitous lorem ipsum passage known”</p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5">William Shak</h3>
                        <span class="testi-degi">Manager, LDC</span>
                    </div>
                    <div>
                        <p class="testi-text">“Creation timelines for the standard lorem ipsum passage vary, with some citing the 15th century and others the part of Cicero”</p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5">Vivi Marian</h3>
                        <span class="testi-degi">Customer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- footer -->

    <?php include 'includes/footer.php'; ?>
    
    <!-- All Js File -->
    
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/js/slick.min.js"></script>
    <!-- <script src="assets/js/app.min.js"></script> -->

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Parallax Scroll -->
    <script src="assets/js/universal-parallax.min.js"></script>
    <!-- Wow.js Animation -->
    <script src="assets/js/wow.min.js"></script>
    <!-- jQuery Datepicker -->
    <script src="assets/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>


</body>

</html>