<?php
session_start();
include_once('include/config.php');
extract($_POST);
$qry = "select * from signup where user='$user' && pass='" . $pass . "'";
$result = mysqli_query($conn, $qry) or exit("select user fail" . mysqli_error($conn));
$row = mysqli_fetch_array($result);

$count = mysqli_num_rows($result);

if ($count > 0) {
    $_SESSION["uname"] = $user;
    $_SESSION["uid"] = $row['id'];
    header('location:index.php');
} else {
    $_SESSION["error"] = "Username or password is incorect";
    header("location:sign-in.php");
}
?>