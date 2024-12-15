<?php
session_start();

if (isset($_SESSION["uname"])) {
    include_once("include/config.php");

    $userid = $_SESSION['uid'];
    $address = $_POST['address']; // Getting address from the form
    $phone = $_POST['phone']; // Getting phone from the form

    $cartqry = "SELECT productid FROM cart WHERE userid='$userid'";
    $cartresult = mysqli_query($conn, $cartqry) or exit("Cart fetch fail: " . mysqli_error($conn));

    while ($cartrow = mysqli_fetch_array($cartresult)) {
        $productid = $cartrow['productid'];

        $orderqry = "INSERT INTO orders(userid,productid,address,phone) VALUES('" . $userid . "', '" . $productid . "', '" . $address . "', '" . $phone . "')";
        mysqli_query($conn, $orderqry) or exit("Order data insert fail: " . mysqli_error($conn));
    }

    $deleteQry = "DELETE FROM cart WHERE userid='$userid'";
    mysqli_query($conn, $deleteQry) or exit("Cart data delete fail: " . mysqli_error($conn));

    $_SESSION['success'] = "Product removed from cart and recorded in orders successfully.";
    header("location:thankyou.php");
} else {
    $_SESSION['error'] = "Please login first";
    header("location:sign-in.php");
}
?>