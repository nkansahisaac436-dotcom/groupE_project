<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$level_id = $_POST['level_id'];
$semester_id = $_POST['semester_id'];
$course_id = $_POST['course_id'];

$file_name = $_FILES['file']['name'];
$temp_name = $_FILES['file']['tmp_name'];

$message = "New material uploaded: " . $title;

mysqli_query($conn, 
"INSERT INTO notifications (message, user_role) 
 VALUES ('$message', 'student')");
 
move_uploaded_file($temp_name, "../uploads/" . $file_name);

$query = "INSERT INTO files (title, file_name, level_id, semester_id, course_id, uploaded_by)
VALUES ('$title', '$file_name', '$level_id', '$semester_id', '$course_id', '$user_id')";

if(mysqli_query($conn, $query)){
    header("Location: upload.php?success=1");
} else {
    echo "Upload failed!";
}
?>