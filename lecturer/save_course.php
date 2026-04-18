<?php
session_start();
include("../config/db.php");

$course_name = $_POST['course_name'];
$level_id = $_POST['level_id'];
$semester_id = $_POST['semester_id'];

$query = "INSERT INTO courses (course_name, level_id, semester_id)
VALUES ('$course_name', '$level_id', '$semester_id')";

header("Location: create_course.php?success=1");

if(mysqli_query($conn, $query)){
    header("Location: create_course.php?success=1");
} else {
    echo "Course creation failed!";
}
?>