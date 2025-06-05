<?php
include '../includes/header.php';
require_once '../includes/db.php';

$result = $conn->query("SELECT appointments.*, services.name AS service FROM appointments 
                        LEFT JOIN services ON appointments.service_id = services.id 
                        ORDER BY date, time");
?>

<h2>Manage Appointments</h2>
<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>Client</th><th>Phone</th><th>Service</th><th>Date</th><th>Time</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['client_name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['service'] ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['time'] ?></td>
            <td><?= ucfirst($row['status']) ?></td>
            <td>
                <a href="update_status.php?id=<?= $row['id'] ?>&status=confirmed" class="btn btn-sm btn-success">Confirm</a>
                <a href="update_status.php?id=<?= $row['id'] ?>&status=cancelled" class="btn btn-sm btn-danger">Cancel</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
