<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
$file_id = $_GET['file_id'];

/* CHECK IF ALREADY DOWNLOADED */
$check = "SELECT * FROM downloads 
          WHERE user_id='$user_id' AND file_id='$file_id'";
$res = mysqli_query($conn, $check);

if(mysqli_num_rows($res) == 0){
    /* SAVE DOWNLOAD */
    mysqli_query($conn, 
    "INSERT INTO downloads (user_id, file_id) 
     VALUES ('$user_id', '$file_id')");
}

/* GET FILE */
$query = "SELECT * FROM files WHERE id='$file_id'";
$result = mysqli_query($conn, $query);
$file = mysqli_fetch_assoc($result);

$file_path = "../uploads/" . $file['file_name'];

/* FORCE DOWNLOAD */
if(file_exists($file_path)){
    header("Content-Disposition: attachment; filename=" . basename($file_path));
    readfile($file_path);
    exit();
} else {
    echo "File not found";
}
?>