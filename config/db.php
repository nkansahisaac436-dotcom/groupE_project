<?php

$conn = mysqli_connect("localhost:3307", "root", "", "fesac_platform");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>