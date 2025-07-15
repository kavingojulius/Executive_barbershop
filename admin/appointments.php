<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $appointment_id = $_POST['id'];
    $status = $_POST['status'];
    
    $stmt = $conn->prepare("UPDATE appointment_requests SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $appointment_id);
    $stmt->execute();
    
    $_SESSION['message'] = "Appointment status updated successfully!";
    header("Location: appointments.php");
    exit();
}
// Handle delete action
if (isset($_GET['delete'])) {       
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM appointment_requests WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Appointment deleted successfully!";
    } else {
        $_SESSION['message'] = "Failed to delete appointment.";
    }
    header("Location: appointments.php");
    exit();
}

// Fetch all appointments
$appointments = [];
$result = $conn->query("SELECT * FROM appointment_requests ORDER BY created_at DESC");
if ($result) {
    $appointments = $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch appointment for editing if edit_id is set
$edit_appointment = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM appointment_requests WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $edit_appointment = $result->fetch_assoc();
}

// Fetch appointment for viewing if view_id is set
$view_appointment = null;
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $stmt = $conn->prepare("SELECT * FROM appointment_requests WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $view_appointment = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --indigo-700: #4f46e5;
            --indigo-800: #4338ca;
            --indigo-600: #5b21b6;
            --indigo-100: #e0e7ff;
            --purple-100: #e9d5ff;
            --purple-600: #7c3aed;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
                               
        .table-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            background: white;
        }
        
        .table {
            margin-bottom: 0;
            font-size: 0.8125rem;
        }
        
        .table thead {
            background-color: var(--indigo-700);
            color: white;
        }
        
        .table th {
            padding: 10px 12px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            vertical-align: middle;
            border-bottom: none;
        }
        
        .table td {
            padding: 10px 12px;
            vertical-align: middle;
            border-top: 1px solid #f1f1f1;
            color: #4a5568;
        }
        
        .table tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.03);
        }
        
        .badge-status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.6875rem;
            font-weight: 600;
            display: inline-block;
            min-width: 70px;
            text-align: center;
        }
        
        .badge-pending {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .badge-confirmed {
            background-color: #dcfce7;
            color: #15803d;
        }
        
        .badge-cancelled {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        
        .badge-completed {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        
        .serial-number {
            font-weight: 600;
            color: var(--indigo-700);
            font-size: 0.8125rem;
        }
        
        .text-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
            display: inline-block;
        }
        
        .btn-icon {
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 6px;
        }
        
        .btn-icon-sm {
            width: 24px;
            height: 24px;
            font-size: 0.75rem;
        }
        
        .avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--indigo-100);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.6875rem;
            font-weight: 600;
            color: var(--indigo-700);
        }
        
        .date-badge {
            background-color: #f1f5f9;
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            display: inline-block;
        }
        
        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            border-bottom: 1px solid #f1f1f1;
            padding: 16px 20px;
        }
        
        .modal-title {
            font-size: 1rem;
            font-weight: 600;
        }
        
        .modal-footer {
            border-top: 1px solid #f1f1f1;
            padding: 12px 20px;
        }
        
        .form-select, .form-control {
            font-size: 0.8125rem;
            padding: 6px 12px;
            border-radius: 6px;
        }
        
        .form-label {
            font-size: 0.8125rem;
            font-weight: 500;
            margin-bottom: 4px;
        }
        
        .page-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1a202c;
        }
        
        .empty-state {
            padding: 40px 20px;
            text-align: center;
        }
        
        .empty-state-icon {
            font-size: 2rem;
            color: #cbd5e0;
            margin-bottom: 16px;
        }
        
        .empty-state-text {
            color: #a0aec0;
            font-size: 0.875rem;
        }
        
        .detail-label {
            font-weight: 500;
            color: #4a5568;
            min-width: 120px;
        }
        
        .detail-value {
            color: #1a202c;
        }
        
        .appointment-details {
            padding: 0 1rem;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 0.75rem;
            align-items: flex-start;
        }
        
        .message-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
        }

        /* Responsive Additions */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            position: relative;
        }

        /* Number cell styling */
        .serial-number {
            position: sticky;
            left: 0;
            background-color: white;
            z-index: 1;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
            
            .btn-icon-sm {
                width: 20px;
                height: 20px;
                font-size: 0.7rem;
            }
            
            .text-ellipsis {
                max-width: 120px;
            }

            .avatar {
                width: 20px;
                height: 20px;
                font-size: 0.625rem;
            }

            .date-badge {
                font-size: 0.7rem;
            }
        }

        /* Extra small devices */
        @media (max-width: 576px) {
            .table-container {
                border-radius: 0;
                box-shadow: none;
                border: 1px solid #dee2e6;
            }

            .table-responsive:after {
                content: '→';
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
                font-size: 1.5rem;
                opacity: 0.5;
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
                border: 1px solid #dee2e6;
                position: relative;
            }
            
            td {
                border: none;
                border-bottom: 1px solid #eee;
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
                content: attr(data-label);
            }
            
            .text-ellipsis {
                max-width: none;
                white-space: normal;
            }
            
            .serial-number {
                position: static;
                background-color: transparent;
            }

            td:first-child {
                display: none;
            }

            .btn-icon-sm {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: var(--indigo-700);
                color: white;
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
    <div class="alert-container position-fixed top-3 end-3" style="z-index: 1100;">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" style="width: 280px;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <span class="flex-grow-1"><?= $_SESSION['message'] ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </div>

    <div class="d-flex vh-100">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main content -->
        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            <!-- Top navigation -->
            <header class="d-flex align-items-center justify-content-between p-3 bg-white border-bottom">
                <div class="d-flex align-items-center">
                    <button class="d-md-none btn btn-outline-secondary btn-icon btn-sm me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                        <i class="fas fa-bars"></i>
                    </button>     
                    <h1 class="h5 mb-0">Executive Barbershop</h1>               
                </div>
                <div class="d-flex align-items-center gap-2">                    
                    <div class="d-flex align-items-center ms-2">
                        <span class="avatar me-2">AD</span>
                        <span class="d-none d-md-inline text-sm">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-3">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h1 class="page-title mb-0">Appointment Requests</h1>
                    <!-- <div>
                        <button class="btn btn-sm btn-outline-secondary me-2"><i class="fas fa-filter me-1"></i> Filter</button>
                        <button class="btn btn-sm btn-primary"><i class="fas fa-download me-1"></i> Export</button>
                    </div> -->
                </div>

                <div class="table-container table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 40px;">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($appointments)): ?>
                                <tr>
                                    <td colspan="8" class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                        <div class="empty-state-text">No appointment requests found</div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($appointments as $index => $appointment): ?>
                                    <?php
                                    $status = $appointment['status'] ?? 'pending';
                                    $badgeClass = 'badge-' . $status;
                                    $statusText = ucfirst($status);
                                    $initials = implode('', array_map(function($n) { return $n[0]; }, explode(' ', $appointment['name'])));
                                    ?>
                                    <tr>
                                        <td class="serial-number" data-label="#"> <?= $index + 1 ?></td>
                                        <td data-label="Client">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-2"><?= substr($initials, 0, 2) ?></span>
                                                <div>
                                                    <div class="fw-500"><?= htmlspecialchars($appointment['name']) ?></div>
                                                    <div class="text-muted text-ellipsis" style="max-width: 180px;"><?= htmlspecialchars($appointment['email']) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Contact"><?= htmlspecialchars($appointment['phone_number']) ?></td>
                                        <td data-label="Date & Time">
                                            <div class="date-badge">
                                                <i class="far fa-calendar-alt me-1"></i>
                                                <?= date("M d, Y", strtotime($appointment['appointment_date'])) ?>
                                            </div>
                                            <div class="text-muted small mt-1">
                                                <?= date("h:i A", strtotime($appointment['appointment_date'])) ?>
                                            </div>
                                        </td>
                                        <td data-label="Subject">
                                            <span class="text-ellipsis" style="max-width: 200px;" title="<?= htmlspecialchars($appointment['subject']) ?>">
                                                <?= htmlspecialchars($appointment['subject']) ?>
                                            </span>
                                        </td>
                                        <td data-label="Created">
                                            <div class="text-muted small">
                                                <?= date("M d, Y", strtotime($appointment['created_at'])) ?>
                                            </div>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge-status <?= $badgeClass ?>"><?= $statusText ?></span>
                                        </td>
                                        <td data-label="Actions">
                                            <div class="d-flex gap-1">
                                                <a href="appointments.php?view=<?= $appointment['id'] ?>" class="btn btn-sm btn-outline-secondary btn-icon btn-icon-sm" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="appointments.php?edit=<?= $appointment['id'] ?>" class="btn btn-sm btn-outline-primary btn-icon btn-icon-sm" title="Edit Status">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="appointments.php?delete=<?= $appointment['id'] ?>" class="btn btn-sm btn-outline-danger btn-icon btn-icon-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this service?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="appointments.php">
                    <div class="modal-body">
                        <?php if (isset($edit_appointment)): ?>
                            <input type="hidden" name="id" value="<?= $edit_appointment['id'] ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Client</label>
                                <div class="fw-500"><?= htmlspecialchars($edit_appointment['name']) ?></div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Appointment Date</label>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="date-badge">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        <?= date("M d, Y", strtotime($edit_appointment['appointment_date'])) ?>
                                    </div>
                                    <div class="text-muted small">
                                        <?= date("h:i A", strtotime($edit_appointment['appointment_date'])) ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Current Status</label>
                                <div>
                                    <span class="badge-status badge-<?= $edit_appointment['status'] ?? 'pending' ?>">
                                        <?= ucfirst($edit_appointment['status'] ?? 'pending') ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label">New Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="pending" <?= ($edit_appointment['status'] ?? '') == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="confirmed" <?= ($edit_appointment['status'] ?? '') == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                    <option value="cancelled" <?= ($edit_appointment['status'] ?? '') == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                    <option value="completed" <?= ($edit_appointment['status'] ?? '') == 'completed' ? 'selected' : '' ?>>Completed</option>
                                </select>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update_status" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Appointment Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($view_appointment)): ?>
                        <div class="appointment-details">
                            <div class="d-flex align-items-center mb-4">
                                <div class="avatar me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                    <?php 
                                    $initials = implode('', array_map(function($n) { return $n[0]; }, explode(' ', $view_appointment['name']))); 
                                    echo substr($initials, 0, 2); 
                                    ?>
                                </div>
                                <div>
                                    <h5 class="mb-0"><?= htmlspecialchars($view_appointment['name']) ?></h5>
                                    <div class="text-muted"><?= htmlspecialchars($view_appointment['email']) ?></div>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge-status badge-<?= $view_appointment['status'] ?? 'pending' ?>">
                                        <?= ucfirst($view_appointment['status'] ?? 'pending') ?>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <span class="detail-label">Phone:</span>
                                        <span class="detail-value"><?= htmlspecialchars($view_appointment['phone_number']) ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <span class="detail-label">Appointment Date:</span>
                                        <span class="detail-value">
                                            <?= date("M d, Y h:i A", strtotime($view_appointment['appointment_date'])) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <span class="detail-label">Created At:</span>
                                        <span class="detail-value">
                                            <?= date("M d, Y h:i A", strtotime($view_appointment['created_at'])) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <span class="detail-label">Last Updated:</span>
                                        <span class="detail-value">
                                            <?= date("M d, Y h:i A", strtotime($view_appointment['updated_at'] ?? $view_appointment['created_at'])) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="detail-row">
                                        <span class="detail-label">Subject:</span>
                                        <span class="detail-value"><?= htmlspecialchars($view_appointment['subject']) ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if (!empty($view_appointment['message'])): ?>
                                <div class="message-box">
                                    <h6 class="mb-2">Client Message:</h6>
                                    <p class="mb-0"><?= nl2br(htmlspecialchars($view_appointment['message'])) ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php if (isset($view_appointment)): ?>
                        <a href="appointments.php?edit=<?= $view_appointment['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-pencil-alt me-1"></i> Edit Status
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-open modals based on URL parameters
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($edit_appointment)): ?>
                var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
                statusModal.show();
                
                // Clean URL when modal is closed
                document.getElementById('statusModal').addEventListener('hidden.bs.modal', function () {
                    if (window.location.search.includes('edit=')) {
                        window.history.replaceState({}, document.title, window.location.pathname);
                    }
                });
            <?php endif; ?>
            
            <?php if (isset($view_appointment)): ?>
                var viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
                viewModal.show();
                
                // Clean URL when modal is closed
                document.getElementById('viewModal').addEventListener('hidden.bs.modal', function () {
                    if (window.location.search.includes('view=')) {
                        window.history.replaceState({}, document.title, window.location.pathname);
                    }
                });
            <?php endif; ?>
            
            // Auto-dismiss alert after 3 seconds
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 3000);
        });
    </script>
</body>
</html>