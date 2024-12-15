<?php
session_start();
if (isset($_SESSION["uname"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Site Settings | Dashboard</title>

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
                                <h1 class="m-0">Site Setting</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                    <li class="breadcrumb-item active">Site Settings</li>

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
                                        <h3 class="card-title">SITE SETTINGS</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <?php
                                    include_once('include/config.php');
                                    $qry = "select * from sitesettings order by id desc";
                                    $result = mysqli_query($conn, $qry) or exit("setting select fail" . mysqli_error($conn));
                                    $row = mysqli_fetch_array($result);
                                    ?>


                                    <form action="settings_add_db.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Site Name</label>
                                                <input type="text" class="form-control" id="sitename" name="sitename"
                                                    placeholder="Enter Site Name"
                                                    value="<?php echo isset($row['sitename']) ? $row['sitename'] : ""; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <textarea name="address" class="form-control"
                                                    id="address"><?php echo isset($row['address']) ? $row['address'] : ""; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone No</label>
                                                <input type="text" class="form-control" id="phoneno" name="phoneno"
                                                    placeholder="Enter Phone No"
                                                    value="<?php echo isset($row['phoneno']) ? $row['phoneno'] : ""; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Enter Email Address"
                                                    value="<?php echo isset($row['email']) ? $row['email'] : ""; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Select Logo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                                            name="image">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <?php
                                            if (isset($row['image'])) {
                                                ?>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">OLD Image</label>
                                                    <input type="hidden" name="oldimage" value="<?php echo $row['image'] ?>">
                                                    <img src="../images/logo/<?php echo $row['image'] ?>" alt="" width="200px">
                                                </div>
                                                <?php
                                            }
                                            ?>


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

    </body>

    </html>
    <?php
} else {
    $_SESSION["error"] = "you are not autorize to access this page without login";
    header('location:index.php');
}
?>