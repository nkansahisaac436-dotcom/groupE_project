<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Files</title>
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>

<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">

    <h2>📂 Manage Uploaded Materials</h2>

    <!-- SUCCESS MESSAGE -->
    <?php
    if(isset($_GET['deleted'])){
        echo "<p style='color:green; font-weight:bold;'>Material deleted successfully!</p>";
    }
    ?>

    <!-- FILTER + SEARCH FORM -->
    <div class="upload-card">
        <form method="GET">

            <div class="form-group">
                <label>Level</label>
                <select name="level_id" id="level" required>
                    <option value="">Select Level</option>
                    <option value="1">Level 100</option>
                    <option value="2">Level 200</option>
                    <option value="3">Level 300</option>
                    <option value="4">Level 400</option>
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semester_id" id="semester" required>
                    <option value="">Select Semester</option>
                    <option value="1">First Semester</option>
                    <option value="2">Second Semester</option>
                </select>
            </div>

            <div class="form-group">
                <label>Course</label>
                <select name="course_id" id="course" required>
                    <option value="">Select Course</option>
                </select>
            </div>

            <div class="form-group">
                <label>Search</label>
                <input type="text" name="search" placeholder="🔍 Search materials...">
            </div>

            <button type="submit">Load Materials</button>

        </form>
    </div>

    <!-- DISPLAY FILES -->
    <?php

    if(isset($_GET['course_id'])){

        $course_id = $_GET['course_id'];
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $query = "SELECT * FROM files 
        WHERE uploaded_by='$user_id' 
        AND course_id='$course_id'
        AND title LIKE '%$search%'";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){

            echo "<div class='file-grid'>";

            while($row = mysqli_fetch_assoc($result)){
                echo "
                <div class='file-card'>
                    <p>📄 {$row['title']}</p>

                    <a href='delete.php?id={$row['id']}'
                    onclick=\"return confirm('Are you sure you want to delete this material?')\">
                        <button style='background:red;'>Delete</button>
                    </a>

                </div>
                ";
            }

            echo "</div>";

        } else {
            echo "<p>No materials found.</p>";
        }
    }

    ?>

</div>

<script src="/fesac_platform/assets/js/script.js"></script>

</body>
</html>