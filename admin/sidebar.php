<!-- Sidebar -->
<style>
    /* Custom color palette */
    :root {
        --gold-primary: #D4AF37;
        --gold-secondary: #FFD700;
        --gold-light: #F5E6B3;
        --gold-dark: #B8860B;
        --brown-dark: #5C4033;
        --brown-light: #8B5A2B;
        --black: #1A1A1A;
        --white: #FFFFFF;
        --gray-light: #F5F5F5;
    }

    /* Sidebar styles */
    .sidebar {
        background-color: var(--brown-dark) !important;
        color: var(--white);
    }
    
    .sidebar-header {
        background-color: var(--black) !important;
        color: var(--gold-primary) !important;
    }
    
    .sidebar-link {
        color: var(--white);
        transition: all 0.3s ease;
    }
    
    .sidebar-link.active {
        background-color: var(--gold-dark) !important;
        color: var(--black) !important;
    }
    
    .sidebar-link:hover:not(.active) {
        background-color: var(--brown-light) !important;
        color: var(--gold-secondary) !important;
    }
    
    .sidebar-link i {
        color: inherit;
    }
    
    /* Mobile sidebar */
    .offcanvas-sidebar {
        background-color: var(--brown-dark) !important;
    }
    
    .offcanvas-sidebar-header {
        background-color: var(--black) !important;
        color: var(--gold-primary) !important;
    }
    
    .btn-close-white {
        filter: invert(1) sepia(1) saturate(5) hue-rotate(30deg);
    }
</style>

<div class="d-none d-md-flex flex-column flex-shrink-0 sidebar" style="width: 16rem;">
    <div class="d-flex align-items-center justify-content-center h4 p-3 sidebar-header">
        <span class="fw-semibold">Executive Barbershop</span>
    </div>
    <div class="flex-grow-1 px-3 py-4 overflow-y-auto">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="index" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="contacts" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-comment me-2"></i>
                    Contact Messages
                </a>
            </li>
            <li class="nav-item">
                <a href="appointments" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-headset me-2"></i>
                    Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="services" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-project-diagram me-2"></i>
                    Services
                </a>
            </li>
            <li class="nav-item">
                <a href="pricing" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-project-diagram me-2"></i>
                    Pricing
                </a>
            </li>
            <li class="nav-item">
                <a href="../logout.php" class="nav-link sidebar-link rounded py-3">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Mobile Sidebar (Offcanvas) -->
<div class="d-md-none">
    <div class="offcanvas offcanvas-start text-white offcanvas-sidebar" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header offcanvas-sidebar-header">
            <h5 class="offcanvas-title" id="mobileSidebarLabel">Executive Barbershop</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="index" class="nav-link sidebar-link active rounded py-3">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contacts" class="nav-link sidebar-link rounded py-3">
                        <i class="fas fa-comment me-2"></i>
                        Contact Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="appointments" class="nav-link sidebar-link rounded py-3">
                        <i class="fas fa-headset me-2"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a href="services" class="nav-link sidebar-link rounded py-3">
                        <i class="fas fa-project-diagram me-2"></i>
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link sidebar-link rounded py-3">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>