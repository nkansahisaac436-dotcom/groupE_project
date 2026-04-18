<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$query = "DELETE FROM files WHERE id='$id'";

if(mysqli_query($conn, $query)){
    header("Location: manage_files.php?deleted=1");
} else {
    echo "Delete failed!";
}
?>