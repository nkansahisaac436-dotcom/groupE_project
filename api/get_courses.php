<?php
include("../config/db.php");

$level_id = $_GET['level_id'];
$semester_id = $_GET['semester_id'];

$query = "SELECT * FROM courses 
          WHERE level_id='$level_id' 
          AND semester_id='$semester_id'";

$result = mysqli_query($conn, $query);

$data = [];

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>