<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'base/head.html';?>
<body>
    <!-- header include -->
    <?php include 'base/header.html';?>
    <div class="wrapper">
        <section class="insert">
            <h3 class="content-title">Add New Student</h3>
            <form action="" method="post">
                <div class="input-field">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" placeholder="student" class="input-field" name="student-name">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-square-root-variable"></i>
                    <input type="number" placeholder="Math" class="input-field" name="math">
                </div>
                <div class="input-field">
                    <i class="fa-solid fw fa-laptop-code"></i>
                    <input type="number" placeholder="Computer Science" class="input-field" name="info">
                </div>
                <input class="submit" type="submit" value="submit">
            </form>
        </section>
        <section class="list-students">
            <h3 class="content-title">Students List</h3>
            <div class="students-wrapper">
                <div class="student-card">
                    <div class="student-info">
                        <div>
                            <span><i class="fa-regular fa-user"></i> Name:</span>
                            Youssef
                        </div>
                        <div>
                            <span><i class="fa-solid fa-square-root-variable"></i> Math:</span>
                            18.25
                        </div>
                        <div>
                            <span><i class="fa-solid fw fa-laptop-code"></i> Computer:</span>
                            13.51
                        </div>
                        <div>
                            <span><i class="fa-solid fa-check"></i> Grad:</span>
                            12.23
                        </div>
                    </div>
                    <div class="student-control">
                        <button class="crud delete">Delete <i class="fa-regular fa-trash-can"></i></button>
                        <button class="crud update">Update <i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                </div>
            </div>
            <button onclick="pushSide()" class="push-btn"><i class="fa-solid fa-chevron-right"></i></button>
        </section>
    </div>
</body>
<script src="js/master.js"></script>
</html>