<?php
session_start();
include_once("include/config.php");
extract($_POST);
$description = mysqli_real_escape_string($conn, $description);
$qry = "insert into signup (user,email,pass) values('" . $user . "','" . $email . "','" . $pass . "')";
mysqli_query($conn, $qry) or exit("fail" . mysqli_error($conn));
$_SESSION['error'] = "successfuly";
header("location:sign-in.php");
?>