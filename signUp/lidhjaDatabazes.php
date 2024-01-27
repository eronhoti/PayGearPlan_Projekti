<?php

$servername = "localhost";
$connUsername = "root";
$connPassword = "";
$dbname = "paygearplandb";

$conn = mysqli_connect($servername, $connUsername, $connPassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>