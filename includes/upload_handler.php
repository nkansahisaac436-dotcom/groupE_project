<?php
session_start();
include("../config/db.php");

if(isset($_POST['upload'])){

    $title = $_POST['title'];
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    $level_id = $_POST['level_id'];
$semester_id = $_POST['semester_id'];

    $allowed = ['pdf', 'docx'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if(in_array($ext, $allowed)){

        $new_name = time() . "_" . $file;
        move_uploaded_file($tmp, "../uploads/" . $new_name);

        $user_id = $_SESSION['user_id'];

  $query = "INSERT INTO files (title, file_name, uploaded_by, level_id, semester_id)
          VALUES ('$title', '$new_name', '$user_id', '$level_id', '$semester_id')";

        mysqli_query($conn, $query);

        echo "File uploaded successfully!";

    } else {
        echo "Only PDF and DOCX files allowed!";
    }
}
?>