<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST["name-update"];
    $new_math_note = $_POST["math-update"];
    $new_info_note = $_POST["info-update"];
    $id = $_POST["id"];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8","youssef","12341234");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->exec("UPDATE students SET math_note=$new_math_note,info_note=$new_info_note,name='$new_name' WHERE id=$id");
    }catch(PDOException $error) {
        die("Error:".$error->getMessage());
    }
    header("Location: dashboard.php");
}