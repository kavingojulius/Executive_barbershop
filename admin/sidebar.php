<!-- Sidebar -->
        <style>

            .bg-indigo-700 { background-color: #4f46e5; }
            .bg-indigo-800 { background-color: #4338ca; }
            .bg-indigo-600 { background-color: #5b21b6; }
            .bg-indigo-100 { background-color: #e0e7ff; }
            .text-indigo-600 { color: #4f46e5; }
            .hover-bg-indigo-600:hover { background-color: #5b21b6; }
            .bg-purple-100 { background-color: #e9d5ff; }
            .text-purple-600 { color: #7c3aed; }
            .bg-purple-600 { background-color: #7c3aed; }
            .progress-bar-purple { background-color: #7c3aed; }
            .text-sm { font-size: 0.875rem; }
            .h-2\.5 { height: 0.625rem; }
            .rounded-full { border-radius: 9999px; }
            .shadow { box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06); }
            .sidebar-link.active { background-color: #4338ca; }
            .sidebar-link:hover { background-color: #5b21b6; }

        </style>
        
        <div class="d-none d-md-flex flex-column flex-shrink-0 bg-indigo-700 text-white sidebar" style="width: 16rem;">
            <div class="d-flex align-items-center justify-content-center h4 p-3 bg-indigo-800">
                <span class="fw-semibold">Exective Barbershop</span>
            </div>
            <div class="flex-grow-1 px-3 py-4 overflow-y-auto">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="index" class="nav-link sidebar-link active text-white rounded py-3">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contacts" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-comment me-2"></i>
                            Contact Messages
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="appointments" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-headset me-2"></i>
                            Appointments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="services" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-project-diagram me-2"></i>
                            Services
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-users me-2"></i>
                            Team
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-file-alt me-2"></i>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
                <div class="mt-auto mb-4">
                    <div class="p-3 bg-indigo-800 rounded">
                        <p class="text-sm">Upgrade to <span class="fw-semibold">Pro</span> for more features!</p>
                        <button class="w-100 btn btn-light btn-sm text-indigo-600 mt-2">Upgrade Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar (Offcanvas) -->
        <div class="d-md-none">
            <div class="offcanvas offcanvas-start text-white" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel" style="background-color: #4f46e5;">
                <div class="offcanvas-header bg-indigo-800">
                    <h5 class="offcanvas-title text-white" id="mobileSidebarLabel">Executive Barbershop</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="index" class="nav-link sidebar-link active text-white rounded py-3">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contacts" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-comment me-2"></i>
                            Contact Messages
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="appointments" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-headset me-2"></i>
                            Appointments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="services" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-project-diagram me-2"></i>
                            Services
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-users me-2"></i>
                            Team
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-file-alt me-2"></i>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>