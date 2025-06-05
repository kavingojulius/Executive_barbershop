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
    <title>Project Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles to mimic Tailwind's indigo and spacing */
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
                    <h1 class="h2 fw-bold text-dark">Received messages.</h1>
                    <!-- <p class="text-muted"></p> -->
                </div>


                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
                                $result = mysqli_query($conn, $query);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                                        echo "<td>" . date("F j, Y, g:i a", strtotime($row['created_at'])) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No messages found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                


            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>