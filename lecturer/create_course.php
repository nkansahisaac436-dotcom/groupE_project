<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
    <link rel="stylesheet" href="/fesac_platform/assets/css/style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="container">
    <div class="upload-card">

        <h2>➕ Create New Course</h2>

        <form action="save_course.php" method="POST">

            <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" required>
            </div>

            <div class="form-group">
                <label>Level</label>
                <select name="level_id" required>
                    <option value="">Select Level</option>
                    <option value="1">Level 100</option>
                    <option value="2">Level 200</option>
                    <option value="3">Level 300</option>
                    <option value="4">Level 400</option>
                </select>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semester_id" required>
                    <option value="">Select Semester</option>
                    <option value="1">First Semester</option>
                    <option value="2">Second Semester</option>
                </select>
            </div>

            <button type="submit">Create Course</button>
<?php
if(isset($_GET['success'])){
    echo "<p style='color:green; font-weight:bold;'>Course created successfully!</p>";
}
?>
        </form>

    </div>
</div>

</body>
</html>