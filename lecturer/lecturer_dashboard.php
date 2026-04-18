<?php
session_start();

if($_SESSION['role'] != 'lecturer'){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">

    <div class="marquee">
        <div class="track">
            Welcome, Lecturer 🎉 — Manage your course materials easily!
        </div>
    </div>

    <h2>Lecturer Dashboard</h2>

    <!-- ✅ NEW GRID LAYOUT -->
    <div class="hex-grid">

       
<div class="hex-grid">

    <a href="upload.php" class="hex upload">
        <div class="hex-content">
            📤
            <p>Upload</p>
        </div>
    </a>

    <a href="manage_files.php" class="hex manage">
        <div class="hex-content">
            📂
            <p>Manage</p>
        </div>
    </a>

    <a href="../auth/logout.php" class="hex logout">
        <div class="hex-content">
            🚪
            <p>Logout</p>
        </div>
    </a>

    <a href="profile.php" class="hex profile">
        <div class="hex-content">
            👤
            <p>Profile</p>
        </div>
    </a>

</div>
    </div>

</div>

<script src="/fesac_platform/assets/js/script.js"></script>

</body>
</html>