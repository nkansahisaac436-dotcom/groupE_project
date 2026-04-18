<?php
session_start();
include("../config/db.php");

if($_SESSION['role'] != 'lecturer'){
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Get file name first
    $query = "SELECT * FROM files WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $file = mysqli_fetch_assoc($result);

    $file_path = "../uploads/" . $file['file_name'];

    // Delete file from folder
    if(file_exists($file_path)){
        unlink($file_path);
    }

    // Delete from database
    mysqli_query($conn, "DELETE FROM files WHERE id='$id'");

    header("Location: ../lecturer/manage_files.php");
    exit();
}
?>