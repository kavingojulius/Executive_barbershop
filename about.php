<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include './includes/head.php'; ?>

<body>

<?php include './includes/navbar.php'; ?>

<!-- Breadcrumb -->
<div class="breadcumb-wrapper" data-bg-src="./assets/best/backg.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="./">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Services & Amenities Section -->
<section class="space-top">
    <div class="container">
        <div class="row g-4">
            <!-- Services Column -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 p-lg-5">
                        <div class="section-title mb-4">
                            <h2 class="h3">Our <span class="text-theme">Comprehensive Services</span></h2>
                            <p class="mb-0">Where every grooming need meets expert hands</p>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fas fa-cut service-icon"></i>
                                    <div>
                                        <h5 class="mb-1">Hair Services</h5>
                                        <ul class="service-list">
                                            <li>Precision Haircuts</li>
                                            <li>Kids Haircuts</li>
                                            <li>Cutline Design</li>
                                            <li>Color & Dye</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fas fa-male service-icon"></i>
                                    <div>
                                        <h5 class="mb-1">Beard & Face</h5>
                                        <ul class="service-list">
                                            <li>Beard Trimming</li>
                                            <li>Hot Towel Shaves</li>
                                            <li>Face Scrubs</li>
                                            <li>Facial Masking</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fas fa-spa service-icon"></i>
                                    <div>
                                        <h5 class="mb-1">Pampering Treatments</h5>
                                        <ul class="service-list">
                                            <li>Head & Neck Massages</li>
                                            <li>Steam Treatments</li>
                                            <li>Pedicure</li>
                                            <li>Manicure</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="service-item">
                                    <i class="fas fa-clock service-icon"></i>
                                    <div>
                                        <h5 class="mb-1">Convenience</h5>
                                        <ul class="service-list">
                                            <li>Express Services</li>
                                            <li>Online Booking</li>
                                            <li>Priority Appointments</li>
                                            <li>Loyalty Programs</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Amenities Column -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100 bg-theme text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="section-title mb-4">
                            <h2 class="h3 text-white">Our <span class="text-warning">Amenities</span></h2>
                            <p class="mb-0 text-white-50">Designed for your comfort and convenience</p>
                        </div>
                        
                        <ul class="amenities-list">
                            <li>
                                <i class="fas fa-parking"></i>
                                <span>Ample Parking Space</span>
                            </li>
                            <li>
                                <i class="fas fa-pizza-slice"></i>
                                <span>Adjacent to Pizza Inn</span>
                            </li>
                            <li>
                                <i class="fas fa-car"></i>
                                <span>On-Site Car Wash</span>
                            </li>
                            <li>
                                <i class="fas fa-bolt"></i>
                                <span>Generator Power Backup</span>
                            </li>
                            <!-- <li>
                                <i class="fas fa-wifi"></i>
                                <span>Complimentary WiFi</span>
                            </li> -->
                            <!-- <li>
                                <i class="fas fa-coffee"></i>
                                <span>Refreshment Lounge</span>
                            </li> -->
                        </ul>
                        
                        <div class="mt-4 pt-2">
                            <a href="./appointment" class="btn btn-outline-light w-100">
                                <i class="fas fa-calendar-alt me-2"></i> Book Your Slot
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Services & Amenities Section Styling */
    .service-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        border-radius: 8px;
        background: rgba(var(--theme-rgb), 0.05);
        height: 100%;
    }
    
    .service-icon {
        font-size: 1.5rem;
        color: var(--theme-color);
        margin-top: 3px;
    }
    
    .service-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .service-list li {
        padding: 5px 0;
        border-bottom: 1px dashed rgba(0,0,0,0.1);
        font-size: 0.9rem;
    }
    
    .service-list li:last-child {
        border-bottom: none;
    }
    
    .amenities-list {
        list-style: none;
        padding: 0;
    }
    
    .amenities-list li {
        padding: 10px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .amenities-list li:last-child {
        border-bottom: none;
    }
    
    .amenities-list i {
        width: 25px;
        text-align: center;
        font-size: 1.1rem;
    }
    
    .bg-theme {
        background-color: var(--theme-color) !important;
    }
</style>

<!-- About Section -->
<section class="space-bottom">
    <div class="container">
        <div class="section-title text-center mb-5 mt-5">
            <h5 class="fw-bold">** Who <span class="text-theme">We Are **</span></h5>
            <h2 class="title-style2">The <span class="text-theme">Gentleman's</span> Standard</h2>
            <p class="subtitle fst-italic">A place where grooming meets class and culture</p>
        </div>

        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <img src="./assets/img/best/beardgif.gif" alt="Barbershop Interior" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <p class="mb-4">We are more than a barbershop — we are a sanctuary for the modern man. At The Gentleman's Retreat, we blend traditional grooming artistry with contemporary comfort. Every visit is a moment of calm, tailored to help you look sharp and feel confident.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-check-circle text-theme me-2"></i>Time-honored grooming traditions</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-theme me-2"></i>Curated atmosphere of elegance and ease</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-theme me-2"></i>Passion for personal style and expression</li>
                </ul>
                <a href="./service" class="btn style3">Explore Our Craft</a>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy Section -->
<section class="space-bottom bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h5 class="fw-bold">Our <span class="text-theme">Philosophy</span></h5>
            <h2 class="title-style2">Craftsmanship, Comfort & Culture</h2>
        </div>

        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="feature-card p-4 h-100">
                    <i class="fas fa-scissors fa-2x mb-3 text-theme"></i>
                    <h6>Precision Craft</h6>
                    <p>Every cut and shave is a statement of skill and attention to detail.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4 h-100">
                    <i class="fas fa-couch fa-2x mb-3 text-theme"></i>
                    <h6>Comfort First</h6>
                    <p>Step into a world designed to help you relax, reset, and recharge.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4 h-100">
                    <i class="fas fa-users fa-2x mb-3 text-theme"></i>
                    <h6>Community Culture</h6>
                    <p>We are a hub for conversations, connections, and camaraderie.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section class="space-bottom">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h5 class="fw-bold">Our <span class="text-theme">Legacy</span></h5>
            <h2 class="title-style2">Where It All Began</h2>
        </div>
        <div class="row align-items-center gx-5">
            <div class="col-lg-6">
                <p class="mb-4">Born from a love of classic barbershop culture, we set out to create a space where grooming is more than maintenance—it's an experience. Since day one, we've committed to elevating men's self-care with passion, skill, and authenticity.</p>
                <p>Our roots lie in a belief that tradition and innovation can co-exist to serve the modern gentleman.</p>
            </div>
            <div class="col-lg-6">
                <img src="./assets/img/best/backgif.avif" alt="Legacy of Barbershop" class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</section>

<!-- <style>
    .offer-card {
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .offer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .offer-card h6 {
        font-size: 1.2rem;
        font-weight: 600;
    }
    .offer-card ul li {
        font-size: 0.95rem;
        color: #555;
    }
    .btn.style3 {
        background: var(--theme-color);
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn.style3:hover {
        background: var(--secondary-color, #e67e22);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }
</style> -->

<?php include './includes/footer.php'; ?>

</body>
</html>