<?php
session_start();
include_once("include/config.php");
extract($_POST);
$description = mysqli_real_escape_string($conn, $description);


$qry = "insert into contact (name,email,subject,description) values('" . $name . "','" . $email . "','" . $subject . "','" . $description . "')";
mysqli_query($conn, $qry) or exit("fail" . mysqli_error($conn));
$_SESSION['error'] = "successfuly";
header("location:contact.php");


?>