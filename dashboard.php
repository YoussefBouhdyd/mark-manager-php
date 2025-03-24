<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fssm;charset=utf8","root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $records = $pdo->query("SELECT id,name,math_note,info_note,profile_path FROM students")->fetchAll(PDO::FETCH_OBJ);
}catch (PDOException $error) {
    die("Error:".$error->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'base/head.html';?>
<body>
    <!-- header include -->
    <?php include 'base/header.html';?>
    <div class="full-page">
        <div class="container">
            <div class="wrapper">
                <section class="insert">
                    <h3 class="content-title">Add New Student</h3>
                    <form action="add.php" method="post" enctype="multipart/form-data">
                        <div class="input-field">
                            <i class="fa-regular fa-user"></i>
                            <input type="text" placeholder="student" class="input-field" name="student-name" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fw fa-square-root-variable"></i>
                            <input type="number" placeholder="Math" class="input-field" name="math" max=20 min=0 step=".25" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fw fa-laptop-code"></i>
                            <input type="number" placeholder="Computer Science" class="input-field" name="info" max=20 min=0 step=".25" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-regular fa-address-card"></i>
                            <input type="file" class="input-field" name="student-image" required>
                        </div>
                        <input class="submit" type="submit" value="submit">
                    </form>
                </section>
                <section class="list-students">
                    <h3 class="content-title">Students List</h3>
                    <div class="students-wrapper">
                        <?php
                            if (!$records) :
                                echo "<p class='no-record'>There aren't any students yet \_('_')_/</p>"; 
                            else:
                            foreach ($records as $record):
                        ?>
                            <div class="student-card">
                                <div class="student-info">
                                    <div>
                                        <span><i class="fa-regular fa-address-card"></i> Profile:</span>
                                        <img class="student-profile" src=<?=$record->profile_path;?>>
                                    </div>
                                    <div>
                                        <span><i class="fa-regular fa-user"></i> Name:</span>
                                        <?=$record->name;?>
                                    </div>
                                    <div>
                                        <span><i class="fa-solid fa-square-root-variable"></i> Math:</span>
                                        <?=(float)$record->math_note?>
                                    </div>
                                    <div>
                                        <span><i class="fa-solid fw fa-laptop-code"></i> Computer:</span>
                                        <?=(float)$record->info_note?>
                                    </div>
                                    <div>
                                        <span>
                                            <?php if (($record->math_note+$record->info_note)/2 >= 10) echo "<i class='fa-solid fa-check' style='color:var(--green-color);'></i>";
                                            else echo "<i class='fa-solid fa-xmark' style='color:var(--red-color);'></i>";
                                            ?>Grad:</span>
                                        <?=round(($record->math_note+$record->info_note )/2 ,2)?>
                                    </div>
                                </div>
                                <div class="student-control">
                                    <a class="crud delete" href=<?="delete.php?id=$record->id"?>>Delete <i class="fa-regular fa-trash-can"></i></a>
                                    <a class="crud update" data-id=<?=$record->id?>>Update <i class="fa-regular fa-pen-to-square"></i></a>
                                    <a class="crud print" href=<?="print.php?name=$record->name&math=$record->math_note&info=$record->info_note"?>>Print <i class="fa-solid fa-print"></i></a>
                                </div>
                            </div>
                        <?php 
                            endforeach;
                            endif;
                        ?>
                    </div>
                    <button onclick="pushSide()" class="push-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </section>
            </div>
        </div>
        <div class="update-form">
            <h3 class="content-title">Update</h3>
            <form method="post" action="update.php">
                <div>
                    <div class="input-field">
                        <i class="fa-regular fa-user"></i>
                        <input type="text" placeholder="student" class="input-field" name="name-update" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-key"></i>
                        <input type="number" placeholder="id" class="input-field" name="id" required readonly>
                    </div>
                </div>
                <div>
                    <div class="input-field">
                        <i class="fa-solid fa-square-root-variable"></i>
                        <input type="number" placeholder="math" class="input-field" name="math-update" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fw fa-laptop-code"></i>
                        <input type="number" placeholder="computer science" class="input-field" name="info-update" required>
                    </div>
                </div>
                <input type="submit" value="submit" class="submit">
            </form>
            <button id="out-update"><i class="fa fa-x"></i></button>
        </div>
        <div class="profile">
            <div class="options">
                <a class="log-out" href="logOut.php">log out <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
            <div class="avatar"><i class="fa-regular fa-circle-user"></i> Youssef</div>
        </div>
    </div>
</body>
<script src="js/master.js"></script>
</html>