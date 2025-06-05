<?php
include '../includes/header.php';
require_once '../includes/db.php';

$services = $conn->query("SELECT services.*, categories.name as category FROM services 
                          LEFT JOIN categories ON services.category_id = categories.id");

$categories = $conn->query("SELECT * FROM categories");
?>

<h2>Manage Services</h2>
<a href="add_service.php" class="btn btn-primary my-3">Add New Service</a>
<table class="table table-bordered">
    <thead>
        <tr><th>Name</th><th>Category</th><th>Price</th><th>Actions</th></tr>
    </thead>
    <tbody>
    <?php while ($row = $services->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['category'] ?? 'Uncategorized' ?></td>
            <td>$<?= $row['price'] ?></td>
            <td>
                <a href="edit_service.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_service.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
