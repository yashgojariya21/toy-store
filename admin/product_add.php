<?php
session_start();
if (isset($_SESSION["uname"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>add Products | Dashboard</title>

        <?php
        include_once('include/style.php');
        ?>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>

            <!-- Navbar -->
            <?php
            include_once('include/header.php');
            ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php
            include_once('include/sidebar.php');
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Products</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="products.php">Products </a></li>
                                    <li class="breadcrumb-item active">Products Add</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">PRODUCT ADD</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->


                                    <?php
                                    include_once('include/config.php');
                                    $qry = "select * from categories order by id desc";
                                    $result = mysqli_query($conn, $qry) or exit("category select fail" . mysqli_error($conn));
                                    ?>


                                    <form action="product_add_db.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" id="productname" name="productname"
                                                    placeholder="Products Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Description</label>
                                                <textarea name="productdescription" class="form-control"
                                                    id="productdescription"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product price</label>
                                                <input type="text" class="form-control" id="productprice"
                                                    name="productprice" placeholder="Product price">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Select Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                                            name="image">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!-- /.row -->

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php
            include_once('include/footer.php');
            ?>

        </div>
        <!-- ./wrapper -->
        <?php
        include_once('include/script.php');
        ?>
        <script>
            $(document).ready(function () {
                $("#catid").change(function () {
                    var catid = $(this).val();
                    $.ajax({
                        url: "getsubcat.php",
                        type: "GET",
                        cache: false,
                        data: {
                            "id": catid
                        },
                        success: function (result) {
                            $("#subcatid").html(result);
                        }
                    });
                });
            });
        </script>

    </body>

    </html>
    <?php
} else {
    $_SESSION["error"] = "you are not autorize to access this page without login";
    header('location:index.php');
}
?>