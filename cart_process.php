<?php
session_start();
if (isset($_SESSION["uid"])) {
    include_once("include/config.php");
    $userid = $_SESSION['uid'];
    $productid = $_REQUEST['productid'];
    $qry = "insert into cart (userid, productid) values ('$userid', '$productid')";
    mysqli_query($conn, $qry) or exit("Cart data insert failed: " . mysqli_error($conn));
    $_SESSION['error'] = "product added to cart successfully.";

    header("location:cart.php");
} else {
    $_SESSION['error'] = "Please login first.";
    header("location:sign-up.php");
}
