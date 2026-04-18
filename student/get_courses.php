<?php
include("../config/db.php");

$level_id = $_GET['level_id'];
$semester_id = $_GET['semester_id'];

$query = "SELECT * FROM courses 
WHERE level_id='$level_id' AND semester_id='$semester_id'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    echo "<option value=''>Select Course</option>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<option value='{$row['id']}'>{$row['course_name']}</option>";
    }
} else {
    echo "<option>No courses available</option>";
}
?>