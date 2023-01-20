<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
   $id=$_SESSION["id"];
   $result=mysqli_query($conn,"select * from deneme_1.users where userId=$id");
   $row=mysqli_fetch_assoc($result);
}
if (isset($_POST['submit'])) {
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
if ($password==$cpassword) {
    $query="update deneme_1.users set password='$cpassword'where userId='$id' ";
    mysqli_query($conn,$query);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="css\studentPage.css">
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
    <?php
    
     $results=mysqli_query($conn,"select * from deneme_1.users where role='Student'");
     if (mysqli_num_rows($results) > 0) {
        while ($rows = mysqli_fetch_assoc($results)) {
    echo $rows['username'];
    echo"<br>";
    echo $rows['email'];
    echo"<br>";
    echo $rows['role'];
    echo"<br>";
    ?>

    <form action="delete_Student_continue.php" method="POST">             
                <input type="hidden" name="userId" value="<?php echo $rows['userId']?>">
                <button style="margin-bottom:10px">Delete Student</button>
</form>
<?php
        }
        }
        ?>
  </div>
</body>
</html>