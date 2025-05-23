<?php
session_start();
if (isset($_SESSION['login'])) header("Location: dashboard.php");
try {
    $pdo = new PDO("mysql:host=localhost;charset=utf8","root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $result = $pdo->query("SHOW DATABASES LIKE 'fssm'");
    if ($result->rowCount() == 0) {
    $pdo->exec("CREATE DATABASE `fssm`");
    $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
    $pdo->exec("CREATE TABLE students (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name CHAR(30),
        math_note DECIMAL(4,2) DEFAULT 0,
        info_note DECIMAL(4,2) DEFAULT 0,
        profile_path VARCHAR(50)
    );");
    $pdo->exec("CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username CHAR(30),
        password VARCHAR(50)
    );");
    } 
}catch(PDOException $error) {
    die("Error:".$error->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $records = $pdo->query("SELECT username,password FROM users WHERE username = '$userName' AND password = '$password'")->fetchAll(PDO::FETCH_OBJ);
    }catch (PDOException $error) {
        die("Error:".$error->getMessage());
    }
    if (empty($records)) {
        $flashMessage = "<p style='margin-bottom:10px;color: var(--red-color);'> incorrect username or password !</p>";
    }
    else {
        $_SESSION['login'] = $userName;
        header("Location: dashboard.php");
    }
}
?>
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
                <a href="signUp.php" class="forget">You Don't Have An Account ?</a>
            </div>
        </div>
    </div>
    <!-- End Sign  -->
</body>
</html>