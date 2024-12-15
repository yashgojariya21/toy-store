<?php
session_start();
if (isset($_SESSION["uname"])) {
  include_once("include/config.php");
  $userid = $_SESSION['uid'];
  $productid = $_REQUEST['productid'];

  // Delete query to remove the course from the cart
  $qry = "delete from cart where userid='" . $userid . "' && productid='" . $productid . "'";
  mysqli_query($conn, $qry) or exit("Cart data delete fail: " . mysqli_error($conn));

  $_SESSION['error'] = "product removed from cart successfully";
  header("location:cart.php");
} else {
  $_SESSION['error'] = "Please login first";
  header("location:login.php");
}
?>