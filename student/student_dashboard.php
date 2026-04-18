<?php
session_start();

if($_SESSION['role'] != 'student'){
    header("Location: ../auth/login.php");
    exit();
}

?>

<h2>Student Dashboard</h2>
<p>Welcome Student</p>

<h3>🔔 Notifications</h3>
<div id="notifications"></div>

<?php
// Check if user is logged in
if(!isset($_SESSION['role'])){
    header("Location: ../auth/login.php");
    exit();
}


if($_SESSION['role'] != 'student'){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">

<div class="container">

    <div class="marquee">
    <div class="track">
        Welcome, Student 🎓 — Access your learning materials here!
    </div>
</div>

    <h2>Student Dashboard</h2>

    <div class="hex-container">

        <a href="view_course.php" class="hex">
            <div class="hex-content">
                📚
                <p>View Materials</p>
            </div>
        </a>

        <a href="../auth/logout.php" class="hex">
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

</body>
</html>