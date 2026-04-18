<?php
include("../config/db.php");

$role = $_GET['role'];

$query = "SELECT * FROM notifications 
          WHERE user_role='$role' 
          ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>