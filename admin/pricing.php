<?php
session_start();

include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_pricing'])) {
        // Add new pricing item
        $service_name = $_POST['service_name'];
        $price = $_POST['price'];
        
        $stmt = $conn->prepare("INSERT INTO pricing (service_name, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $service_name, $price);
        $stmt->execute();
        
        $_SESSION['message'] = "Pricing item added successfully!";
        header("Location: pricing.php");
        exit();
    } elseif (isset($_POST['update_pricing'])) {
        // Update existing pricing item
        $id = $_POST['id'];
        $service_name = $_POST['service_name'];
        $price = $_POST['price'];
        
        $stmt = $conn->prepare("UPDATE pricing SET service_name=?, price=? WHERE id=?");
        $stmt->bind_param("sdi", $service_name, $price, $id);
        $stmt->execute();
        
        $_SESSION['message'] = "Pricing item updated successfully!";
        header("Location: pricing.php");
        exit();
    }
}

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM pricing WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $_SESSION['message'] = "Pricing item deleted successfully!";
    header("Location: pricing.php");
    exit();
}

// Fetch all pricing items
$pricing = [];
$result = $conn->query("SELECT * FROM pricing ORDER BY service_name");
if ($result) {
    $pricing = $result->fetch_all(MYSQLI_ASSOC);
}

// Fetch pricing item for editing if edit_id is set
$edit_pricing = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM pricing WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $edit_pricing = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .price-cell {
            width: 100px;
            text-align: right;
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
            
            .price-cell {
                width: 80px;
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
            td:nth-of-type(3):before { content: "Price"; }
            td:nth-of-type(4):before { content: "Actions"; }
            
            .price-cell {
                text-align: left !important;
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
                    <h1 class="h2 fw-bold text-dark">Pricing Management</h1>
                    <p class="text-muted">Manage your barbershop pricing</p>
                    
                    <!-- Success message -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    
                    <!-- Add Pricing Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pricingModal">
                        <i class="fas fa-plus me-2"></i>Add New Pricing Item
                    </button>
                </div>

                <!-- Pricing Table -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="number-cell">#</th>
                                        <th>Service Name</th>
                                        <th class="price-cell">Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($pricing)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4">No pricing items found. Add your first pricing item!</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($pricing as $index => $item): ?>
                                            <tr>
                                                <td class="number-cell"><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($item['service_name']) ?></td>
                                                <td class="price-cell">Ksh:<?= number_format($item['price'], 2) ?></td>
                                                <td>
                                                    <a href="pricing.php?edit=<?= $item['id'] ?>" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="pricing.php?delete=<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this pricing item?')">
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

                <!-- Pricing Modal -->
                <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pricingModalLabel">
                                    <?= isset($edit_pricing) ? 'Edit Pricing Item' : 'Add New Pricing Item' ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="pricing.php">
                                <div class="modal-body">
                                    <?php if (isset($edit_pricing)): ?>
                                        <input type="hidden" name="id" value="<?= $edit_pricing['id'] ?>">
                                    <?php endif; ?>
                                    
                                    <div class="mb-3">
                                        <label for="service_name" class="form-label">Service Name *</label>
                                        <input type="text" class="form-control" id="service_name" name="service_name" required 
                                            value="<?= isset($edit_pricing) ? htmlspecialchars($edit_pricing['service_name']) : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price *</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required 
                                                value="<?= isset($edit_pricing) ? htmlspecialchars($edit_pricing['price']) : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="<?= isset($edit_pricing) ? 'update_pricing' : 'add_pricing' ?>" class="btn btn-primary">
                                        <?= isset($edit_pricing) ? 'Update Pricing' : 'Save Pricing' ?>
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
        <?php if (isset($edit_pricing)): ?>
            document.addEventListener('DOMContentLoaded', function() {
                var pricingModal = new bootstrap.Modal(document.getElementById('pricingModal'));
                pricingModal.show();
                
                // Focus on first input field when modal opens
                pricingModal._element.addEventListener('shown.bs.modal', function () {
                    document.getElementById('service_name').focus();
                });
            });
        <?php endif; ?>

        // Focus on first input field when adding new pricing item
        document.getElementById('pricingModal').addEventListener('shown.bs.modal', function () {
            if (!<?= isset($edit_pricing) ? 'true' : 'false' ?>) {
                document.getElementById('service_name').focus();
            }
        });
    </script>
</body>
</html>