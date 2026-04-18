<?php
session_start();
include("../config/db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM users WHERE email='$email' AND role='$role'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if($role == 'lecturer'){
                header("Location: ../lecturer/lecturer_dashboard.php");
            } else {
                header("Location: ../student/student_dashboard.php");
            }
            exit();

        } else {
            echo "Incorrect password";
        }

    } else {
        echo "User not found";
    }
}
?>