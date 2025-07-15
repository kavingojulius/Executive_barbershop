<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login");
    exit();
}

// Get counts from database with error handling
$pending_appointments = 0;
$weekly_messages = 0;
$total_services = 0;

// Pending appointments count
$query = "SELECT COUNT(*) as count FROM appointments WHERE status = 'pending'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $pending_appointments = $row['count'];
}

// Weekly messages count
$query = "SELECT COUNT(*) as count FROM contact_messages WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $weekly_messages = $row['count'];
}

// Total services count
$query = "SELECT COUNT(*) as count FROM services";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_services = $row['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King's Executive Barbershop Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        /* Custom styles */
        .bg-gold-primary { background-color: var(--gold-primary); }
        .bg-gold-secondary { background-color: var(--gold-secondary); }
        .bg-gold-light { background-color: var(--gold-light); }
        .bg-gold-dark { background-color: var(--gold-dark); }
        .bg-brown-dark { background-color: var(--brown-dark); }
        .bg-brown-light { background-color: var(--brown-light); }
        .bg-black { background-color: var(--black); }
        
        .text-gold-primary { color: var(--gold-primary); }
        .text-gold-secondary { color: var(--gold-secondary); }
        .text-gold-light { color: var(--gold-light); }
        .text-gold-dark { color: var(--gold-dark); }
        .text-brown-dark { color: var(--brown-dark); }
        .text-brown-light { color: var(--brown-light); }
        
        .sidebar-link.active { background-color: var(--brown-dark); }
        .sidebar-link:hover { background-color: var(--brown-light); }
        
        /* Dashboard specific styles */
        .stat-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            border-radius: 8px;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.5rem;
        }
        .recent-item {
            transition: background-color 0.2s;
            border-left: 3px solid transparent;
        }
        .recent-item:hover {
            background-color: var(--gray-light);
            border-left-color: var(--gold-primary);
        }
        .badge-pending {
            background-color: rgba(212, 175, 55, 0.2);
            color: var(--brown-dark);
        }
        .badge-confirmed {
            background-color: rgba(139, 90, 43, 0.2);
            color: var(--brown-dark);
        }
        .badge-cancelled {
            background-color: rgba(92, 64, 51, 0.2);
            color: var(--brown-dark);
        }
        body {
            background-color: var(--gray-light);
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .table th {
            background-color: var(--gold-light);
            color: var(--black);
        }
        .btn-outline-primary {
            border-color: var(--gold-primary);
            color: var(--gold-primary);
        }
        .btn-outline-primary:hover {
            background-color: var(--gold-primary);
            color: var(--black);
        }
        .btn-primary {
            background-color: var(--gold-primary);
            border-color: var(--gold-primary);
            color: var(--black);
        }
        .btn-primary:hover {
            background-color: var(--gold-dark);
            border-color: var(--gold-dark);
            color: var(--white);
        }
        .avatar {
            background-color: var(--gold-primary) !important;
            color: var(--black) !important;
        }
    </style>
    
</head>

<body class="bg-light">

    <div class="d-flex vh-100">
        <!-- Sidebar -->
        <div class="d-none d-md-flex flex-column flex-shrink-0 bg-brown-dark text-white" style="width: 16rem;">
            <div class="d-flex align-items-center justify-content-center h4 p-3 bg-black">
                <span class="fw-semibold text-gold-primary">King's Barbershop</span>
            </div>
            <div class="flex-grow-1 px-3 py-4 overflow-y-auto">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="index" class="nav-link sidebar-link text-gold-secondary rounded py-3">
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
                        <a href="pricing" class="nav-link sidebar-link text-white rounded py-3">
                            <i class="fas fa-money-bill-wave me-2"></i>
                            Pricing
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

        <!-- Mobile Sidebar (Offcanvas) -->
        <div class="d-md-none">
            <div class="offcanvas offcanvas-start text-white" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel" style="background-color: var(--brown-dark);">
                <div class="offcanvas-header bg-black">
                    <h5 class="offcanvas-title text-gold-primary" id="mobileSidebarLabel">King's Barbershop</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="index" class="nav-link sidebar-link text-gold-secondary rounded py-3">
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
                            <a href="pricing" class="nav-link sidebar-link text-white rounded py-3">
                                <i class="fas fa-money-bill-wave me-2"></i>
                                Pricing
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
                    <h1 class="h5 mb-0 text-brown-dark">King's Barbershop</h1>        
                </div>
                <div class="d-flex align-items-center gap-3">                    
                    <div class="d-flex align-items-center">                        
                        <span class="avatar me-2" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">AD</span>
                        <span class="d-none d-md-inline text-sm text-brown-dark">Admin</span>   
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <div class="mb-4">
                    <h1 class="h2 fw-bold text-brown-dark">Dashboard Overview</h1>
                    <p class="text-muted">Welcome back! Here's what's happening with your barbershop.</p>
                </div>

                <!-- Stats cards -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                    <!-- Pending Appointments Card -->
                    <div class="col">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted text-uppercase mb-2">Pending Appointments</h6>
                                        <h2 class="mb-0 text-brown-dark"><?php echo $pending_appointments; ?></h2>
                                    </div>
                                    <div class="stat-icon bg-gold-light text-gold-dark">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="appointments" class="btn btn-sm btn-outline-primary">View Appointments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Weekly Messages Card -->
                    <div class="col">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted text-uppercase mb-2">Weekly Messages</h6>
                                        <h2 class="mb-0 text-brown-dark"><?php echo $weekly_messages; ?></h2>
                                    </div>
                                    <div class="stat-icon bg-gold-light text-gold-dark">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="contacts" class="btn btn-sm btn-outline-primary">View Messages</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Services Card -->
                    <div class="col">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted text-uppercase mb-2">Total Services</h6>
                                        <h2 class="mb-0 text-brown-dark"><?php echo $total_services; ?></h2>
                                    </div>
                                    <div class="stat-icon bg-gold-light text-gold-dark">
                                        <i class="fas fa-cut"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="services" class="btn btn-sm btn-outline-primary">Manage Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="row g-4">
                    <!-- Recent Appointments -->
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="h5 mb-0 text-brown-dark">Recent Appointments</h2>
                                    <a href="appointments" class="btn btn-sm btn-outline-primary">View All</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Client</th>
                                            <th>Service</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $recent_appointments = mysqli_query($conn, "SELECT a.*, s.name as service_name 
                                                                                  FROM appointments a
                                                                                  JOIN services s ON a.service_id = s.id
                                                                                  ORDER BY a.appointment_date DESC 
                                                                                  LIMIT 5");
                                        
                                        if ($recent_appointments && mysqli_num_rows($recent_appointments) > 0) {
                                            while ($appointment = mysqli_fetch_assoc($recent_appointments)) {
                                                $status_class = '';
                                                if ($appointment['status'] == 'pending') $status_class = 'badge-pending';
                                                if ($appointment['status'] == 'confirmed') $status_class = 'badge-confirmed';
                                                if ($appointment['status'] == 'cancelled') $status_class = 'badge-cancelled';
                                                
                                                echo "<tr class='recent-item'>";
                                                echo "<td>{$appointment['client_name']}</td>";
                                                echo "<td>{$appointment['service_name']}</td>";
                                                echo "<td>" . date('M j, Y g:i A', strtotime($appointment['appointment_date'])) . "</td>";
                                                echo "<td><span class='badge $status_class'>" . ucfirst($appointment['status']) . "</span></td>";
                                                echo "<td class='text-end'><a href='appointments' class='btn btn-sm btn-outline-primary'>View</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' class='text-center py-4 text-muted'>No recent appointments</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Messages -->
                    <div class="col-lg-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="h5 mb-0 text-brown-dark">Recent Messages</h2>
                                    <a href="contacts" class="btn btn-sm btn-outline-primary">View All</a>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <?php
                                $recent_messages = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 4");
                                
                                if ($recent_messages && mysqli_num_rows($recent_messages) > 0) {
                                    while ($message = mysqli_fetch_assoc($recent_messages)) {
                                        $message_preview = strlen($message['message']) > 50 ? substr($message['message'], 0, 50) . '...' : $message['message'];
                                        
                                        echo "<a href='contacts' class='list-group-item list-group-item-action recent-item'>";
                                        echo "<div class='d-flex justify-content-between align-items-start'>";
                                        echo "<div>";
                                        echo "<h6 class='mb-1'>{$message['name']}</h6>";
                                        echo "<p class='mb-1 text-muted small'>$message_preview</p>";
                                        echo "</div>";
                                        echo "<small class='text-muted'>" . date('M j', strtotime($message['created_at'])) . "</small>";
                                        echo "</div>";
                                        echo "</a>";
                                    }
                                } else {
                                    echo "<div class='list-group-item text-center py-4 text-muted'>No recent messages</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>