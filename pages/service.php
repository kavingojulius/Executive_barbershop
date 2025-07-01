<?php
include '../config/db.php';

// Fetch services from database
$services = [];
$result = $conn->query("SELECT * FROM services ORDER BY name");
if ($result) {
    $services = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php include '../includes/head.php'; ?>

<body>
    <?php include '../includes/navbar.php'; ?>

    <!-- Breadcrumb -->
    <div class="breadcumb-wrapper" data-bg-src="../assets/img/breadcumb/breadcumb-bg-4.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our <span class="inner-text">Services</span></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Services Section - Enhanced Version -->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                <span class="sec-subtitle">Professional Care</span>
                <h2 class="sec-title">Premium Grooming & Relaxation</h2>
                <div class="sec-shape"><img src="../assets/img/shape/sec-shape-1.png" alt="divider"></div>
            </div>

            <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-md-slide-show="2">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <div class="col-lg-4 col-xl-4">
                            <div class="feature-style2 enhanced-service-card">
                                <div class="vs-icon style2">
                                    <?php 
                                    $icon = "../assets/img/icon/fe-1-1.png"; // Default icon
                                    if (stripos($service['name'], 'hair') !== false) {
                                        $icon = "../assets/img/icon/fe-1-1.png";
                                    } elseif (stripos($service['name'], 'spa') !== false) {
                                        $icon = "../assets/img/icon/fe-1-2.png";
                                    } elseif (stripos($service['name'], 'beard') !== false) {
                                        $icon = "../assets/img/icon/fe-1-3.png";
                                    } elseif (stripos($service['name'], 'massage') !== false) {
                                        $icon = "../assets/img/icon/massage-icon.png";
                                    }
                                    ?>
                                    <img src="<?= $icon ?>" alt="<?= htmlspecialchars($service['name']) ?> icon">
                                </div>
                                <h3 class="feature-title h4"><?= htmlspecialchars($service['name']) ?></h3>
                                <div class="service-excerpt">
                                    <p><?= htmlspecialchars($service['description']) ?></p>
                                </div>
                                <div class="service-meta">                                     
                                    <span class="experience"><i class="far fa-star"></i> Expert Service</span>
                                </div>
                                <div class="arrow-shape">
                                    <i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <div class="alert alert-info">Our services menu is being updated. Please check back soon!</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Service Experience Section -->
    <section class="bg-gradient-1 space-top space-extra-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="img-box5 pe-lg-4">
                        <img src="../assets/img/service-experience.jpg" alt="Service experience" class="w-100">
                        <div class="shape-label">
                            <div class="big-text">10+</div>
                            <div class="small-text">Years Experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="ps-lg-4">
                        <span class="sec-subtitle text-white">Why Choose Us</span>
                        <h2 class="sec-title text-white mb-4">The Ultimate Grooming Experience</h2>
                        
                        <div class="service-benefit">
                            <div class="benefit-icon"><i class="fal fa-user-tie"></i></div>
                            <div class="benefit-content">
                                <h4>Certified Professionals</h4>
                                <p>Our barbers and therapists undergo rigorous training and continuous education to master the latest techniques.</p>
                            </div>
                        </div>
                        
                        <div class="service-benefit">
                            <div class="benefit-icon"><i class="fal fa-spa"></i></div>
                            <div class="benefit-content">
                                <h4>Premium Products</h4>
                                <p>We use only top-tier grooming products that nourish your hair and skin while delivering exceptional results.</p>
                            </div>
                        </div>
                        
                        <div class="service-benefit">
                            <div class="benefit-icon"><i class="fal fa-heart"></i></div>
                            <div class="benefit-content">
                                <h4>Personalized Approach</h4>
                                <p>Every service begins with a consultation to understand your unique needs and preferences.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Process Section -->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="title-area text-center wow fadeInUp">
                <span class="sec-subtitle">Our Process</span>
                <h2 class="sec-title">How We Deliver Excellence</h2>
                <div class="sec-shape"><img src="../assets/img/shape/sec-shape-1.png" alt="divider"></div>
            </div>
            
            <div class="row gx-40 gy-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="process-card">
                        <div class="process-number">01</div>
                        <h3 class="process-title">Consultation</h3>
                        <p>We discuss your needs and preferences to recommend the perfect services.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-card">
                        <div class="process-number">02</div>
                        <h3 class="process-title">Preparation</h3>
                        <p>Proper cleansing and preparation to ensure optimal results from your treatment.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-card">
                        <div class="process-number">03</div>
                        <h3 class="process-title">Service Delivery</h3>
                        <p>Expert execution using premium products and proven techniques.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-card">
                        <div class="process-number">04</div>
                        <h3 class="process-title">Finishing Touches</h3>
                        <p>Final styling and aftercare recommendations for lasting results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section bg-dark" data-bg-src="../assets/img/bg/cta-bg-2-1.png">
        <div class="container">
            <div class="cta-content text-center text-white wow fadeInUp">
                <h2 class="text-white mb-3">Ready to Experience the Difference?</h2>
                <p class="text-white-50 mx-auto" style="max-width:600px">Book your appointment today and discover why we're the preferred choice for discerning clients.</p>
                <a href="contact.html" class="vs-btn style2 mt-4">Schedule Your Visit</a>
            </div>
        </div>
    </section>

    <?php include '../includes/footer1.php'; ?>

    <style>
        /* Enhanced Service Card Styles */
        .enhanced-service-card {
            padding: 30px;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .enhanced-service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .service-excerpt {
            margin: 15px 0;
            flex-grow: 1;
        }
        .service-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        .service-meta i {
            margin-right: 5px;
        }
        .service-benefit {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        .benefit-icon {
            font-size: 24px;
            color: var(--theme-color);
            margin-right: 15px;
            margin-top: 3px;
        }
        .process-card {
            text-align: center;
            padding: 30px 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }
        .process-number {
            font-size: 36px;
            font-weight: 700;
            color: rgba(0,0,0,0.05);
            line-height: 1;
            margin-bottom: 15px;
        }
        .img-box5 {
            position: relative;
        }
        .shape-label {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--theme-color);
            color: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            text-align: center;
        }
        .shape-label .big-text {
            font-size: 36px;
            font-weight: 700;
            line-height: 1;
        }
    </style>
</body>
</html>