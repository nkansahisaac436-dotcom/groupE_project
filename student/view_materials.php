<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
$course_id = $_GET['course_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Materials</title>
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">
    <h2>📄 Available Materials</h2>

<?php
$query = "SELECT * FROM files WHERE course_id='$course_id'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    echo "<div class='file-grid'>";

    while($row = mysqli_fetch_assoc($result)){

        // CHECK IF DOWNLOADED
        $check = "SELECT * FROM downloads 
                  WHERE user_id='$user_id' 
                  AND file_id='{$row['id']}'";
        $res = mysqli_query($conn, $check);

        $button_text = (mysqli_num_rows($res) > 0) ? "✔ Downloaded" : "Download";

        echo "
        <div class='file-card'>
            <p>📄 {$row['title']}</p>

            <a href='download.php?file_id={$row['id']}'>
                <button>$button_text</button>
            </a>
        </div>
        ";
    }

    echo "</div>";
} else {
    echo "<p>No materials available for this course.</p>";
}
?>

</div>

</body>
</html>