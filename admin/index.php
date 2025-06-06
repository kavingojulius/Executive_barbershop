<?php
session_start();

include  '../config/db.php';
if (!isset($_SESSION['admin_id']) ) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Barbershop Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles */
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
</head>
<body class="bg-light">
    <div class="d-flex vh-100">
        <!-- Sidebar -->
        <div class="d-none d-md-flex flex-column flex-shrink-0 bg-indigo-700 text-white" style="width: 16rem;">
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
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
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
                        <a href="#" class="nav-link sidebar-link text-white rounded py-3">
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

        <!-- Main content -->
        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            <!-- Top navigation -->
            <header class="d-flex align-items-center justify-content-between p-3 bg-white border-bottom">
                <div class="d-flex align-items-center">
                    <button class="d-md-none btn btn-outline-secondary me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="input-group w-auto">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Search..." style="max-width: 200px;">
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary"><i class="fas fa-bell"></i></button>
                    <button class="btn btn-outline-secondary"><i class="fas fa-envelope"></i></button>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-2" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile" width="32" height="32">
                        <span class="d-none d-md-inline text-sm">John Doe</span>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <div class="mb-4">
                    <h1 class="h2 fw-bold text-dark">Dashboard</h1>
                    <p class="text-muted">Welcome back, John! Here's what's happening with your projects.</p>
                </div>

                <!-- Stats cards -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted text-sm">Active Projects</p>
                                    <p class="h3 mb-0">12</p>
                                </div>
                                <div class="p-3 rounded-circle bg-indigo-100 text-indigo-600">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-success text-sm">+2 from last week</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted text-sm">Tasks Completed</p>
                                    <p class="h3 mb-0">48</p>
                                </div>
                                <div class="p-3 rounded-circle bg-success-subtle text-success">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-success text-sm">+5 from yesterday</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted text-sm">Team Members</p>
                                    <p class="h3 mb-0">8</p>
                                </div>
                                <div class="p-3 rounded-circle bg-info-subtle text-info">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-muted text-sm">No change</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted text-sm">Upcoming Deadlines</p>
                                    <p class="h3 mb-0">3</p>
                                </div>
                                <div class="p-3 rounded-circle bg-danger-subtle text-danger">
                                    <i class="fas fa-calendar-times"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-danger text-sm">Due this week</div>
                        </div>
                    </div>
                </div>

                <!-- Projects and Recent Activity -->
                <div class="row g-4">
                    <!-- Projects Table -->
                    <div class="col-lg-8">
                        <div class="card shadow">
                            <div class="card-header border-bottom">
                                <h2 class="h5 mb-0">Recent Projects</h2>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Project</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">Progress</th>
                                            <th scope="col" class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="p-2 rounded bg-indigo-100 text-indigo-600 me-3">
                                                        <i class="fas fa-box-open"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-medium">Website Redesign</div>
                                                        <div class="text-muted text-sm">Marketing</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            </td>
                                            <td class="text-muted text-sm">May 15, 2023</td>
                                            <td>
                                                <div class="progress h-2-5">
                                                    <div class="progress-bar bg-indigo-600" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-muted text-sm">65%</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="text-indigo-600">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="p-2 rounded bg-info-subtle text-info me-3">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-medium">Mobile App</div>
                                                        <div class="text-muted text-sm">Development</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                                            </td>
                                            <td class="text-muted text-sm">Jun 1, 2023</td>
                                            <td>
                                                <div class="progress h-2-5">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-muted text-sm">30%</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="text-indigo-600">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="p-2 rounded bg-purple-100 text-purple-600 me-3">
                                                        <i class="fas fa-chart-line"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-medium">Market Analysis</div>
                                                        <div class="text-muted text-sm">Research</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            </td>
                                            <td class="text-muted text-sm">Apr 28, 2023</td>
                                            <td>
                                                <div class="progress h-2-5">
                                                    <div class="progress-bar progress-bar-purple" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-muted text-sm">85%</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="text-indigo-600">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-transparent border-top">
                                <a href="#" class="text-indigo-600 text-sm">View all projects</a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-lg-4">
                        <div class="card shadow">
                            <div class="card-header border-bottom">
                                <h2 class="h5 mb-0">Recent Activity</h2>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="d-flex align-items-start">
                                        <img class="rounded-circle me-3" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" width="40" height="40">
                                        <div>
                                            <p class="fw-medium mb-1 text-sm">Jane Cooper</p>
                                            <p class="text-muted text-sm mb-1">Completed "Homepage redesign" task</p>
                                            <p class="text-muted" style="font-size: 0.75rem;">2 hours ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-start">
                                        <img class="rounded-circle me-3" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" width="40" height="40">
                                        <div>
                                            <p class="fw-medium mb-1 text-sm">Michael Smith</p>
                                            <p class="text-muted text-sm mb-1">Commented on "Mobile app wireframes"</p>
                                            <p class="text-muted" style="font-size: 0.75rem;">5 hours ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-start">
                                        <img class="rounded-circle me-3" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" width="40" height="40">
                                        <div>
                                            <p class="fw-medium mb-1 text-sm">Alex Johnson</p>
                                            <p class="text-muted text-sm mb-1">Uploaded new files to "Website assets"</p>
                                            <p class="text-muted" style="font-size: 0.75rem;">1 day ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex align-items-start">
                                        <img class="rounded-circle me-3" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" width="40" height="40">
                                        <div>
                                            <p class="fw-medium mb-1 text-sm">Sarah Williams</p>
                                            <p class="text-muted text-sm mb-1">Created new project "Product launch"</p>
                                            <p class="text-muted" style="font-size: 0.75rem;">2 days ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="card-footer bg-transparent border-top">
                                <a href="#" class="text-indigo-600 text-sm">View all activity</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>