<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM contact_messages WHERE id=?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
            
    $_SESSION['message'] = "Message deleted successfully!";
    header("Location: contacts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Barbershop Dashboard</title>
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

        /* Main layout */
        body.bg-light {
            background-color: var(--gray-light) !important;
        }
        
        /* Table container */
        .table-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            background: var(--white);
            position: relative;
            z-index: 1;
        }
        
        /* Table styling */
        .table {
            margin-bottom: 0;
            font-size: 0.85rem;
        }
        
        .table thead {
            background-color: var(--brown-dark);
            color: var(--gold-secondary);
            position: sticky;
            top: 0;
        }
        
        .table th {
            padding: 12px 15px;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }
        
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid rgba(0,0,0,0.05);
            background: var(--white);
        }
        
        .table tbody tr:hover td {
            background-color: rgba(212, 175, 55, 0.05);
        }
        
        /* Client info */
        .client-info {
            display: flex;
            flex-direction: column;
        }
        
        .client-name {
            font-weight: 500;
            color: var(--black);
            font-size: 0.9rem;
            line-height: 1.3;
        }
        
        .client-email {
            font-size: 0.75rem;
            color: var(--brown-light);
            margin-top: 2px;
        }
        
        /* Message preview */
        .message-preview {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            font-size: 0.8rem;
            color: var(--brown-dark);
            line-height: 1.4;
        }
        
        /* Status badges */
        .badge-status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }
        
        .badge-new {
            background-color: rgba(212, 175, 55, 0.2);
            color: var(--brown-dark);
        }
        
        .badge-read {
            background-color: rgba(139, 90, 43, 0.2);
            color: var(--brown-dark);
        }
        
        .badge-archived {
            background-color: rgba(92, 64, 51, 0.2);
            color: var(--brown-dark);
        }
        
        /* Date cell */
        .date-cell {
            font-size: 0.8rem;
            color: var(--brown-light);
            white-space: nowrap;
        }
        
        /* Action button */
        .action-btn {
            width: 30px;
            height: 30px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
        }
        
        .action-btn:hover {
            background-color: var(--gold-primary);
            color: var(--black);
            transform: scale(1.05);
        }

        /* Delete button specific styles */
        .delete-btn {
            color: #dc3545;
            border-color: #dc3545;
        }
        
        .delete-btn:hover {
            background-color: #dc3545;
            color: white;
        }
        
        /* Modal styling */
        .modal-message {
            white-space: pre-wrap;
            background-color: var(--gray-light);
            padding: 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Header styling */
        .header-search {
            max-width: 200px;
        }

        /* Alert styling */
        .alert-success {
            background-color: rgba(139, 90, 43, 0.2);
            border-color: rgba(139, 90, 43, 0.3);
            color: var(--brown-dark);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.3);
            color: #721c24;
        }

        /* ================== */
        /* Responsive Additions */
        /* ================== */

        /* Number cell styling */
        .number-cell {
            position: sticky;
            left: 0;
            background-color: var(--white);
            z-index: 1;
        }

        /* Improved table responsiveness */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            position: relative;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
            
            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
            
            .message-preview {
                max-width: 150px;
            }

            .client-name {
                font-size: 0.85rem;
            }

            .client-email {
                font-size: 0.7rem;
            }

            .date-cell {
                font-size: 0.75rem;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 576px) {
            .table-container {
                border-radius: 0;
                box-shadow: none;
                border: 1px solid rgba(0,0,0,0.1);
            }

            /* Visual indicator for scrolling */
            .table-responsive:after {
                content: '→';
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--gold-primary);
                font-size: 1.5rem;
                opacity: 0.7;
                animation: bounceRight 2s infinite;
            }
            
            @keyframes bounceRight {
                0%, 100% { transform: translateY(-50%) translateX(0); }
                50% { transform: translateY(-50%) translateX(5px); }
            }
        }

        /* Very small screens - stacked layout */
        @media (max-width: 300px) {
            .table-responsive:after {
                display: none;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }
            
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr {
                margin-bottom: 1rem;
                border: 1px solid rgba(0,0,0,0.1);
                position: relative;
            }
            
            td {
                border: none;
                border-bottom: 1px solid rgba(0,0,0,0.05);
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align: left;
            }
            
            td:before {
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: bold;
                color: var(--gold-dark);
                content: attr(data-label);
            }
            
            /* Reset specific styles for stacked layout */
            .message-preview {
                max-width: none;
                -webkit-line-clamp: unset;
                white-space: normal;
            }
            
            .number-cell {
                position: static;
                background-color: transparent;
            }

            /* Hide the first column (number) in stacked view */
            td:first-child {
                display: none;
            }

            /* Adjust action button */
            .action-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: var(--gold-primary);
                color: var(--black);
            }
        }

        /* Tiny screens - further adjustments */
        @media (max-width: 360px) {
            td {
                padding-left: 40%;
            }
            
            td:before {
                width: 35%;
                font-size: 0.7rem;
            }
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
                    <h1 class="h5 mb-0 text-brown-dark">Executive Barbershop</h1>
                </div>
                <div class="d-flex align-items-center gap-3">                    
                    <div class="d-flex align-items-center">
                        <span class="avatar me-2" style="background-color: var(--gold-primary) !important; color: var(--black) !important; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">AD</span>
                        <span class="d-none d-md-inline text-sm text-brown-dark">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <!-- Success/Error Messages -->
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="h4 fw-bold text-brown-dark mb-0">Client Messages</h1>
                </div>

                <div class="table-container table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
                            $result = mysqli_query($conn, $query);
                            $counter = 1;
                            
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $statuses = ['new', 'read', 'archived'];
                                    $randomStatus = $statuses[array_rand($statuses)];
                                    
                                    echo "<tr>";
                                    echo "<td class='text-muted number-cell' data-label='#'>" . $counter . "</td>";
                                    echo "<td data-label='Client'>";
                                    echo "<div class='client-info'>";
                                    echo "<span class='client-name'>" . htmlspecialchars($row['name']) . "</span>";
                                    echo "<span class='client-email'>" . htmlspecialchars($row['email']) . "</span>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td data-label='Message'><div class='message-preview' title='" . htmlspecialchars($row['message']) . "'>" . htmlspecialchars($row['message']) . "</div></td>";
                                    echo "<td class='date-cell' data-label='Date'>" . date("M d, Y", strtotime($row['created_at'])) . "</td>";
                                    echo "<td data-label='Status'><span class='badge-status badge-" . $randomStatus . "'>" . ucfirst($randomStatus) . "</span></td>";
                                    echo "<td class='text-center' data-label='Actions'>";
                                    echo "<div class='d-flex gap-1 justify-content-center'>";
                                    echo "<button class='btn btn-sm action-btn view-message' 
                                            data-bs-toggle='modal' 
                                            data-bs-target='#messageModal'
                                            data-id='" . $row['id'] . "'
                                            data-name='" . htmlspecialchars($row['name']) . "'
                                            data-email='" . htmlspecialchars($row['email']) . "'
                                            data-message='" . htmlspecialchars($row['message']) . "'
                                            data-date='" . date("M d, Y h:i A", strtotime($row['created_at'])) . "'
                                            title='View'>
                                            <i class='fas fa-eye'></i>
                                        </button>";
                                    echo "<a href='contacts.php?delete_id=" . $row['id'] . "' class='btn btn-sm action-btn delete-btn' title='Delete' onclick='return confirm(\"Are you sure you want to delete this message?\")'>
                                            <i class='fas fa-trash'></i>
                                        </a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-4 text-muted'>No messages found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Message View Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-brown-dark text-gold-secondary">
                    <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">From:</h6>
                        <div id="modal-client-name" class="fw-bold text-brown-dark"></div>
                        <div id="modal-client-email" class="small text-brown-light"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Date:</h6>
                        <div id="modal-date" class="small text-brown-light"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Message:</h6>
                        <div id="modal-message" class="modal-message"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize modal with message data
        document.addEventListener('DOMContentLoaded', function() {
            const messageModal = document.getElementById('messageModal');
            if (messageModal) {
                messageModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    document.getElementById('modal-client-name').textContent = button.getAttribute('data-name');
                    document.getElementById('modal-client-email').textContent = button.getAttribute('data-email');
                    document.getElementById('modal-date').textContent = button.getAttribute('data-date');
                    document.getElementById('modal-message').textContent = button.getAttribute('data-message');
                });
            }
        });
    </script>
</body>
</html>