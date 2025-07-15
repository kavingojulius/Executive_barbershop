<?php
include './config/db.php';

// Fetch services from database
$services = [];
$result = $conn->query("SELECT * FROM services ORDER BY name");
if ($result) {
    $services = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php include './includes/head.php'; ?>

<body>
    <?php include './includes/navbar.php'; ?>

    <!-- Breadcrumb -->
    <div class="breadcumb-wrapper" data-bg-src="./assets/best/backg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our <span class="inner-text">Services</span></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="./">Home</a></li>
                        <li>Our Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Services Section -->
    <section class="space-top space-extra-bottom bg-gradient-1">
        <div class="container">
            <div class="title-area text-center wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="">***<span class="text-theme"> Our</span> Services ***</h5>
                <h2 class="sec-title">Grooming & Relaxation Services</h2>
                <div class="sec-shape"><img src="assets/img/shape/sec-shape-1.png" alt="shape"></div>
            </div>

            <!-- Scrollable Services List Card (Same size as others) -->
            <div class="row g-3 wow fadeInUp" data-wow-delay="0.25s">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-summary-card h-100">
                        <div class="card-header">
                            <h3 class="feature-title">All Services <span class="total-count">(<?= count($services) ?>)</span></h3>
                        </div>
                        <div class="service-scroll-container">
                            <?php if (!empty($services)): ?>
                                <ul class="service-list">
                                    <?php foreach ($services as $index => $service): ?>
                                        <li>
                                            <span class="service-number"><?= $index + 1 ?>.</span>
                                            <?= htmlspecialchars($service['name']) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="no-services">No services available</p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <i class="fas fa-chevron-down scroll-hint"></i>
                            <span class="scroll-text">Scroll to view all</span>
                        </div>
                    </div>
                </div>

                <style>
                    /* Unique Service Summary Card */
                    .service-summary-card {
                        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                        border-radius: 12px;
                        border: 2px solid rgba(0,0,0,0.08);
                        padding: 20px;
                        box-shadow: 0 6px 18px rgba(0,0,0,0.05);
                        transition: all 0.3s ease;
                        position: relative;
                        overflow: hidden;
                    }

                    .service-summary-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
                        border-color: rgba(var(--theme-rgb), 0.2);
                    }

                    .card-header {
                        position: relative;
                        padding-bottom: 15px;
                        margin-bottom: 15px;
                        border-bottom: 2px dashed rgba(0,0,0,0.1);
                    }

                    .feature-title {
                        font-size: 1.25rem;
                        color: var(--theme);
                        margin: 0;
                        font-weight: 600;
                        display: flex;
                        align-items: center;
                    }

                    .total-count {
                        color: #6c757d;
                        font-size: 0.9em;
                        margin-left: 8px;
                        font-weight: normal;
                    }

                    .service-scroll-container {
                        max-height: 200px;
                        overflow-y: auto;
                        padding-right: 8px;
                        margin: 10px -5px;
                    }

                    .service-list {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }

                    .service-list li {
                        padding: 8px 5px;
                        border-bottom: 1px solid rgba(0,0,0,0.05);
                        font-size: 0.9rem;
                        display: flex;
                        align-items: center;
                        transition: all 0.2s ease;
                    }

                    .service-list li:hover {
                        background: rgba(var(--theme-rgb), 0.05);
                        padding-left: 8px;
                    }

                    .service-number {
                        color: var(--theme);
                        font-weight: bold;
                        margin-right: 10px;
                        min-width: 20px;
                        text-align: right;
                    }

                    .no-services {
                        text-align: center;
                        color: #6c757d;
                        font-style: italic;
                        padding: 15px 0;
                    }

                    .card-footer {
                        text-align: center;
                        padding-top: 10px;
                        color: rgba(0,0,0,0.3);
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        gap: 5px;
                    }

                    .scroll-hint {
                        animation: bounce 2s infinite;
                        font-size: 0.9rem;
                    }

                    .scroll-text {
                        font-size: 0.75rem;
                        color: rgba(0,0,0,0.4);
                    }

                    @keyframes bounce {
                        0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
                        40% {transform: translateY(-5px);}
                        60% {transform: translateY(-3px);}
                    }

                    /* Custom scrollbar */
                    .service-scroll-container::-webkit-scrollbar {
                        width: 4px;
                    }
                    .service-scroll-container::-webkit-scrollbar-track {
                        background: rgba(0,0,0,0.02);
                    }
                    .service-scroll-container::-webkit-scrollbar-thumb {
                        background: rgba(var(--theme-rgb), 0.3);
                        border-radius: 4px;
                    }
                </style>

                <!-- Regular Service Cards -->
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $index => $service): ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="feature-style2 h-100">
                                <div class="service-number-badge">
                                    <?= $index + 1 ?>
                                </div>
                                <div class="vs-icon style2">
                                    <?php 
                                    $icon = "assets/img/icon/fe-1-1.png";
                                    if (stripos($service['name'], 'hair') !== false) {
                                        $icon = "assets/img/icon/fe-1-1.png";
                                    } elseif (stripos($service['name'], 'spa') !== false) {
                                        $icon = "assets/img/icon/fe-1-2.png";
                                    } elseif (stripos($service['name'], 'color') !== false) {
                                        $icon = "assets/img/icon/fe-1-3.png";
                                    }
                                    ?>
                                    <img src="<?= $icon ?>" alt="icon" class="icon-sm">
                                </div>
                                <h3 class="feature-title h4"><?= htmlspecialchars($service['name']) ?></h3>
                                <div class="arrow-shape">
                                    <i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i>
                                </div>
                                <p class="feature-text line-clamp-2"><?= htmlspecialchars($service['description']) ?></p>
                                <button class="link-btn read-more-btn btn btn-outline-tertiary" 
                                        data-name="<?= htmlspecialchars($service['name']) ?>"
                                        data-description="<?= htmlspecialchars($service['description']) ?>"
                                        data-icon="<?= $icon ?>">
                                    Read More
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Modal for service details -->
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
        /* Number badge styling */
        .service-number-badge {
            position: absolute;
            top: -10px;
            left: -10px;
            background: var(--theme);
            color: black;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
            z-index: 1;
        }
        /* Service Cards */
        .feature-style2 {
            position: relative; /* Required for absolute positioning of badge */
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .feature-style2:hover {
            transform: translateY(-5px);
        }
        
        .icon-sm {
            width: 40px;
            height: 40px;
        }
        
        /* Limit description to 2 lines with ellipsis */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 3em;
        }

        /* Style for read more button */
        .read-more-btn {
            margin-top: 2px;
            cursor: pointer;
            background: transparent;
            /* border: none; */
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

        /* Scrollbar styling */
        .service-scroll-container::-webkit-scrollbar {
            width: 5px;
        }
        
        .service-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .service-scroll-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        .service-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    <script>
        // Modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('serviceModal'));
            const readMoreBtns = document.querySelectorAll('.read-more-btn');
            
            readMoreBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    document.getElementById('serviceModalLabel').textContent = this.dataset.name;
                    document.getElementById('serviceModalDescription').textContent = this.dataset.description;
                    document.getElementById('serviceModalIcon').src = this.dataset.icon;
                    modal.show();
                    
                    setTimeout(() => {
                        const backdrop = document.querySelector('.modal-backdrop');
                        if (backdrop) {
                            backdrop.style.zIndex = '1040';
                        }
                    }, 10);
                });
            });
        });
    </script>
   

    <!-- Service Process Section -->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="title-area text-center wow fadeInUp">
                <span class="sec-subtitle">** Our Process **</span>
                <h2 class="sec-title">How We Deliver Excellence</h2>
                <div class="sec-shape"><img src="./assets/img/shape/sec-shape-1.png" alt="divider"></div>
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

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="title-area text-center wow fadeInUp">
                <span class="sec-subtitle">** Our Amenities **</span>
                <h2 class="sec-title">Premium Conveniences</h2>
                <div class="sec-shape"><img src="./assets/img/shape/sec-shape-1.png" alt="divider"></div>
            </div>
            
            <div class="row gx-40 gy-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="process-card">
                        <div class="process-number"><i class="fas fa-parking"></i></div>
                        <h3 class="process-title">Ample Parking</h3>
                        <p>Spacious dedicated parking area ensuring hassle-free visits for all our clients.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-card">
                        <div class="process-number"><i class="fas fa-pizza-slice"></i></div>
                        <h3 class="process-title">Next to Pizza Inn</h3>
                        <p>Conveniently located adjacent to Pizza Inn for quick bites before or after your appointment.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-card">
                        <div class="process-number"><i class="fas fa-car"></i></div>
                        <h3 class="process-title">Car Wash Available</h3>
                        <p>Premium car wash services to pamper your vehicle while you get groomed.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-card">
                        <div class="process-number"><i class="fas fa-bolt"></i></div>
                        <h3 class="process-title">Backup Generator</h3>
                        <p>Uninterrupted service guaranteed with our full-power backup generator system.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section p-3 p-3" >
        <div class="container">
            <div class="sec-shape text-center"><img src="./assets/img/shape/sec-shape-1.png" alt="divider"></div>
            <div class="cta-content text-center text-dark wow fadeInUp p-3 p-3">
                <h2 class="text-dark mb-3">Ready to Experience the Difference?</h2>
                <p class="text-dark-50 mx-auto" style="max-width:600px">Book your appointment today and discover why we're the preferred choice for discerning clients.</p>
                <a href="./appointment" class="vs-btn style2 mt-4">Schedule Your Visit</a>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'; ?>

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