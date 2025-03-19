<?php
// try {
//     $pdo = new PDO("mysql:host=localhost;dbname=mydb;charset=utf8",'youssef','12341234');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo "Connected <br>";
//     // $sql = "CREATE DATABASE IF NOT EXISTS mydb";
//     // $pdo->exec($sql);
//     // echo "database created successfully <br>";
//     // $sql = "CREATE USER 'youssef'@'localhost' IDENTIFIED BY '12341234'";
//     // $pdo->exec($sql);
//     // echo "user created successfully <br>";
//     // $sql = "GRANT ALL PRIVILEGES ON mydb.* TO 'youssef'@'localhost'";
//     // $pdo->exec($sql);
//     // $pdo->exec("FLUSH PRIVILEGES");
//     // echo "ALL DONE <br>";
//     // $sql = "CREATE TABLE personne(
//     // id int(11) unsigned NOT NULL auto_increment PRIMARY KEY,
//     // nom varchar(30) NOT NULL,
//     // email varchar(20) NOT NULL,
//     // timestamp varchar(11) NOT NULL
//     // )";
//     // $pdo->exec($sql);
//     // echo "Table created successfully <br>";
//     $student_name = $data["student-name"];
//     $math_note = $data["MATH"];
//     $info_note = $data["INFO"];
//     $sql = "INSERT INTO students name,math_note,info_note VALUES ($student_name,$math_note,$info_date)";
//     $pdo->exec($sql);
// }catch(PDOException $error){
//     die("Error: ".$e->getMessage());
// }

?>