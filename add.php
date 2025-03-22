<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student-name'];
    $math_note = $_POST['math'];
    $info_note = $_POST['info'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset-utf8",'youssef','12341234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO students (name,math_note,info_note) VALUES ('$name',$math_note,$info_note)";
        $pdo->exec($sql);
    }catch (PDOException $error) {
        die("Error:". $error->getMessage());
    }
}
header("Location: dashboard.php");
?>