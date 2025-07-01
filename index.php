<?php
// Include database connection at the top of your index.php
include 'config/db.php';

// Fetch services from database
$services = [];
$result = $conn->query("SELECT * FROM services ORDER BY name");
if ($result) {
    $services = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>King's Executive barber & Spa</title>
    <meta name="author" content="Kings executive barber & spa">
    <meta name="description" content="King's Executive barber & Spa">
    <meta name="keywords" content="beauty, beauty salon, beauty shop, beauty spa, barbershop, barber, hairdresser, massage, salon, spa">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    
	<!-- Google Fonts -->
	
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Marcellus&display=swap" rel="stylesheet">


   
	<!-- All CSS File -->

    <!-- Bootstrap -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">    
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Layerslider -->
    <link rel="stylesheet" href="assets/css/layerslider.min.css">
    <!-- jQuery DatePicker -->
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Header Area top bar/ navbar -->

    <header class="vs-header header-layout2">

        <!-- Top bar -->

        <div class="header-top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-sm-auto text-center">
                        <div class="header-links style-white">
                            <ul>
                                <li class="d-none d-xxl-inline-block"><i class="far fa-map-marker-alt"></i>121 King St. Melbourne VIC 3000, Australia</li>
                                <li><i class="far fa-phone-alt"></i><a href="tel:+25632542598">(+256) 3254 2598</a></li>
                                <li><i class="far fa-envelope"></i><a href="mailto:example@Wellnez.com">example@Wellnez.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto d-none d-sm-block">
                        <div class="social-style1">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar links -->

        <div class="sticky-wrap">
            <div class="sticky-active">
                <div class="menu-area">
                    <div class="menu-inner">
                        <div class="container">
                            <div class="row justify-content-between align-items-center gx-60">
                                <div class="col">
                                    <div class="header-logo">
                                        <a href=""><img src="assets/img/logo2.png" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <nav class="main-menu menu-style1 d-none d-lg-block">
                                        <ul>
                                            <li>
                                                <a href="">Home</a>                        
                                            </li>
                                            <li>
                                                <a href="pages/about">About Us</a>
                                            </li>
                                            <li>                                                                                               
                                                <a href="pages/service">Services</a>
                                            </li>
                                            <li>
                                                <a href="pages/blog">Blog</a>                       
                                            </li>                                                                                     
                                            <li>
                                                <a href="pages/contact">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-auto">
                                    <div class="header-icons">
                                        
                                        <a href="pages/appointment" class="vs-btn style8 d-none d-xl-inline-block">Book</a>
                                        <button class="bar-btn sideMenuToggler d-none d-xl-inline-block">
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                        </button>
                                        <button class="vs-menu-toggle d-inline-block d-lg-none" type="button"><i class="fal fa-bars"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Mobile Menu -->
  
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href=""><img src="assets/img/logo2.png" alt="KING'S EXECUTIVE Barbershop & SPA"></a>
            </div>
            <div class="vs-mobile-menu">
                <ul>
                    <li>
                        <a href="">Home</a>                        
                    </li>
                    <li>
                        <a href="pages/about">About Us</a>
                    </li>
                    <li>                        
                        <a href="pages/service">Services</a>                                                
                    </li>
                    <li>
                        <a href="pages/blog">Blog</a>                       
                    </li>                                          
                    <li>
                        <a href="pages/contact">Contact Us</a>
                    </li>
                    <li>
                        <a href="pages/appointment">Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- end mobile menu -->

    <!-- Sidemenu -->

    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget  ">
                <div class="mobile-logo">
                    <a href=""><img src="assets/img/logo2.png" alt="KING'S EXECUTIVE Barbershop & SPA"></a>
                </div>
                <div class="info-media1">
                    <div class="media-icon"><i class="fal fa-map-marker-alt"></i></div>
                    <span class="media-label">Levo Petrol Station, next to Club Step Two, Embu</span>
                </div>
                <div class="info-media1">
                    <div class="media-icon"><i class="far fa-phone-alt "></i></div>
                    <span class="media-label"><a href="tel:+254704843035" class="text-inherit"> +254704843035</a></span>
                </div>
                <div class="info-media1">
                    <div class="media-icon"><i class="fal fa-envelope"></i></div>
                    <span class="media-label"><a class="text-inherit" href="kings2023@gmail.com">kings2023@gmail.com</a></span>
                </div>
            </div>
            <div class="widget  ">
                <h3 class="widget_title">Latest post</h3>
                <div class="recent-post-wrap">
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/widget/recent-post-1-1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Skinscent Experience Oskarsson</a></h4>
                            <div class="recent-post-meta">
                                <a href="pages/blog"><i class="fas fa-calendar-alt"></i>march 10, 2023</a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/widget/recent-post-1-2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Lorem ipsum is placeholder recent popular</a></h4>
                            <div class="recent-post-meta">
                                <a href="pages/blog"><i class="fas fa-calendar-alt"></i>Augest 10, 2023</a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/widget/recent-post-1-3.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">From its medieval origins health custom</a></h4>
                            <div class="recent-post-meta">
                                <a href="pages/blog"><i class="fas fa-calendar-alt"></i>July 11, 2023</a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/widget/recent-post-1-4.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Letraset's dry-transfer sheets later</a></h4>
                            <div class="recent-post-meta">
                                <a href="pages/blog"><i class="fas fa-calendar-alt"></i>March 05, 2023</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    
    
    <!-- Hero Area -->

    <section class="hero-layout2">
        <div class="hero-shape-1 jump" data-bottom="12%" data-left="4%"><img src="assets/img/hero/hero-leaf-4.png" alt="shape"></div>
        <div class="hero-shape-2 jump-reverse" data-right="43%" data-top="9%"><img src="assets/img/hero/hero-leaf-3.png" alt="shape"></div>
        <div class="hero-shape-3 jump" data-right="2%" data-top="17%"><img src="assets/img/hero/hero-leaf-5.png" alt="shape"></div>
        <div class="hero-shape-4 rotate-reverse-img" data-top="37%" data-left="46%"><img src="assets/img/hero/hero-flower-small-2.png" alt="shape"></div>
        <div class="hero-shape-5"></div>
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-flower"><img src="assets/img/hero/hero-flower.png" alt="hero" class="jump"></div>
                <div class="media-style3">
                    <div class="circle-btn style2">
                        <a href="about.php" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                        <div class="btn-text">
                            <svg viewBox="0 0 150 150">
                                <text>
                                    <textPath href="#textPath">step into style and relaxation</textPath>
                                </text>
                            </svg>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-label fw-bold" style="font-family:'Marcellus', serif">_KING'S EXECUTIVE Barbershop & SPA</p>                    
                        &nbsp;
                        <p class='fst-italic fw-bold' style="font-family:'Marcellus', serif">Get precision <span class="b">cuts</span>, clean <span class="b">shaves</span>, soothing <span class="b">massages</span>, <span class="b">facials</span>, <span class="b">manicures</span> & more — experience top-to-toe grooming tailored for you.</p>
                        <!-- <p class="media-title"></p> -->
                    </div>

                </div>

                <div class="row gx-50">

                    <div class="col-md-6 col-xxl-auto">
                        <div class="package-style1 layout2">
                            <div class="package-top">
                                <h3 class="package-name">Classic Grooming</h3>
                                <p class="package-description">Enjoy a tailored haircut, precise shave, or beard trim in a warm, inviting atmosphere.</p>
                            </div>
                            <div class="package-shape"><img src="assets/img/shape/price-shape-3.png" alt="shape"></div>
                            <div class="package-img">
                                <img src="assets/img/shave.webp" alt="price">
                                <i class="package-dot rotate"></i>
                            </div>
                            <div class="package-btn">
                                <a href="pages/appointment" class="vs-btn style5">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-auto">
                        <div class="package-style1 layout2 active">
                            <div class="package-top">
                                <h3 class="package-name">Spa Retreat</h3>
                                <p class="package-description">Unwind with soothing massages, facial treatments, and more for ultimate relaxation.</p>
                            </div>
                            <div class="package-shape"><img src="assets/img/shape/price-shape-3.png" alt="shape"></div>
                            <div class="package-img">
                                <img src="assets/img/facial.webp" alt="price">
                                <i class="package-dot rotate-reverse"></i>
                            </div>
                            <div class="package-btn">
                                <a href="pages/appointment" class="vs-btn style5">Book Now</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="hero-img-wrapper">

                <div class="hero-img">                    
                    <video class="video-background" width="600" height="" autoplay muted loop>
                        <!-- <video class="video-background" width="600" height="" autoplay muted loop controls > -->
                        <source src="assets/img/vid1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> 
                    <!-- <div class="hero-ripple"><i class="ripple"></i><i class="ripple"></i></div> -->                     
                </div>                                
                
            </div>
        </div>
    </section>
    
    <!-- Brand Partners -->

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(0.5deg); }
        }
        
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 10px rgba(20, 20, 22, 0.3); }
            50% { box-shadow: 0 0 20px rgba(31, 32, 34, 0.6); }
        }
        
        .ai-service-display {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 40px 0;
            position: relative;
            overflow: hidden;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .ai-service-display::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(100, 200, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 100, 200, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .ai-service-tag {
            display: inline-block;
            font-weight: 500;
            color: #333;
            font-size: 1.1rem;
            background: rgba(255, 255, 255, 0.9);
            padding: 14px 32px;
            border-radius: 8px;
            margin: 10px;
            transition: all 0.4s ease;
            font-family: 'Inter', sans-serif;
            border: 1px solid rgba(27, 30, 32, 0.1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            animation: float 6s ease-in-out infinite, glow 4s ease-in-out infinite;            
            letter-spacing: 1px;
        }
        
        .ai-service-tag::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(100, 200, 255, 0) 0%,
                rgba(100, 200, 255, 0.2) 50%,
                rgba(100, 200, 255, 0) 100%
            );
            transform: rotate(30deg);
            transition: all 0.6s ease;
            opacity: 0;
        }
        
        .ai-service-tag:hover {
            transform: translateY(-5px) scale(1.03);
            background: rgba(255, 255, 255, 1);
            color: #0066cc;
            border-color: rgba(34, 36, 38, 0.6);
            animation-play-state: paused;
        }
        
        .ai-service-tag:hover::before {
            opacity: 1;
            animation: shine 1.5s ease;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-30%, -30%); }
            100% { transform: rotate(30deg) translate(30%, 30%); }
        }
        
        .ai-service-tag:nth-child(odd) {
            animation-delay: 0.2s;
        }
        
        .ai-service-tag:nth-child(even) {
            animation-delay: 0.4s;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .ai-service-tag {
                padding: 12px 24px;
                font-size: 0.95rem;
                margin: 8px;
            }
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <div class="ai-service-display">
        <div class="container">
            <div class="row vs-carousel text-center" data-slide-show="6" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="2">
                <div class="col-auto">
                    <p class="ai-service-tag">Precision Shaves</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Hair Coloring</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Massage Therapy</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Haircuts</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Beard Trimming</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Facial Treatments</p>
                </div>
                <div class="col-auto">
                    <p class="ai-service-tag">Car Wash</p>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Feature Area -->
    
    <section class="space-top space-extra-bottom bg-gradient-1 z-index-common">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                <span class="sec-subtitle">barbershop & spa</span>
                <h2 class="sec-title">Grooming & Relaxation Services</h2>
                <div class="sec-shape"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
            </div>

            <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <div class="col-lg-4 col-xl-4">
                            <div class="feature-style2">
                                <div class="vs-icon style2">
                                    <!-- You can customize icons based on service name or add an icon field to your database -->
                                    <?php 
                                    $icon = "assets/img/icon/fe-1-1.png"; // Default icon
                                    if (stripos($service['name'], 'hair') !== false) {
                                        $icon = "assets/img/icon/fe-1-1.png";
                                    } elseif (stripos($service['name'], 'spa') !== false) {
                                        $icon = "assets/img/icon/fe-1-2.png";
                                    } elseif (stripos($service['name'], 'color') !== false) {
                                        $icon = "assets/img/icon/fe-1-3.png";
                                    }
                                    ?>
                                    <img src="<?= $icon ?>" alt="icon">
                                </div>
                                <h3 class="feature-title h4"><?= htmlspecialchars($service['name']) ?></h3>
                                <div class="arrow-shape">
                                    <i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i>
                                </div>
                                <p class="feature-text"><?= htmlspecialchars($service['description']) ?></p>
                                <!-- <a href="about.html" class="link-btn style2">read more</a> -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback content if no services exist -->
                    <div class="col-lg-4 col-xl-4">
                        <div class="feature-style2">
                            <div class="vs-icon style2"><img src="assets/img/icon/fe-1-1.png" alt="icon"></div>
                            <h3 class="feature-title h4">Our Services</h3>
                            <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                            <p class="feature-text">Check back soon for our complete service offerings.</p>
                            <a href="about.html" class="link-btn style2">read more</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Area -->

    <section class="space-bottom">
        <div class="shape-mockup d-none d-xxxl-block" data-top="-26%" data-left="-10%">
            <div class="curb-shape1"></div>
        </div>
        <div class="shape-mockup jump d-none d-xxxl-block" data-top="-50%" data-right="0"><img src="assets/img/shape/b-s-1-5.png" alt="shape"></div>
        <div class="shape-mockup jump-reverse d-none d-xxxl-block" data-top="6%" data-right="13%"><img src="assets/img/shape/leaf-1-4.png" alt="shape"></div>
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="title-style2">The <span class="text-theme">Gentleman's</span> Retreat</h2>
                <p class="subtitle">Where precision meets relaxation</p>
            </div>
            
            <div class="row gx-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="img-box2">
                        <div class="img-1">
                            <img src="assets/img/about/ab-2-1.jpg" alt="Professional barber giving a haircut" class="rounded-3">
                        </div>
                        <div class="img-2 jump"><img src="assets/img/shape/leaf-1-3.png" alt="decorative leaf"></div>
                        <div class="img-shape">
                            <span class="img-text jump-reverse">Est. 2013</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="about-box1 ps-lg-4">                        
                        <div class="media-style1 mb-4">
                            <div class="circle-btn style3">
                                <a href="about.html" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                                <div class="btn-text">
                                    <svg viewBox="0 0 150 150">
                                        <text>
                                            <textPath href="#textPath">experience the art of traditional grooming</textPath>
                                        </text>
                                    </svg>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="media-text">Where classic techniques meet modern style</p>
                            </div>
                        </div>
                        
                        <p class="about-text mb-4">At our barbershop, we don't just cut hair - we craft confidence. Our master barbers combine time-honored techniques with contemporary styles to give you a look that's uniquely yours.</p>
                        
                        <div class="feature-grid mb-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="feature-card">
                                        <i class="fas fa-cut"></i>
                                        <h6>Precision Cuts</h6>
                                        <p>Every strand perfectly placed</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card">
                                        <i class="fas fa-spa"></i>
                                        <h6>Hot Towel Service</h6>
                                        <p>Ultimate relaxation</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card">
                                        <i class="fas fa-chair"></i>
                                        <h6>Premium Products</h6>
                                        <p>Quality you can feel</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-card">
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Beard Mastery</h6>
                                        <p>Sculpted perfection</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cta-box text-center text-lg-start">
                            <a href="pages/service" class="btn style3">Discover Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section-title {
            position: relative;
            margin-bottom: 40px;
        }
        
        .title-style2 {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .title-style2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--theme-color);
        }
        
        .subtitle {
            font-size: 1.1rem;
            color: #666;
            font-weight: 400;
        }
        
        .feature-grid {
            margin: 30px 0;
        }
        
        .feature-card {
            background: rgba(255,255,255,0.8);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 8px;
            padding: 20px;
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        
        .feature-card i {
            font-size: 1.8rem;
            color: var(--theme-color);
            margin-bottom: 15px;
            display: block;
        }
        
        .feature-card h6 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .feature-card p {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }
        
        .btn.style3 {
            background: var(--theme-color);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            border: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn.style3:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .space-bottom {
            padding: 60px 0;
            position: relative;
        }
        
        @media (max-width: 991.98px) {
            .space-bottom {
                padding: 40px 0;
            }
            
            .title-style2 {
                font-size: 2rem;
            }
        }
    </style>

    <!-- Gallery Area -->
    
    <!-- <div class="position-relative space-extra-bottom">
        <div class="gallery-shape1"></div>
        <div class="container-fluid">
            <div class="row gallery-slider1 vs-carousel" data-slide-show="1" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true" data-center-padding="477px" data-xl-center-padding="320px" data-ml-center-padding="200px" data-lg-center-padding="150px" data-md-center-padding="80px">
                <div class="col">
                    <div class="gallery-style2">
                        <div class="gallery-img"><img src="assets/img/gallery/gal-3-1.jpg" alt="gallery"></div>
                        <div class="circle-btn style2">
                            <a href="gallery-details.html" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                            <div class="btn-text">
                                <svg viewBox="0 0 150 150">
                                    <text>
                                        <textPath href="#textPath">experience the ultimate grooming and relaxation</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gallery-style2">
                        <div class="gallery-img"><img src="assets/img/gallery/gal-3-2.jpg" alt="gallery"></div>
                        <div class="circle-btn style2">
                            <a href="gallery-details.html" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                            <div class="btn-text">
                                <svg viewBox="0 0 150 150">
                                    <text>
                                        <textPath href="#textPath">experience the ultimate grooming and relaxation</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gallery-style2">
                        <div class="gallery-img"><img src="assets/img/gallery/gal-3-3.jpg" alt="gallery"></div>
                        <div class="circle-btn style2">
                            <a href="gallery-details.html" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                            <div class="btn-text">
                                <svg viewBox="0 0 150 150">
                                    <text>
                                        <textPath href="#textPath">experience the ultimate grooming and relaxation</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gallery-style2">
                        <div class="gallery-img"><img src="assets/img/gallery/gal-3-4.jpg" alt="gallery"></div>
                        <div class="circle-btn style2">
                            <a href="gallery-details.html" class="btn-icon"><i class="far fa-arrow-right"></i></a>
                            <div class="btn-text">
                                <svg viewBox="0 0 150 150">
                                    <text>
                                        <textPath href="#textPath">experience the ultimate grooming and relaxation</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arrows-style1">
                <button data-slick-prev=".gallery-slider1"><i class="arrow"></i>Prev</button>
                <button data-slick-next=".gallery-slider1"><i class="arrow"></i>Next</button>
            </div>
        </div>
    </div> -->

    <!-- Service Area -->
    
    <!-- <section class=" space">
        <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
            <span class="sec-subtitle">our services</span>
            <h2 class="sec-title">Discover Our Barbershop & Spa</h2>
            <div class="sec-shape mb-5 pb-1"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
        </div>
        <div class="service-inner1">
            <div class="shape-mockup jump d-none d-xxl-block" data-top="-25%" data-right="1%"><img src="assets/img/hero/hero-leaf-5.png" alt="shape"></div>
            <div class="container-xl">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 col-lg-5 col-xxl-auto">
                        <div class="service-style1 reverse">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-1.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Precision Shaves</a></h3>
                                <p class="service-text">Baby shaves, smooth shaves, and more for a clean, polished look.</p>
                            </div>
                        </div>
                        <div class="service-style1 reverse">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-2.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Hair Coloring</a></h3>
                                <p class="service-text">Vibrant dye and color services to enhance your style.</p>
                            </div>
                        </div>
                        <div class="service-style1 reverse">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-3.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Massage Therapy</a></h3>
                                <p class="service-text">Relax and rejuvenate with our expert massage services.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xxl-auto text-center d-none d-lg-block">
                        <img src="assets/img/bg/sr-shape-1-1.png" alt="shape" class="mt-n4">
                    </div>
                    <div class="col-md-6 col-lg-5 col-xxl-auto">
                        <div class="service-style1">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-4.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Haircuts</a></h3>
                                <p class="service-text">Custom haircuts tailored to your style and preference.</p>
                            </div>
                        </div>
                        <div class="service-style1">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-5.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Beard Trimming</a></h3>
                                <p class="service-text">Expert beard shaping for a sharp, groomed appearance.</p>
                            </div>
                        </div>
                        <div class="service-style1">
                            <div class="vs-icon"><img src="assets/img/icon/sr-i-1-6.png" alt="icon"></div>
                            <div class="service-content">
                                <h3 class="service-title"><a href="service-details.html" class="text-inherit">Facial Treatments</a></h3>
                                <p class="service-text">Face scrubbing and masking for refreshed, healthy skin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Team Area -->
    
    <section class="team-section space-bottom">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                <span class="sec-subtitle">MEET THE ARTISANS</span>
                <h2 class="sec-title">Master Craftsmen of Grooming</h2>
                <div class="sec-shape">
                    <svg width="100" height="8" viewBox="0 0 100 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4C2 4 18 -2 50 4C82 10 98 4 98 4" stroke="var(--theme-color)" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            
            <div class="row vs-carousel" data-arrows="true" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2">
                <!-- Team Member 1 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="assets/img/team/team-1-1.png" alt="Master Barber Lenda Murray">
                                <div class="team-overlay">
                                    <span class="exp-badge">12 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="team-details.html">Lenda Murray</a></h3>
                            <p class="team-degi">Master Barber</p>
                            <div class="team-specialty">Classic & Modern Cuts</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="assets/img/team/team-1-2.png" alt="Spa Therapist Emely Jonson">
                                <div class="team-overlay">
                                    <span class="exp-badge">8 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="team-details.html">Emely Jonson</a></h3>
                            <p class="team-degi">Spa Therapist</p>
                            <div class="team-specialty">Holistic Relaxation</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="assets/img/team/team-1-3.png" alt="Hair Stylist Arika Murray">
                                <div class="team-overlay">
                                    <span class="exp-badge">10 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="team-details.html">Arika Murray</a></h3>
                            <p class="team-degi">Hair Artist</p>
                            <div class="team-specialty">Creative Styling</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 4 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="team-details.html">
                                <img src="assets/img/team/team-1-4.png" alt="Massage Expert Lola Jonson">
                                <div class="team-overlay">
                                    <span class="exp-badge">7 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="team-details.html">Lola Jonson</a></h3>
                            <p class="team-degi">Massage Expert</p>
                            <div class="team-specialty">Therapeutic Techniques</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .team-section {
            background: #f9f9f9;
            position: relative;
            padding: 80px 0;
        }
        
        .sec-subtitle {
            display: block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--theme-color);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .sec-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .sec-shape {
            margin: 20px auto 40px;
        }
        
        .team-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 30px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            margin-bottom: 30px;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        .team-img {
            position: relative;
            overflow: hidden;
        }
        
        .team-img img {
            width: 100%;
            transition: transform 0.5s ease;
        }
        
        .team-card:hover .team-img img {
            transform: scale(1.05);
        }
        
        .team-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .team-card:hover .team-overlay {
            opacity: 1;
        }
        
        .exp-badge {
            background: var(--theme-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .team-info {
            padding: 25px;
            text-align: center;
        }
        
        .team-name {
            font-size: 1.3rem;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }
        
        .team-name a:hover {
            color: var(--theme-color);
        }
        
        .team-degi {
            color: var(--theme-color);
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .team-specialty {
            font-size: 13px;
            color: #666;
            font-style: italic;
        }
        
        @media (max-width: 991px) {
            .sec-title {
                font-size: 2rem;
            }
            
            .team-section {
                padding: 60px 0;
            }
        }
    </style>

    <!-- Price Plan Area -->
    
    <!-- <section class="" data-bg-src="assets/img/bg/price-bg-1-1.jpg">
        <div class="shape-mockup jump d-none d-xxl-block" data-right="2%" data-top="8%"><img src="assets/img/shape/leaf-1-1.png" alt="leaf"></div>
        <div class="container-fluid px-0 hd-container1">
            <div class="row gx-80 align-items-center">
                <div class="col-xl-auto wow fadeInUp" data-wow-delay="0.2s">
                    <div class="img-box5">
                        <img src="assets/img/about/price-1-1.jpg" alt="price">
                    </div>
                </div>
                <div class="col space-top space-extra-bottom wow fadeInUp" data-wow-delay="0.3s">
                    <div class="title-area text-center text-xl-start">
                        <span class="sec-subtitle">Pricing Plans</span>
                        <h2 class="sec-title">Your Perfect Package</h2>
                    </div>
                    <div class="price-inner1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-left">
                                            <p class="package-price">15<span class="currency">$</span></p>
                                            <p class="package-duration">Per Visit</p>
                                        </div>
                                        <h3 class="package-name">Basic Grooming</h3>
                                    </div>
                                    <div class="package-shape"><img src="assets/img/shape/price-shape-2.png" alt="shape"></div>
                                    <div class="package-list">
                                        <ul class="list-unstyled">
                                            <li><span class="text-title">Haircut</span></li>
                                            <li>Beard Trimming</li>
                                            <li>Basic Shave</li>
                                            <li>Parking Access</li>
                                            <li>Backup Power</li>
                                            <li>Nearby Pizza Inn</li>
                                        </ul>
                                    </div>
                                    <div class="package-btn">
                                        <a href="contact.html" class="vs-btn style3">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="package-style1">
                                    <div class="package-top">
                                        <div class="package-left">
                                            <p class="package-price">60<span class="currency">$</span></p>
                                            <p class="package-duration">Per Visit</p>
                                        </div>
                                        <h3 class="package-name">Deluxe Spa</h3>
                                    </div>
                                    <div class="package-shape"><img src="assets/img/shape/price-shape-2.png" alt="shape"></div>
                                    <div class="package-list">
                                        <ul class="list-unstyled">
                                            <li><span class="text-title">Haircut & Color</span></li>
                                            <li>Beard Trimming</li>
                                            <li>Face Scrubbing</li>
                                            <li>Massage Therapy</li>
                                            <li>Car Wash</li>
                                            <li>All Amenities</li>
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
    </section> -->

    <!-- Product Area -->
    
    <!-- <section class=" space-top">
        <div class="container">
            <div class="row mb-5">
                <div class="col-auto">
                    <h2 class="sec-title mb-n2">Grooming Essentials</h2>
                </div>
                <div class="col align-self-end">
                    <div class="sec-line pb-1"></div>
                </div>
            </div>
            <div class="row vs-carousel" data-slide-show="4" data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2">
                <div class="col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/p-1-1.png" alt="product" class="w-100"></a>
                            <div class="actions">
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="#" class="vs-btn style4">Add To Cart</a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-content">
                                <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Beard Oil</a></h3>
                                <div class="product-category">
                                    <a href="shop.html">Grooming</a>
                                </div>
                            </div>
                            <span class="product-price">$10.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/p-1-2.png" alt="product" class="w-100"></a>
                            <div class="actions">
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="#" class="vs-btn style4">Add To Cart</a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-content">
                                <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Hair Pomade</a></h3>
                                <div class="product-category">
                                    <a href="shop.html">Styling</a>
                                </div>
                            </div>
                            <span class="product-price">$12.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/p-1-3.png" alt="product" class="w-100"></a>
                            <div class="actions">
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="#" class="vs-btn style4">Add To Cart</a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-content">
                                <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Face Scrub</a></h3>
                                <div class="product-category">
                                    <a href="shop.html">Skincare</a>
                                </div>
                            </div>
                            <span class="product-price">$15.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/p-1-4.png" alt="product" class="w-100"></a>
                            <div class="actions">
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="#" class="vs-btn style4">Add To Cart</a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-content">
                                <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Hair Dye</a></h3>
                                <div class="product-category">
                                    <a href="shop.html">Coloring</a>
                                </div>
                            </div>
                            <span class="product-price">$20.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/p-1-5.png" alt="product" class="w-100"></a>
                            <div class="actions">
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                <a href="#" class="icon-btn"><i class="far fa-eye"></i></a>
                                <a href="#" class="vs-btn style4">Add To Cart</a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-content">
                                <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Massage Oil</a></h3>
                                <div class="product-category">
                                    <a href="shop.html">Spa</a>
                                </div>
                            </div>
                            <span class="product-price">$18.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Blog Area -->
    
    <section class="blog-section space-md">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                <span class="sec-subtitle">PROFESSIONAL ADVICE</span>
                <h2 class="sec-title">Essential Grooming Insights</h2>
                <div class="sec-shape">
                    <svg width="100" height="8" viewBox="0 0 100 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4C2 4 18 -2 50 4C82 10 98 4 98 4" stroke="var(--theme-color)" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            
            <div class="row vs-carousel arrow-margin wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2" data-arrows="true">
                <!-- Blog Post 1 -->
                <div class="col-xl-4">
                    <div class="blog-card">
                        <div class="blog-img">                            
                            <img src="assets/img/blog/blog-1-1.jpg" alt="Professional beard grooming techniques" class="w-100" loading="lazy">
                            <span class="blog-category">Beard Mastery</span>                            
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">Beard Care Secrets from Master Barbers</h3>
                            <div class="blog-features">
                                <span>Daily washing prevents irritation</span>
                                <span>Special oils promote healthy growth</span>
                                <span>Proper trimming maintains shape</span>
                                <span>Brushing distributes natural oils</span>
                            </div>
                            <div class="blog-author">By Senior Barber John</div>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Post 2 -->
                <div class="col-xl-4">
                    <div class="blog-card">
                        <div class="blog-img">                            
                            <img src="assets/img/blog/blog-1-2.jpg" alt="Relaxing spa facial treatment" class="w-100" loading="lazy">
                            <span class="blog-category">Skin Wellness</span>                            
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">Transform Your Skin with These Treatments</h3>
                            <div class="blog-features">
                                <span>Deep cleansing removes impurities</span>
                                <span>Exfoliation renews skin surface</span>
                                <span>Hydration prevents premature aging</span>
                                <span>Massage improves circulation</span>
                            </div>
                            <div class="blog-author">By Esthetician Vivi</div>
                        </div>
                    </div>
                </div>
                
                <!-- Blog Post 3 -->
                <div class="col-xl-4">
                    <div class="blog-card">
                        <div class="blog-img">                            
                            <img src="assets/img/blog/blog-1-3.jpg" alt="Hair color consultation session" class="w-100" loading="lazy">
                            <span class="blog-category">Hair Coloring</span>                            
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">Professional Hair Color Selection Guide</h3>
                            <div class="blog-features">
                                <span>Warm tones complement golden skin</span>
                                <span>Cool tones suit pink undertones</span>
                                <span>Balayage creates natural dimension</span>
                                <span>Gloss treatments enhance shine</span>
                            </div>
                            <div class="blog-author">By Colorist Jane</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .blog-section {
            padding: 60px 0;
            background: #fafafa;
        }
        
        .sec-subtitle {
            display: block;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--theme-color);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .sec-title {
            font-size: 2.2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .sec-shape {
            margin: 15px auto 30px;
        }
        
        .blog-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            margin-bottom: 20px;
            height: 100%;
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .blog-img {
            position: relative;
            height: 220px;
            overflow: hidden;
        }
        
        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover .blog-img img {
            transform: scale(1.05);
        }
        
        .blog-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--theme-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .blog-content {
            padding: 20px;
        }
        
        .blog-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        
        .blog-title a:hover {
            color: var(--theme-color);
        }
        
        .blog-features {
            display: grid;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .blog-features span {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #555;
            line-height: 1.4;
        }
        
        .blog-features span:before {
            content: "•";
            color: var(--theme-color);
            margin-right: 8px;
            font-weight: bold;
        }
        
        .blog-author {
            font-size: 0.85rem;
            color: #777;
            font-style: italic;
        }
        
        @media (max-width: 991px) {
            .blog-img {
                height: 180px;
            }
            
            .sec-title {
                font-size: 1.8rem;
            }
        }
    </style>  
            
    <!-- All Js Files -->

    <?php include './includes/footer2.php'; ?>

</body>

</html>