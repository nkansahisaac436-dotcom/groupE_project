<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

if(isset($_FILES['profile_pic'])){

    $file_name = $_FILES['profile_pic']['name'];
    $tmp = $_FILES['profile_pic']['tmp_name'];

    $folder = "../uploads/profile/";

    if(!file_exists($folder)){
        mkdir($folder, 0777, true);
    }

    move_uploaded_file($tmp, $folder.$file_name);

    $query = "UPDATE users SET profile_pic='$file_name' WHERE id='$user_id'";
    mysqli_query($conn, $query);

    header("Location: profile.php");
}
?>