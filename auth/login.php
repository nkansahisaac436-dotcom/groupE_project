<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - FESAC Platform</title>

    <!-- ✅ USE ONLY THIS -->
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>

<body class="login-body">

<div class="split-container">

    <!-- LEFT SIDE -->
    <div class="left-side">
        <img src="/fesac_platform/assets/image/logo.png" class="login-logo">
        <h2>Pentecost University</h2>
        <p>FESAC Department</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right-side">

        <div class="login-box">

            <h2>Welcome Back</h2>
            <p>Login to continue</p>

            <form action="../includes/formhandler.php" method="POST">

                <input type="email" name="email" placeholder="Enter Email" required>

                <input type="password" name="password" placeholder="Enter Password" required>

                <select name="role">
                    <option value="student">Student</option>
                    <option value="lecturer">Lecturer</option>
                </select>

                <button type="submit">Login</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>