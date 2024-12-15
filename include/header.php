<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.php">
                <?php
                if (isset($settingrow['image']) && $settingrow['image'] != null) {
                    ?>
                    <img width="150px" src="images/logo/<?php echo $settingrow['image']; ?>" alt="" />
                    <?php
                } else {
                    ?>
                    <h1><?php echo $settingrow['sitename']; ?> </h1>
                    <?php
                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                $currentPage = basename($_SERVER['PHP_SELF']); // Gets the current script name
                ?>
                <ul class="navbar-nav">

                    <li class="nav-item <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?php echo ($currentPage == 'product.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="product.php">Products</a>
                    </li>
                    <li class="nav-item <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item <?php echo ($currentPage == 'sign-up.php') ? 'active' : ''; ?>">
                        <a href="javascript:void(0)" class="user-icon" id="user-icon">
                            <i class="fa-solid fa-user nav-link"></i>
                        </a>
                        <div class="dropdown-menu" id="dropdown-menu">
                            <div class="drop-down2">
                                <?php
                                session_start(); // Ensure session is started
                                if (isset($_SESSION['uname'])) {
                                    echo $_SESSION['uname'];
                                } else {
                                    echo "Welcome, Guest";
                                }
                                ?>
                            </div>

                            <div class="drop-down2"><a href="sign-in.php">Sign-In</a></div>
                            <div class="drop-down2"><a href="logout.php">Logout</a></div>
                        </div>


                    </li>
                    <li class="nav-item <?php echo ($currentPage == 'sign-up.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="../TOY_STORE/cart.php">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                                style="enable-background: new 0 0 456.029 456.029" xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</header>


<script>
    document.getElementById("user-icon").addEventListener("click", function () {
        const dropdown = document.getElementById("dropdown-menu");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    window.addEventListener("click", function (e) {
        if (!document.getElementById("user-icon").contains(e.target)) {
            document.getElementById("dropdown-menu").style.display = "none";
        }
    });
</script>