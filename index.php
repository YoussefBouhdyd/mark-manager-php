<!DOCTYPE html>
<html lang="en">
<?php require "base/head.html" ?>
<body>
    <!-- Include the Header  -->
    <?php require "base/header.html" ?>
    <!-- Start Sign  -->
    <div class="sign">
        <div class="container">
            <div class="sign-box">
                <h2 class="title">Welcome to the Results Platform</h2>
                <?php
                    if (!empty($flashMessage)) {
                        echo $flashMessage;
                    }
                    ?>
                <form action="index.php" method="post">
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="username" name="username" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="password" name="password" required>
                    </div>
                    <button type="submit" class="submit">Sign In</button>
                </form>
                <a href="#" class="forget">You forget your password ?</a>
            </div>
        </div>
    </div>
    <!-- End Sign  -->
</body>
</html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $file = fopen("users.csv", "r");
    while (($line = fgetcsv($file, 100, ",")) !== false) {
        if ($line[0] === $userName && $line[1] === $password) {
            $_SESSION['login'] = $userName;
            fclose($file);
            header('Location: dashboard.php');
            break;
        }
    }
    fclose($file);
    $flashMessage = "<p style='margin-bottom:10px;color: var(--red-color);'> incorrect username or password !</p>";
}
?>
