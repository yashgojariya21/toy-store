<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once("include/config.php");
    extract($_POST);
    $productdescription = mysqli_real_escape_string($conn, $productdescription);
    if ($_FILES['image']['error'] == 0) {
        $filename = time() . "_" . $_FILES['image']['name'];
        $path = "../images/products/" . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
            $qry = "update products set productname='" . $productname . "',productdescription='" . $productdescription . "',productprice = '" . $productprice . "',image='" . $filename . "' where id=$id";
            mysqli_query($conn, $qry) or exit("product update fail" . mysqli_error($conn));
            $_SESSION['error'] = "product Update successfuly";
            header("location:products.php");
        } else {
            $_SESSION['error'] = "image upload fail";
            header("location:product_add.php");
        }
    } else {
        $qry = "update products set productname='" . $productname . "',productdescription='" . $productdescription . "',productprice = '" . $productprice . "' where id=$id";
        mysqli_query($conn, $qry) or exit("product update fail" . mysqli_error($conn));
        $_SESSION['error'] = "product added successfuly";
        header("location:products.php");
    }
} else {
    $_SESSION['error'] = "You are not authorize to access this page without login";
    header("location:index.php");
}
?>