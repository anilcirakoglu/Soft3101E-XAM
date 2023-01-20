<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["PreinstructorId"])) {

    $result2 = mysqli_query($conn, "select * from deneme_1.preinstructor where PreinstructorId='$_POST[PreinstructorId]'");
    $row2 = mysqli_fetch_assoc($result2);
}
if (isset($_POST['save'])) {
    $username = $_POST['iname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $PreinstructorId = $_POST['PreinstructorId'];
    $query = "INSERT INTO deneme_1.users values('','$username','$password','$email','Instructor')";

    $query2 = "update preinstructor set is_added=1 where PreinstructorId='$PreinstructorId' ";

    $used=mysqli_query($conn,"Select * from users where username='$username' or email='$email'");

    if (mysqli_num_rows($used)>0) {
     echo"<script> alert('Username or email has already taken.');</script>";
    }else {
        mysqli_query($conn, $query);
        mysqli_query($conn, $query2);
       if ($query) {
        echo "Instructor saved.";
       }
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
        <span>Add Instructor.</span>
                <input value="Save" name="save" type="submit">
            <input type="hidden"  name="PreinstructorId"  value="<?php echo$row2['PreinstructorId']?>">
            <input type="hidden"  name="iname"  value="<?php echo$row2['iname']?>">
            <input type="hidden"  name="email"  value="<?php echo $row2['email']?>">
            <input type="hidden"  name="password"  value="<?php echo $row2['password']?>">
        </form>
    </div>
</body>

</html>