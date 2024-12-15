<?php
session_start();
include_once("include/config.php");
extract($_POST);
$qry = "select * from users where email='$email' && password='" . md5($password) . "'";
$result = mysqli_query($conn, $qry) or exit("Select is fail" . mysqli_error($conn));
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if ($count > 0) {
    $_SESSION["username"] = $row['username'];
    $_SESSION["userid"] = $row['id'];
    $_SESSION["email"] = $row['email'];
    header("location:index.php");
} else {
    $_SESSION["error"] = "Username or Password is incorrect";
    header("location:login.php");
}

?>