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
                                <h1 class="m-0">Add Slider</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
                                    <li class="breadcrumb-item active">Add Slider</li>

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
                                        <h3 class="card-title">ADD SLIDE</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <form action="slide_add_db.php" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title1</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title2</label>
                                                <input type="text" class="form-control" id="name2" name="name2"
                                                    placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="description" class="form-control"
                                                    id="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Button Link</label>
                                                <input type="text" class="form-control" id="button_link" name="button_link"
                                                    placeholder="Enter Button Link">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alignment</label>
                                                <select name="alignment" id="alignment" class="form-control">
                                                    <option value="carousel-item">default</option>

                                                </select>
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

    </body>

    </html>
    <?php
} else {
    $_SESSION["error"] = "you are not autorize to access this page without login";
    header('location:index.php');
}
?>