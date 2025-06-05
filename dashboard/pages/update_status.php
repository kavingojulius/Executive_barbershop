<?php
require_once '../includes/db.php';
include '../includes/auth.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'];
    $allowed = ['pending', 'confirmed', 'cancelled'];

    if (in_array($status, $allowed)) {
        $stmt = $conn->prepare("UPDATE appointments SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    }
}
header("Location: appointments.php");
exit();
?>
