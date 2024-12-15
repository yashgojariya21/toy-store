<?php
$hostname = "localhost";
$username = "root";
$pass = "";
$database = "toy-store";

$conn = mysqli_connect($hostname, $username, $pass, $database) or exit("connection fail");
?>