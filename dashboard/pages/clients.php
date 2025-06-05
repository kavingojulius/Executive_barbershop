<?php
include '../includes/header.php';
require_once '../includes/db.php';

$result = $conn->query("SELECT * FROM clients");
?>

<h2>Client List</h2>
<table class="table table-bordered mt-4">
    <thead>
        <tr><th>Name</th><th>Email</th><th>Phone</th></tr>
    </thead>
    <tbody>
        <?php while ($c = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $c['name'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $c['phone'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
