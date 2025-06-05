<?php
include '../includes/header.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caption = $_POST['caption'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/images/$image");

    $stmt = $conn->prepare("INSERT INTO gallery (image, caption) VALUES (?, ?)");
    $stmt->bind_param("ss", $image, $caption);
    $stmt->execute();
}

$gallery = $conn->query("SELECT * FROM gallery");
?>

<h2>Gallery</h2>
<form method="post" enctype="multipart/form-data" class="mb-4">
    <input type="file" name="image" class="form-control mb-2" required>
    <input type="text" name="caption" class="form-control mb-2" placeholder="Caption">
    <button class="btn btn-primary">Upload</button>
</form>

<div class="row g-3">
<?php while ($img = $gallery->fetch_assoc()): ?>
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/images/<?= $img['image'] ?>" class="card-img-top" height="180">
            <div class="card-body p-2">
                <p class="small"><?= $img['caption'] ?></p>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>

<?php include '../includes/footer.php'; ?>
