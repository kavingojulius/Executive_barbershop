<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_service'])) {
        // Add new service
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $stmt = $conn->prepare("INSERT INTO services (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
        
        $_SESSION['message'] = "Service added successfully!";
        header("Location: services.php");
        exit();
    } elseif (isset($_POST['update_service'])) {
        // Update existing service
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $stmt = $conn->prepare("UPDATE services SET name=?, description=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $description, $id);
        $stmt->execute();
        
        $_SESSION['message'] = "Service updated successfully!";
        header("Location: services.php");
        exit();
    }
}

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM services WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $_SESSION['message'] = "Service deleted successfully!";
    header("Location: services.php");
    exit();
}

// Fetch all services
$services = [];
$result = $conn->query("SELECT * FROM services ORDER BY name");
if ($result) {
    $services = $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch service for editing if edit_id is set
$edit_service = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM services WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $edit_service = $result->fetch_assoc();
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
        .description-cell {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .number-cell {
            width: 50px;
            text-align: center;
            position: sticky;
            left: 0;
            background-color: white;
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
                padding: 0.5rem;
                font-size: 0.875rem;
            }
            
            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
            
            .description-cell {
                max-width: 200px;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 480px) {
            .table td:nth-child(4) {
                white-space: nowrap;
            }
            
            .table td .btn {
                margin: 0.25rem 0;
            }
            
            /* Visual indicator for scrolling */
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
        
        /* Optional: Stacked table layout for very small screens */
        @media (max-width: 300px) {
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
            }
            
            td:nth-of-type(1):before { content: "#"; }
            td:nth-of-type(2):before { content: "Service Name"; }
            td:nth-of-type(3):before { content: "Description"; }
            td:nth-of-type(4):before { content: "Actions"; }
            
            /* Reset some styles for stacked layout */
            .description-cell {
                max-width: none;
                white-space: normal;
            }
            
            .number-cell {
                position: static;
                width: auto;
                text-align: left;
            }
            
            /* Hide the scroll indicator in stacked mode */
            .table-responsive:after {
                display: none;
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
                    <h1 class="h5 mb-0">King's Barbershop</h1>
                </div>
                <div class="d-flex align-items-center gap-3">                    
                    <div class="d-flex align-items-center">                        
                        <span class="avatar me-2" style="background-color: #4f46e5; color: white; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">AD</span>
                        <span class="d-none d-md-inline text-sm">Admin</span>   
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <div class="mb-4">
                    <h1 class="h2 fw-bold text-dark">Services Management</h1>
                    <p class="text-muted">Add, edit, or delete barbershop services</p>
                    
                    <!-- Success message -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    
                    <!-- Add Service Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal">
                        <i class="fas fa-plus me-2"></i>Add New Service
                    </button>
                </div>

                <!-- Services Table -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="number-cell">#</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($services)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4">No services found. Add your first service!</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($services as $index => $service): ?>
                                            <tr>
                                                <td class="number-cell"><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($service['name']) ?></td>
                                                <td class="description-cell" title="<?= htmlspecialchars($service['description']) ?>">
                                                    <?= htmlspecialchars($service['description']) ?>
                                                </td>
                                                <td>
                                                    <a href="services.php?edit=<?= $service['id'] ?>" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="services.php?delete=<?= $service['id'] ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this service?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Service Modal -->
                <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="serviceModalLabel">
                                    <?= isset($edit_service) ? 'Edit Service' : 'Add New Service' ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="services.php">
                                <div class="modal-body">
                                    <?php if (isset($edit_service)): ?>
                                        <input type="hidden" name="id" value="<?= $edit_service['id'] ?>">
                                    <?php endif; ?>
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Service Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required 
                                            value="<?= isset($edit_service) ? htmlspecialchars($edit_service['name']) : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"><?= isset($edit_service) ? htmlspecialchars($edit_service['description']) : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="<?= isset($edit_service) ? 'update_service' : 'add_service' ?>" class="btn btn-primary">
                                        <?= isset($edit_service) ? 'Update Service' : 'Save Service' ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-open modal if editing
        <?php if (isset($edit_service)): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var serviceModal = new bootstrap.Modal(document.getElementById('serviceModal'));
                serviceModal.show();
                
                // Focus on first input field when modal opens
                serviceModal._element.addEventListener('shown.bs.modal', function () {
                    document.getElementById('name').focus();
                });
            });
        <?php endif; ?>

        // Focus on first input field when adding new service
        document.getElementById('serviceModal').addEventListener('shown.bs.modal', function () {
            if (!<?= isset($edit_service) ? 'true' : 'false' ?>) {
                document.getElementById('name').focus();
            }
        });
    </script>
</body>
</html>