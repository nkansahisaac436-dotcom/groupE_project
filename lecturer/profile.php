<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

    <a href="lecturer_dashboard.php" style="text-decoration:none;">
        ⬅ Back
    </a>

    <div class="card" style="max-width:400px; margin:30px auto; text-align:center;">

        <h2>👤 My Profile</h2>

        <!-- PROFILE IMAGE -->
        <?php
$image = !empty($user['profile_pic']) 
    ? "../uploads/profile/".$user['profile_pic'] 
    : "../assets/images/default.png";
?>

<img src="<?php echo $image; ?>" 
style="width:120px; height:120px; border-radius:50%; object-fit:cover;">
        

        <p><b>Email:</b> <?php echo $user['email']; ?></p>
        <p><b>Role:</b> <?php echo ucfirst($user['role']); ?></p>

        <br>

        <!-- UPLOAD IMAGE -->
        <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_pic" required>
            <button type="submit">Upload Picture</button>
        </form>

    </div>

</div>

</body>
</html>