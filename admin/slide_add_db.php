<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once("include/config.php");
    extract($_POST);

    $description = mysqli_real_escape_string($conn, $description);


    $qry = "insert into slider (name,name2,description,button_link,alignment) 
                values('" . $name . "','" . $name2 . "','" . $description . "','" . $button_link . "','" . $alignment . "')";
    mysqli_query($conn, $qry) or exit("slide insert fail" . mysqli_error($conn));
    $_SESSION['error'] = "slide added successfuly";
    header("location:slider.php");

} else {
    $_SESSION['error'] = "You are not authorize to access this page without login";
    header("location:index.php");
}
?>