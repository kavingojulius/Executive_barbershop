<?php
// Include database connection at the top of your index.php
include 'config/db.php';

// Fetch services from database
$services = [];
$result = $conn->query("SELECT * FROM services ORDER BY name");
if ($result) {
    $services = $result->fetch_all(MYSQLI_ASSOC);
}




// Fetch pricing data
$pricing = [];
if ($pricing_result = $conn->query("SELECT service_name, price FROM pricing ORDER BY service_name")) {
    $pricing = $pricing_result->fetch_all(MYSQLI_ASSOC);
    $pricing_result->free();
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
    <!-- <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"> -->
    <!-- <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon"> -->

    
	<!-- Google Fonts -->
	
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Marcellus&display=swap" rel="stylesheet">
   
	<!-- All CSS File -->

    <!-- Bootstrap -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">    
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css">
    <!-- Layerslider -->
    <link rel="stylesheet" href="./assets/css/layerslider.min.css">
    <!-- jQuery DatePicker -->
    <link rel="stylesheet" href="./assets/css/jquery.datetimepicker.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="./assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="./assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <?php include_once("./includes/navbar.php") ?>        
    
    <!-- Hero Area -->

    <section class="hero-layout2">
        
        <div class="hero-shape-5" ></div>
        <!-- <div class="hero-shape-5" style="background-image: url('./assets/img/best/seatimg.jpg'); background-size: cover;background-position: center;  background-repeat: no-repeat;  background-attachment: scroll; "></div> -->
        
        
        <div class="hero-inner">
            <div class="hero-content">                
                <div class="media-style3">
                    <div class="circle-btn style2">
                        <a href="./about" class="btn-icon"><i class="far fa-arrow-right"></i></a>                        
                    </div>
                    <div class="media-body" style="">
                        <span class="media-label fw-bold" style="font-family:'Marcellus', serif; ">_KING'S EXECUTIVE Barbershop & SPA</span>                    
                        &nbsp;
                        <p class='fst-italic fw-bold text-white' style="font-family:'Marcellus', serif">Get precision <span class="b">cuts</span>, clean <span class="b">shaves</span>, soothing <span class="b">massages</span>, <span class="b">facials</span>, <span class="b">manicures</span> & more — experience top-to-toe grooming tailored for you.</p>                        
                    </div>

                </div>

                <div class="row gx-50">

                    <div class="col-md-6 col-xxl-auto">
                        <div class="package-style1 layout2">
                            <div class="package-top">
                                <h3 class="package-name">Classic Grooming</h3>
                                <p class="package-description">Enjoy a tailored haircut, precise shave, or beard trim in a warm, inviting atmosphere.</p>
                            </div>
                            <div class="package-shape"><img src="./assets/img/shape/price-shape-3.png" alt="shape"></div>
                            <div class="package-img">
                                <img src="./assets/img/best/beardcutgif.avif" alt="price">
                                <i class="package-dot rotate"></i>
                            </div>
                            <div class="package-btn">
                                <a href="./appointment" class="vs-btn style5">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-auto">
                        <div class="package-style1 layout2 active">
                            <div class="package-top">
                                <h3 class="package-name">Spa Retreat</h3>
                                <p class="package-description">Unwind with soothing massages, facial treatments, and more for ultimate relaxation.</p>
                            </div>
                            <div class="package-shape"><img src="./assets/img/shape/price-shape-3.png" alt="shape"></div>
                            <div class="package-img">
                                <!-- <img src="./assets/img/facial.webp" alt="price"> -->
                                 <img src="./assets/img/best/beardgif.gif" alt="price">
                                <i class="package-dot rotate-reverse"></i>
                            </div>
                            <div class="package-btn">
                                <a href="./appointment" class="vs-btn style5">Book Now</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="hero-img-wrapper">

                <div class="hero-img">                    
                    <video class="video-background" autoplay muted loop style="width: 80%; height: 500px; object-fit: cover;">
                        <source src="./assets/img/shave.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                     
                </div>                                
                
            </div>
        </div>
    </section>
    
        
        
    <!-- Services Area -->
    
        <section class="space-top space-extra-bottom bg-gradient-1">
            <div class="container">
                <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h5 class="">***<span class="text-theme"> Our</span> Services ***</h5>
                    <h2 class="sec-title">Grooming & Relaxation Services</h2>
                    <div class="sec-shape"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
                </div>

                <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2">
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $service): ?>
                            <div class="col-lg-4 col-xl-4">
                                <div class="feature-style2">
                                    <div class="vs-icon style2">
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
                                    <p class="feature-text line-clamp-2"><?= htmlspecialchars($service['description']) ?></p>
                                    <button class="link-btn style2 read-more-btn" 
                                            data-name="<?= htmlspecialchars($service['name']) ?>"
                                            data-description="<?= htmlspecialchars($service['description']) ?>"
                                            data-icon="<?= $icon ?>">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback content remains the same -->
                    <?php endif; ?>
                </div>

                <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">                    
                    <a href="./service" class="vs-btn style2 mt-4">View all our services</a>
                    <!-- <a href="./service" class="btn style3">View all Our Services</a> -->
                </div>
            </div>
        </section>

        <!-- Modal moved outside the section to prevent z-index issues -->
        <div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="serviceModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <img src="" id="serviceModalIcon" alt="Service Icon" class="img-fluid" style="max-height: 80px;">
                        </div>
                        <p id="serviceModalDescription"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Limit description to 2 lines with ellipsis */
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                min-height: 3em; /* Adjust based on your line-height */
            }

            /* Style for read more button */
            .read-more-btn {
                margin-top: 10px;
                cursor: pointer;
                background: transparent;
                border: none;
                color: inherit;
                padding: 0;
                font: inherit;
                text-decoration: underline;
            }

            /* Modal z-index fixes */
            #serviceModal {
                z-index: 99999 !important;
            }
            
            .modal-backdrop {
                z-index: 9999 !important;
            }
            
            .bg-gradient-1 {
                position: relative;
                z-index: 1;
            }
        </style>

        <script>
            // Enhanced Modal functionality
            document.addEventListener('DOMContentLoaded', function() {
                const modal = new bootstrap.Modal(document.getElementById('serviceModal'));
                const readMoreBtns = document.querySelectorAll('.read-more-btn');
                
                readMoreBtns.forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Set modal content
                        document.getElementById('serviceModalLabel').textContent = this.dataset.name;
                        document.getElementById('serviceModalDescription').textContent = this.dataset.description;
                        document.getElementById('serviceModalIcon').src = this.dataset.icon;
                        
                        // Show modal
                        modal.show();
                        
                        // Force backdrop to proper z-index (just in case)
                        const backdrop = document.createElement('div');
                        backdrop.className = 'modal-backdrop fade show';
                        backdrop.style.zIndex = '9999';
                        document.body.appendChild(backdrop);
                        
                        // Clean up when modal hides
                        document.getElementById('serviceModal').addEventListener('hidden.bs.modal', function() {
                            const backdrops = document.querySelectorAll('.modal-backdrop');
                            backdrops.forEach(bd => bd.remove());
                        });
                    });
                });
            });
        </script>
            

    <!-- Services Area End -->

    <!-- About Area -->

        <section class="space-bottom">
            <div class="shape-mockup d-none d-xxxl-block" data-top="-26%" data-left="-10%">
                <div class="curb-shape1"></div>
            </div>
            <div class="shape-mockup jump d-none d-xxxl-block" data-top="-50%" data-right="0"><img src="assets/img/shape/b-s-1-5.png" alt="shape"></div>
            <div class="shape-mockup jump-reverse d-none d-xxxl-block" data-top="6%" data-right="13%"><img src="assets/img/shape/leaf-1-4.png" alt="shape"></div>
            <div class="container">
                <div class="section-title text-center mb-5">
                    <h5 class="fw-bold">** See <span class="text-theme">About</span>Us **</h5>
                    <h2 class="title-style2">The <span class="text-theme">Gentleman's</span> Retreat</h2>
                    <p class="subtitle fst-italic">Where precision meets relaxation</p>
                </div>
                
                <div class="row gx-60 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="img-box2">
                            <div class="img-1">
                                <img src="./assets/img/best/beardcutgif.avif" alt="Professional barber giving a haircut" class="rounded-3">
                            </div>
                            <div class="img-2 jump"><img src="./assets/img/best/gback.jpg" alt="decorative leaf"></div>                                                        
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="about-box1 ps-lg-4">                        
                            <div class="media-style1 mb-4">
                                <div class="circle-btn style3">
                                    <a href="./" class="btn-icon"><i class="far fa-arrow-right"></i></a>
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
                                <a href="./service" class="btn style3">Discover Our Services</a>
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

    <!-- About Area End -->

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
                <span class="sec-subtitle">** Meet The Artisans **</span>
                <h2 class="sec-title">Master Craftsmen of Grooming</h2>
                <div class="sec-shape">
                    <svg width="100" height="8" viewBox="0 0 100 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4C2 4 18 -2 50 4C82 10 98 4 98 4" stroke="var(--theme-color)" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            
            <div class="row vs-carousel" data-arrows="true" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" id="team">
                <!-- Team Member 1 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="#team">
                                <img src="assets/img/best/childshave.jpg" alt="Master Barber Lenda Murray">
                                <div class="team-overlay">
                                    <span class="exp-badge">12 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="#team">Lenda Murray</a></h3>
                            <p class="team-degi">Master Barber</p>
                            <div class="team-specialty">Classic & Modern Cuts</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="#team">
                                <img src="assets/img/best/childshave.jpg" alt="Spa Therapist Emely Jonson">
                                <div class="team-overlay">
                                    <span class="exp-badge">8 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="#team">Emely Jonson</a></h3>
                            <p class="team-degi">Spa Therapist</p>
                            <div class="team-specialty">Holistic Relaxation</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="#team">
                                <img src="assets/img/best/childshave.jpg" alt="Hair Stylist Arika Murray">
                                <div class="team-overlay">
                                    <span class="exp-badge">10 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="#team">Arika Murray</a></h3>
                            <p class="team-degi">Hair Artist</p>
                            <div class="team-specialty">Creative Styling</div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 4 -->
                <div class="col-xl-3">
                    <div class="team-card">
                        <div class="team-img">
                            <a href="#team">
                                <img src="assets/img/best/childshave.jpg" alt="Massage Expert Lola Jonson">
                                <div class="team-overlay">
                                    <span class="exp-badge">7 yrs experience</span>
                                </div>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3 class="team-name"><a href="#team">Lola Jonson</a></h3>
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
    
    <section class="pricing-section" data-bg-src="assets/img/bg/price-bg-1-1.jpg">
        <div class="container">
            <div class="section-header text-center wow fadeInUp">
                <span class="section-subtitle">** Simple & Transparent **</span>
                <h2 class="section-title">Our Services & Pricing</h2>
                <p class="section-desc">Clear pricing for every grooming need</p>
            </div>

            <div class="pricing-table">
                <!-- Basic Services -->
                <div class="service-category wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="category-title">Basic Grooming</h3>

                    <div class="service-grid">

                        <?php foreach ($pricing as $service): ?>
                        <div class="service-item">
                            <span class="service-name"><?= htmlspecialchars($service['service_name']) ?></span>
                            <span class="service-price">ksh : <?= htmlspecialchars($service['price']) ?></span>
                        </div>
                        <?php endforeach; ?>
                        <!-- <div class="service-item">
                            <span class="service-name">Beard Trim & Shape</span>
                            <span class="service-price">$18</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Hot Towel Shave</span>
                            <span class="service-price">$22</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Haircut + Beard</span>
                            <span class="service-price">$35</span>
                        </div> -->

                        <!-- <div class="service-item">
                            <span class="service-name">Deluxe Haircut Package</span>
                            <span class="service-price">$45</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Beard Spa Treatment</span>
                            <span class="service-price">$35</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Executive Shave</span>
                            <span class="service-price">$40</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Signature Hair & Beard</span>
                            <span class="service-price">$65</span>
                        </div>                   
                        <div class="service-item">
                            <span class="service-name">Eyebrow Grooming</span>
                            <span class="service-price">$10</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Nose/Ear Waxing</span>
                            <span class="service-price">$12</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Hair Color</span>
                            <span class="service-price">$35+</span>
                        </div>
                        <div class="service-item">
                            <span class="service-name">Scalp Treatment</span>
                            <span class="service-price">$25</span>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.5s">
                <a href="./appointment" class="book-now-btn">Book Your Appointment</a>
            </div>
        </div>
    </section>

    <style>
        /* Pricing Section Styles */
        .pricing-section {
            padding: 80px 0;
            position: relative;
            background-size: cover;
            background-position: center;
        }
        
        .pricing-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.92);
        }
        
        .container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section-header {
            margin-bottom: 50px;
        }
        
        .section-subtitle {
            display: block;
            font-size: 16px;
            color: #FF8C00;
            margin-bottom: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .section-title {
            font-size: 36px;
            margin-bottom: 15px;
            color: black;
            font-weight: 700;
        }
        
        .section-desc {
            color: black;
            max-width: 600px;
            margin: 0 auto;
            font-size: 16px;
        }
        
        /* Pricing Table */
        .pricing-table {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .service-category {
            margin-bottom: 40px;
        }
        
        .category-title {
            font-size: 22px;
            color: #222;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #FF8C00;
            display: inline-block;
        }
        
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .service-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 3px solid #FF8C00;
        }
        
        .service-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .service-name {
            color: #444;
            font-weight: 500;
            font-size: 16px;
        }
        
        .service-price {
            color: #FF8C00;
            font-weight: 700;
            font-size: 16px;
        }
        
        /* Book Now Button */
        .book-now-btn {
            display: inline-block;
            padding: 15px 40px;
            background: #FF8C00;
            color: white;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 16px;
            border: 2px solid #FF8C00;
        }
        
        .book-now-btn:hover {
            background: transparent;
            color: #FF8C00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .section-title {
                font-size: 28px;
            }
            
            .service-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

<!-- Font Awesome for icons -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

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
                <span class="sec-subtitle">** PROFESSIONAL ADVICE **</span>
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
                            <img src="./assets/img/best/beardgif.gif" alt="Professional beard grooming techniques" class="w-100" loading="lazy">
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
                            <img src="assets/img/best/skincare.jpg" alt="Relaxing spa facial treatment" class="w-100" loading="lazy">
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
                            <img src="assets/img/best/hairdye.jpg" alt="Hair color consultation session" class="w-100" loading="lazy">
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

    <?php include './includes/footer.php'; ?>

</body>

</html>