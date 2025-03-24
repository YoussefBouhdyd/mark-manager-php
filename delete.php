<?php
$id = $_GET['id'];
echo $id;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->exec("DELETE FROM students WHERE id=$id");
}catch(PDOException $error){
    die("Error:".$error->getMessage());
}
header("Location: dashboard.php");