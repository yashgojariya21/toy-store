<?php
session_start();
if (isset($_SESSION["uname"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Master Layout | Dashboard</title>

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
                                <h1 class="m-0">Categories</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="product.php">product</a></li>
                                    <li class="breadcrumb-item active">product Edit</li>
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
                                        <h3 class="card-title">product EDIT</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    include_once('include/config.php');
                                    $id = $_REQUEST['id'];
                                    $qry = "select * from products where id=$id";
                                    $result = mysqli_query($conn, $qry) or exit("product select fail" . mysqli_error($conn));
                                    $row = mysqli_fetch_array($result)
                                        ?>
                                    <form action="product_update_db.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">product Name</label>
                                                <input type="text" class="form-control" id="productname" name="productname"
                                                    placeholder="product Name" value="<?php echo $row['productname']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">product Description</label>
                                                <textarea name="productdescription" class="form-control"
                                                    id="productdescription"><?php echo $row['productdescription']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">product Price</label>
                                                <textarea name="productprice" class="form-control"
                                                    id="productprice"><?php echo $row['productprice']; ?></textarea>
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
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">OLD Image</label>
                                                <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                                                <img src="../images/products/<?php echo $row['image'] ?>" alt=""
                                                    width="200px">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">UPDATE</button>
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

    </body>

    </html>
    <?php
} else {
    $_SESSION["error"] = "you are not autorize to access this page without login";
    header('location:index.php');
}
?>