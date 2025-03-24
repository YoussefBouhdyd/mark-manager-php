<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (username,password) VALUES ('$userName','$password')";
        $pdo->exec($sql);
    }catch (PDOException $error) {
        die("Error:". $error->getMessage());
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require "base/head.html" ?>
<body>
    <!-- Include the Header  -->
    <?php require "base/header.html" ?>
    <!-- Start Sign Up  -->
    <div class="sign">
        <div class="container">
            <div class="sign-box">
                <h2 class="title">Sign Up</h2>
                <form action="signUp.php" method="post">
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="username" name="username" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="password" name="password" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="confirme" required>
                    </div>
                    <button type="submit" class="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Sign Up -->
</body>
</html>
