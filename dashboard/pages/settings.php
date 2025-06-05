<?php
include '../includes/header.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $val) {
        $stmt = $conn->prepare("REPLACE INTO settings (`key`, `value`) VALUES (?, ?)");
        $stmt->bind_param("ss", $key, $val);
        $stmt->execute();
    }
    echo '<div class="alert alert-success">Settings updated</div>';
}

$settings = [];
$res = $conn->query("SELECT * FROM settings");
while ($row = $res->fetch_assoc()) {
    $settings[$row['key']] = $row['value'];
}
?>

<h2>Settings</h2>
<form method="post" class="row g-3 mt-4">
    <div class="col-md-4">
        <label>Opening Hours</label>
        <input type="text" name="opening_hours" class="form-control" value="<?= $settings['opening_hours'] ?? '' ?>">
    </div>
    <div class="col-md-4">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= $settings['phone'] ?? '' ?>">
    </div>
    <div class="col-md-4">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="<?= $settings['address'] ?? '' ?>">
    </div>
    <button class="btn btn-dark mt-3">Save Settings</button>
</form>

<?php include '../includes/footer.php'; ?>
