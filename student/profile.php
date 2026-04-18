<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='$user_id'";
$user = mysqli_fetch_assoc(mysqli_query($conn, $query));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

<a href="student_dashboard.php">⬅ Back</a>

<h2>👤 My Profile</h2>

<p><b>Email:</b> <?php echo $user['email']; ?></p>

<h3>⬇ Download History</h3>

<?php
$history = "SELECT files.title, files.file_name, downloads.downloaded_at 
            FROM downloads
            JOIN files ON downloads.file_id = files.id
            WHERE downloads.user_id='$user_id'
            ORDER BY downloads.downloaded_at DESC";

$res = mysqli_query($conn, $history);

if(mysqli_num_rows($res) > 0){

    echo "<ul>";

    while($row = mysqli_fetch_assoc($res)){
        echo "<li>
                📄 {$row['title']} 
                <br><small>{$row['downloaded_at']}</small>
                <br>
                <a href='../uploads/{$row['file_name']}' download>
                    <button>Download Again</button>
                </a>
              </li>";
    }

    echo "</ul>";

} else {
    echo "<p>No downloads yet</p>";
}
?>

</div>

</body>
</html>