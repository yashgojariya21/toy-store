<?php
session_start();
if (isset($_SESSION["uname"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Toy Store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/fevicon.png" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <!-- style here -->
        <?php
        include_once("include/style.php")
            ?>
    </head>

    <body>
        <?php
        include_once("include/config.php");
        $settingqry = "select * from sitesettings";
        $settingresult = mysqli_query($conn, $settingqry) or exit("Settings select fail" . mysqli_error($conn));
        $settingrow = mysqli_fetch_array($settingresult)
            ?>

        <!-- header Start -->
        <?php
        include_once("include/header.php")
            ?>
        <!-- header End -->


        <!-- Team Start -->
        <div class="d-flex align-items-center justify-content-center " style="margin-top: 80px;">
            <div class="card shadow-lg p-5 text-center" style="max-width: 600px;">
                <h2 class=" mb-4" style="color: #f7444e;">Thank You for Your Purchase!</h2>
                <p class="lead mb-4">
                    We appreciate your purchase of the product from Toys Store. Product has been sent to your registered
                    address.
                </p>
                <a href="index.php" class="btn  btn-lg mt-4" style="background-color: #f7444e; color: white;">Return to
                    Home</a>
            </div>
        </div>
        <!-- Team End -->

        <!-- footer start -->
        <?php
        include_once("include/footer.php")
            ?>
        <!-- footer end -->

        <!-- js start -->
        <?php
        include_once("include/js.php")
            ?>
        <!-- js end -->

    </body>

    </html>
    <?php
} else {
    $_SESSION['error'] = "Please Login First";
    header("location:index.php");
}
?>