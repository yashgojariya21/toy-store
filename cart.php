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
            <h3>Cart</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end inner page section -->
  <!-- why section -->
  <section class="h-100 h-custom" style="background-color: white;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-7">
                  <h5 class="mb-3">
                    <a href="product.php" class="text-body" style="text-decoration: none;">
                      <i class="fas fa-long-arrow-alt-left mr-2"></i> Continue shopping
                    </a>
                  </h5>
                  <hr>

                  <?php
                  $userid = $_SESSION['uid'];
                  $cartqry = "SELECT * FROM cart WHERE userid='$userid'";
                  $cartresult = mysqli_query($conn, $cartqry) or exit("Cart select fail: " . mysqli_error($conn));
                  $count = mysqli_num_rows($cartresult);

                  $subtotal = 0;  // Initialize subtotal
                  
                  while ($cartrow = mysqli_fetch_array($cartresult)) {
                    $productqry = "SELECT * FROM products WHERE id='" . $cartrow['productid'] . "'";
                    $productresult = mysqli_query($conn, $productqry) or exit("Product select fail: " . mysqli_error($conn));
                    $productrow = mysqli_fetch_array($productresult);

                    $subtotal += $productrow['productprice'];
                    ?>
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="images/products/<?php echo $productrow['image']; ?>" class="img-fluid rounded-3"
                                alt="Shopping item" style="width: 90px; border-radius: 3px; margin-right: 15px;">
                            </div>
                            <div class="ms-3">
                              <h6><?php echo $productrow['productname']; ?></h6>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 80px;">
                              <h5 class="mb-0"><i
                                  class="fas fa-rupee-sign mr-1"></i><?php echo $productrow['productprice']; ?></h5>
                            </div>
                            <a href="cart_delete.php?productid=<?php echo $productrow['id']; ?>" style="color: black;"><i
                                class="fas fa-trash-alt ml-2"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }

                  $tax = $subtotal * 0.18;
                  $total = $subtotal + $tax;
                  ?>
                </div>
                <div class="col-lg-5">
                  <div class="card text-white rounded-3" style="background-color: #ededed;">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0" style="color: gray;">Card details</h5>
                      </div>

                      <p class="small mb-2" style="color:gray">Card type</p>
                      <img src="images/payment-method-c454fb.svg" alt="">



                      <form class="mt-4" onsubmit="return validateCheckout();" action="checkout_process.php"
                        method="POST">
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" size="17"
                            placeholder="Cardholder's Name" required style="font-size: 14px;" />
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                          <input type="text" id="typeText" class="form-control form-control-lg" size="17"
                            placeholder="1234 5678 9012 3457" minlength="16" maxlength="16" required
                            style="font-size: 14px;" />
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div data-mdb-input-init class="form-outline form-white">
                              <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY"
                                size="7" minlength="7" maxlength="7" required style="font-size: 14px;" />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div data-mdb-input-init class="form-outline form-white">
                              <input type="text" id="typeCvv" class="form-control form-control-lg" placeholder="***"
                                minlength="3" maxlength="3" required style="font-size: 14px;" />
                            </div>
                          </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="mb-0" style="color: gray;">Address</h5>
                        </div>

                        <!-- New Address and Phone Number Fields -->

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                          <input type="text" id="address" name="address" class="form-control form-control-lg" size="17"
                            placeholder="Shipping Address" required style="font-size: 14px;" />
                        </div>

                        <div data-mdb-input-init class="form-outline form-white mb-4">
                          <input type="text" id="phone" name="phone" class="form-control form-control-lg" size="17"
                            placeholder="Phone Number" minlength="10" maxlength="15" required
                            style="font-size: 14px;" />
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between" style="color: gray;">
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2">₹<?php echo number_format($subtotal, 2); ?></p>
                        </div>

                        <div class="d-flex justify-content-between" style="color: gray;">
                          <p class="mb-2">GST (18%)</p>
                          <p class="mb-2">₹<?php echo number_format($tax, 2); ?></p>
                        </div>

                        <div class="d-flex justify-content-between mb-4" style="color: gray;">
                          <p class="mb-2">Total</p>
                          <p class="mb-2">₹<?php echo number_format($total, 2); ?></p>
                        </div>

                        <button type="submit" class="btn btn-block btn-lg"
                          style="font-size: 18px; color: white; background-color: #f7444e;">
                          <div class="d-flex justify-content-between">
                            <span>Pay</span>
                            <span>₹ <?php echo number_format($total, 2); ?></span>
                          </div>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end why section -->

  <!-- footer section -->
  <?php
  include_once("include/footer.php");
  ?>
  <!-- end footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>