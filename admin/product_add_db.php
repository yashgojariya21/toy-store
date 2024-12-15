<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once("include/config.php");
    extract($_POST);
    $filename = time() . "_" . $_FILES['image']['name'];
    $path = "../images/products/" . $filename;
    $productdescription = mysqli_real_escape_string($conn, $productdescription);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        $qry = "insert into products (catid,subcatid,productname,productdescription,productprice,image) 
                                    values('" . $catid . "','" . $subcatid . "','" . $productname . "','" . $productdescription . "','" . $productprice . "','" . $filename . "')";
        mysqli_query($conn, $qry) or exit("Product insert fail" . mysqli_error($conn));
        $_SESSION['error'] = "Product added successfuly";
        header("location:products.php");
    } else {
        $_SESSION['error'] = "image upload fail";
        header("location:Product_add.php");
    }
} else {
    $_SESSION['error'] = "You are not authorize to access this page without login";
    header("location:index.php");
}
?>