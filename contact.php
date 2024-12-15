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
                        <h3>Contact us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- why section -->
    <section class="why_section layout_padding">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="full">
                        <form action="contact_db.php" method="post">
                            <fieldset>
                                <input type="text" placeholder="Enter your full name" name="name" id="name" required />
                                <input type="email" placeholder="Enter your email address" name="email" id="email"
                                    required />
                                <input type="text" placeholder="Enter subject" name="subject" id="subject" required />
                                <textarea placeholder="Enter your message" name="description" id="description"
                                    required></textarea>
                                <input type="submit" value="Submit">
                            </fieldset>

                        </form>
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