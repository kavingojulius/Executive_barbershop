<!doctype html>
<html class="no-js" lang="zxx">

<?php include '../includes/head.php'; ?>

<body>
    
    <?php include '../includes/navbar.php'; ?>
    
    <!-- Breadcrumb -->
    <div class="breadcumb-wrapper" data-bg-src="../assets/img/breadcumb/breadcumb-bg-2.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
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
                            <a href="service" class="btn style3">Discover Our Services</a>
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
            
    <!-- Team Section -->
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

    <?php include '../includes/footer1.php'; ?>

</body>
</html>