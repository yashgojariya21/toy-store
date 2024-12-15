<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="logo_footer">
                        <a href="index.php">
                            <?php
                            if (isset($settingrow['image']) && $settingrow['image'] != null) {
                                ?>
                                <img width="210" src="images/logo/<?php echo $settingrow['image']; ?>" alt="" />
                                <?php
                            } else {
                                ?>
                                <h1><?php echo $settingrow['sitename']; ?> </h1>
                                <?php
                            }
                            ?>

                        </a>
                    </div>
                    <div class="information_f">
                        <p>
                            <strong>ADDRESS:</strong> <?php echo $settingrow['address']; ?>
                        </p>
                        <p><strong>TELEPHONE:</strong> +91 <?php echo $settingrow['phoneno']; ?></p>
                        <p><strong>EMAIL:</strong> <?php echo $settingrow['email'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Quick Links..</h3>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="product.php">Product</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Account</h3>
                                    <ul>
                                        <li><a href="../TOY_STORE/sign-in.php">Login</a></li>
                                        <li><a href="../TOY_STORE/product.php">Shopping</a></li>
                                        <li><a href="../TOY_STORE/contact.php">Contact Us</a></li>
                                        <li><a href="../TOY_STORE/about.php">About US</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="widget_menu">
                            <h3>Newsletter</h3>
                            <div class="information_f">
                                <p>Subscribe by our newsletter and get update protidin.</p>
                            </div>
                            <div class="form_sub">
                                <form>
                                    <fieldset>
                                        <div class="field">
                                            <input type="email" placeholder="Enter Your Mail" name="email" />
                                            <input type="submit" value="Subscribe" />
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="cpy_">
    <p class="mx-auto">
        © 2024,
        <a href="https://html.design/"> toystore@gmail.com</a><br />

        <img src="images/payment-method-c454fb.svg" alt="">

    </p>
</div>