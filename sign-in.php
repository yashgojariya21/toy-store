<?php
session_start();
if (isset($_SESSION["uname"])) {
    $_SESSION['error'] = "You are alredy login";
    header("location:index.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="sign-login.css" rel="stylesheet" />

</head>

<body>
    <div class="wrapper">
        <?php
        if (isset($_SESSION['error'])) {
            ?>
            <p class="login-box-msg text-danger"><?php echo $_SESSION['error']; ?></p>
            <?php
            unset($_SESSION['error']);
        }
        ?>
        <form action="sign-in-db.php" method="post">
            <h1>Sign-In</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="user" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <br>
            <div class="register-link">
                <p>Create an account <a href="sign-up.php">Sign-Up</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<?php
}
?>