<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Materials</title>
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">

    <div class="upload-card">
        <h2>📚 View Course Materials</h2>

        <form action="view_materials.php" method="GET">

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

            <button type="submit">View Materials</button>

        </form>
    </div>

</div>

<script src="/fesac_platform/assets/js/script.js"></script>
</body>
</html>