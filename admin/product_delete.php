<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once("include/config.php");
    $id = $_REQUEST['id'];
    $qry = "delete from products where id = $id";
    mysqli_query($conn, $qry) or exit("delete fail" . mysqli_error($conn));
    $_SESSION['error'] = "products deleted successfuly";
    header("location:products.php");
} else {
    $_SESSION['error'] = "You are not authorize to access this page without login";
    header("location:index.php");
}
?>