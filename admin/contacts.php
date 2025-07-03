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
        /* Main layout */
        body.bg-light {
            background-color: #f8f9fa !important;
        }
        
        /* Table container */
        .table-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            background: white;
            position: relative;
            z-index: 1;
        }
        
        /* Table styling */
        .table {
            margin-bottom: 0;
            font-size: 0.85rem;
        }
        
        .table thead {
            background-color: #4f46e5;
            color: white;
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
            border-top: 1px solid #f1f1f1;
            background: white;
        }
        
        .table tbody tr:hover td {
            background-color: rgba(79, 70, 229, 0.03);
        }
        
        /* Client info */
        .client-info {
            display: flex;
            flex-direction: column;
        }
        
        .client-name {
            font-weight: 500;
            color: #333;
            font-size: 0.9rem;
            line-height: 1.3;
        }
        
        .client-email {
            font-size: 0.75rem;
            color: #6c757d;
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
            color: #555;
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
            background-color: #e6f0ff;
            color: #1a73e8;
        }
        
        .badge-read {
            background-color: #e6f7ee;
            color: #0d8a4f;
        }
        
        .badge-archived {
            background-color: #f3f4f6;
            color: #6b7280;
        }
        
        /* Date cell */
        .date-cell {
            font-size: 0.8rem;
            color: #6c757d;
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
        }
        
        .action-btn:hover {
            background-color: #4f46e5;
            color: white;
            transform: scale(1.05);
        }
        
        /* Modal styling */
        .modal-message {
            white-space: pre-wrap;
            background-color: #f8f9fa;
            padding: 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Header styling */
        .header-search {
            max-width: 200px;
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
                    <div class="input-group header-search">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Search...">
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary"><i class="fas fa-bell"></i></button>
                    <button class="btn btn-outline-secondary"><i class="fas fa-envelope"></i></button>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle me-2" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile" width="32" height="32">
                        <span class="d-none d-md-inline text-sm">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h1 class="h4 fw-bold text-dark mb-0">Client Messages</h1>
                    <div>
                        <button class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-filter me-1"></i> Filter</button>
                        <button class="btn btn-sm btn-primary"><i class="fas fa-download me-1"></i> Export</button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
                            $result = mysqli_query($conn, $query);
                            $counter = 1;
                            
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $statuses = ['new', 'read', 'archived'];
                                    $randomStatus = $statuses[array_rand($statuses)];
                                    
                                    echo "<tr>";
                                    echo "<td class='text-muted'>" . $counter . "</td>";
                                    echo "<td>";
                                    echo "<div class='client-info'>";
                                    echo "<span class='client-name'>" . htmlspecialchars($row['name']) . "</span>";
                                    echo "<span class='client-email'>" . htmlspecialchars($row['email']) . "</span>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "<td><div class='message-preview' title='" . htmlspecialchars($row['message']) . "'>" . htmlspecialchars($row['message']) . "</div></td>";
                                    echo "<td class='date-cell'>" . date("M d, Y", strtotime($row['created_at'])) . "</td>";
                                    echo "<td><span class='badge-status badge-" . $randomStatus . "'>" . ucfirst($randomStatus) . "</span></td>";
                                    echo "<td class='text-center'>";
                                    echo "<button class='btn btn-sm action-btn btn-outline-primary view-message' 
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
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">From:</h6>
                        <div id="modal-client-name" class="fw-bold"></div>
                        <div id="modal-client-email" class="text-muted small"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Date:</h6>
                        <div id="modal-date" class="text-muted small"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-bold mb-1">Message:</h6>
                        <div id="modal-message" class="modal-message"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Reply</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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