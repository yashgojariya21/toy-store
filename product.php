<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/logo.png" type="" />
    <title>Toys Store</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="sub_page">
    <?php
    include_once('include/config.php');
    $settingqry = "select * from sitesettings order by id desc";
    $settingresult = mysqli_query($conn, $settingqry) or exit("setting select fail" . mysqli_error($conn));
    $settingrow = mysqli_fetch_array($settingresult);
    ?>
    <div class="hero_area">
        <!-- header section strats -->
        <?php
        include_once("include/header.php");
        ?>


        <!-- end header section -->
    </div>
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Product Grid</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- product section -->
    <?php
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $productqry = "select * from products where id=$id";
        $productresult = mysqli_query($conn, $productqry) or exit("product select fail" . mysqli_error($conn));
        $productrow = mysqli_fetch_array($productresult);

        ?>


        <?php
    }
    ?>

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">

            </div>
            <div class="row">
                <?php
                if (isset($_REQUEST['catid'])) {
                    $id = $_REQUEST['catid'];
                    $productqry = "select * from products where catid=$id";
                } else {
                    $productqry = "select * from products";
                }

                $productqry = "select * from products order by id desc";
                $productresult = mysqli_query($conn, $productqry);
                while ($productrow = mysqli_fetch_array($productresult)) {
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">

                                    <a href="cart_process.php?productid=<?php echo $productrow['id']; ?>" class="option1">
                                        Add To Cart </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="images/products/<?php echo $productrow['image'] ?>" alt="" />
                            </div>
                            <div class="">
                                <h5><?php echo $productrow['productname'] ?></h5>
                                <p><?php echo $productrow['productdescription'] ?></p>
                                <h6>₹<?php echo $productrow['productprice'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>


        </div>
    </section>

    <!-- end product section -->
    <!-- footer section -->
    <?php
    include_once("include/footer2.php")
        ?>
    <!-- footer section -->
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>