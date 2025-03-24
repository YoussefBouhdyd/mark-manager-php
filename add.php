<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folderImg = 'images/';
    $fileExtension = "." . explode("/",mime_content_type($_FILES["student-image"]['tmp_name']))[1];
    $imgPath = $folderImg . uniqid() . $fileExtension;
    move_uploaded_file($_FILES["student-image"]["tmp_name"], $imgPath);
    $name = $_POST['student-name'];
    $math_note = $_POST['math'];
    $info_note = $_POST['info'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO students (name,math_note,info_note,profile_path) VALUES ('$name',$math_note,$info_note,'$imgPath')";
        $pdo->exec($sql);
    }catch (PDOException $error) {
        die("Error:". $error->getMessage());
    }
}
header("Location: dashboard.php");
?>