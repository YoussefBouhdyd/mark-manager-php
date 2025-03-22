<?php
$id = $_GET['id'];
echo $id;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8","youssef","12341234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->exec("DELETE FROM students WHERE id=$id");
}catch(PDOException $error){
    die("Error:".$error->getMessage());
}
header("Location: dashboard.php");