<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
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
        
        /* Custom table styles */
        .table-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #4f46e5;
            color: white;
        }
        .table th {
            padding: 12px 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #f1f1f1;
        }
        .table tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.05);
        }
        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-new {
            background-color: #dbeafe;
            color: #1d4ed8;
        }
        .badge-read {
            background-color: #dcfce7;
            color: #15803d;
        }
        .badge-archived {
            background-color: #f3f4f6;
            color: #6b7280;
        }
        .serial-number {
            font-weight: 600;
            color: #4f46e5;
        }
        .message-preview {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 300px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex vh-100">
        
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

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
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="h2 fw-bold text-dark">Received Messages</h1>
                    <div>
                        <button class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-filter me-1"></i> Filter</button>
                        <button class="btn btn-sm btn-primary"><i class="fas fa-download me-1"></i> Export</button>
                    </div>
                </div>

                <div class="table-container bg-white">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message Preview</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 80px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
                            $result = mysqli_query($conn, $query);
                            $counter = 1;
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Generate a random status for demonstration
                                    $statuses = ['new', 'read', 'archived'];
                                    $randomStatus = $statuses[array_rand($statuses)];
                                    
                                    echo "<tr>";
                                    echo "<td class='serial-number'>" . $counter . "</td>";
                                    echo "<td><strong>" . htmlspecialchars($row['name']) . "</strong></td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td class='message-preview' title='" . htmlspecialchars($row['message']) . "'>" . htmlspecialchars($row['message']) . "</td>";
                                    echo "<td>" . date("M d, Y h:i A", strtotime($row['created_at'])) . "</td>";
                                    echo "<td><span class='badge-status badge-" . $randomStatus . "'>" . ucfirst($randomStatus) . "</span></td>";
                                    echo "<td class='text-center'>";
                                    echo "<button class='btn btn-sm btn-outline-primary' title='View'><i class='fas fa-eye'></i></button>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center py-4'>No messages found.</td></tr>";
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