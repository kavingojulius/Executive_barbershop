<?php
include '../includes/header.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $specialty = $_POST['specialty'];

    $image = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, "../assets/images/$image");

    $stmt = $conn->prepare("INSERT INTO staff (name, photo, bio, specialty) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $image, $bio, $specialty);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM staff");
?>

<h2>Manage Staff</h2>

<form method="post" enctype="multipart/form-data" class="mb-4">
    <div class="row g-2">
        <div class="col-md-3"><input type="text" name="name" placeholder="Name" class="form-control" required></div>
        <div class="col-md-3"><input type="text" name="specialty" placeholder="Specialty" class="form-control" required></div>
        <div class="col-md-3"><input type="file" name="photo" class="form-control" required></div>
        <div class="col-md-3"><textarea name="bio" placeholder="Bio" class="form-control" required></textarea></div>
    </div>
    <button class="btn btn-dark mt-2">Add Staff</button>
</form>

<div class="row g-4">
<?php while ($s = $result->fetch_assoc()): ?>
    <div class="col-md-3">
        <div class="card shadow">
            <img src="../assets/images/<?= $s['photo'] ?>" class="card-img-top" height="200">
            <div class="card-body">
                <h5><?= $s['name'] ?></h5>
                <p class="mb-1"><b><?= $s['specialty'] ?></b></p>
                <p class="text-muted small"><?= $s['bio'] ?></p>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>

<?php include '../includes/footer.php'; ?>
