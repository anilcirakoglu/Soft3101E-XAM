<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["userId"])) {

    $result2 = mysqli_query($conn, "select * from deneme_1.users where userId='$_POST[userId]'");
    $row2 = mysqli_fetch_assoc($result2);
}
if (isset($_POST['save'])) {
    $userId = $_POST['userId'];
    $query = "DELETE FROM users WHERE userId='$userId' ";
        mysqli_query($conn, $query);
       if ($query) {
        echo "Student deleted.";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\studentPage.css">
    <script src="main.js"></script>
</head>

<body>
<nav>
   <div class="first_container">
   <div class="menu">
   <a href="adminPage.php" target="_self">Logo</a>
        <a href="approve_preInstructors.php"target="_self">Approve Instructors</a>
        <a href="delete_ınstructor.php"target="_self">Delete Instructors</a>
        <a href="delete_student.php"target="_self">Delete Students</a>
        <a href="admin_delete_lessonOfInstructor.php"target="_self">Delete Instructor's Lesson </a>
        <a href="admin_delete_examOfInstructor.php"target="_self">Delete Instructor's Exam </a>
        <a href="admin_delete_lessonOStudent.php"target="_self">Delete Student's Lesson </a>
        <a href="admin_settings.php"target="_self">Settings</a>
        <a href="logout.php"target="_self">Logout</a>
   </div>
   </div>
</nav>
<div class="info">
        <form method="post" enctype="multipart/form-data" id="create_examForm">
        <span>Delete Student.</span>
                <input value="Yes" name="save" type="submit">
                <input type="hidden"  name="userId"  value="<?php echo $row2['userId']?>">
        </form>
    </div>
</body>

</html>