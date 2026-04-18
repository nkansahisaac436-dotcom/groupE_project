<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Material</title>
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>

<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">

    <div class="upload-card">

        <h2>📤 Upload Course Material</h2>

       <form action="upload_process.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>

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
                  <p style="margin-top:10px;">
    <a href="create_course.php">➕ Create New Course</a>
</p>
    </div>


    <div class="form-group">
        <label>Select File</label>
        <input type="file" name="file" required>
    </div>

    <button type="submit">Upload Material</button>

</form>

    </div>

</div>
<script src="/fesac_platform/assets/js/script.js"></script>
</body>
</html>