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
                        <h3>About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- why section -->
    <section class="why_section layout_padding">
        <div class="container">

            <div class="container-fluid py-5">
                <div class="container py-2">
                    <div class="row align-items-center">
                        <div class="">
                            <div class="text-left mb-4">
                                <h1> Toy Store</h1>
                            </div>
                            <p>Welcome to Toy Store—your ultimate destination for high-quality, innovative, and fun toys
                                that inspire and entertain children of all ages. Our mission is to create joy, fuel
                                imaginations, and bring families closer together through a curated selection of engaging
                                toys and games.</p>
                            <p>At Toy Store, we believe that play is essential for child development, and every toy
                                should be both educational and entertaining. That's why our collection is carefully
                                chosen to ensure safe, enriching play experiences. From classic favorites to the latest
                                trends, our toys cover a wide range of categories, including STEM, creative play,
                                outdoor adventures, and more.</p>
                            <p>Whether you're looking for the perfect gift or a fun activity for family game night, Toy
                                Store offers a world of possibilities to spark joy and creativity. Join our community of
                                happy families and discover the of play today!</p>
                            <br>
                            <h3>Our Mission</h3>
                            <p>To provide high-quality toys that foster creativity, learning, and joy for children and
                                families everywhere.</p>
                            <p>Ready to explore the world of toys?</p>
                            <br>
                            <h4>Why Choose Toy Store?</h4>
                            <ul>
                                <li>Expert-Curated Selection: Carefully chosen toys that prioritize fun, safety, and
                                    education.</li>
                                <li>Wide Variety: From learning-based toys to imaginative playsets and outdoor games.
                                </li>
                                <li>Community-Focused: Bringing families together and creating joyful memories.</li>
                                <li>Explore our collection and let the of play begin!</li>
                            </ul>
                            <br>
                            <a href="product.php" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2"
                                style="color: white; background-color: #f7444e; border-color: #f7444e;">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end why section -->

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