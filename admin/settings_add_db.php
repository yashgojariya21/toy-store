<?php
session_start();
if (isset($_SESSION["uname"])) {
    include_once("include/config.php");

    $selectsetting = "select * from sitesettings";
    $settingResult = mysqli_query($conn, $selectsetting) or exit("setting select fail" . mysqli_error($conn));
    $settingCount = mysqli_num_rows($settingResult);

    extract($_POST);
    $address = mysqli_real_escape_string($conn, $address);

    if ($_FILES['image']['error'] == 0) {
        $filename = time() . "_" . $_FILES['image']['name'];
        $path = "../images/logo/" . $filename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
            if ($settingCount > 0) {
                $qry = "update sitesettings set sitename = '" . $sitename . "', address = '" . $address . "', phoneno = '" . $phoneno . "', email = '" . $email . "', image = '" . $filename . "' where id=1";

            } else {
                $qry = "insert into sitesettings (sitename,address,phoneno,email,image) values('" . $sitename . "','" . $address . "','" . $phoneno . "','" . $email . "','" . $filename . "')";
            }
            mysqli_query($conn, $qry) or exit("setting search fail" . mysqli_error($conn));
            $_SESSION['error'] = "category added successfuly";
            header("location:settings.php");
        } else {
            $_SESSION['error'] = "image upload fail";
            header("location:settings.php");
        }
    } else {
        if ($settingCount > 0) {
            $qry = "update sitesettings set sitename = '" . $sitename . "', address = '" . $address . "', phoneno = '" . $phoneno . "', email = '" . $email . "' where id=1";

        } else {
            $qry = "insert into sitesettings (sitename,address,phoneno,email,image) values('" . $sitename . "','" . $address . "','" . $phoneno . "','" . $email . "')";
        }
        mysqli_query($conn, $qry) or exit("category insert fail" . mysqli_error($conn));
        $_SESSION['error'] = "category added successfuly";
        header("location:settings.php");
    }
} else {
    $_SESSION['error'] = "You are not authorize to access this page without login";
    header("location:index.php");
}
?>