<?php include '../includes/header.php'; ?>
<h2>Welcome to the Dashboard</h2>

<div class="row g-4 mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5 class="card-title">Upcoming Appointments</h5>
                <p class="card-text fs-4">12</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h5 class="card-title">Total Clients</h5>
                <p class="card-text fs-4">104</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-dark shadow">
            <div class="card-body">
                <h5 class="card-title">Services Offered</h5>
                <p class="card-text fs-4">8</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <h4>Quick Links</h4>
    <div class="d-flex gap-3">
        <a href="appointments.php" class="btn btn-outline-primary">Manage Appointments</a>
        <a href="services.php" class="btn btn-outline-success">Manage Services</a>
        <a href="staff.php" class="btn btn-outline-dark">Manage Staff</a>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
