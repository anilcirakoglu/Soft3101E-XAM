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
    <title>Document</title>
</head>
<body>
<div class="top">
    <ul>
        <li><a href="" target="_self">Logo</a></li>
        <li><a href="approve_preInstructors.php"target="_self">Approve Instructors</a></li>
        <li><a href="delete_ınstructor.php"target="_self">Delete Instructors</a></li>
        <li><a href="delete_student.php"target="_self">Delete Students</a></li>
        <li><a href="delete_Student_lesson.php"target="_self">Delete Instructor's Lesson </a></li>
        <li><a href="delete_Instructor_exam.php"target="_self">Delete Instructor's Exam </a></li>
        <li><a href="instructor_settings.php"target="_self">Delete Student's Lesson </a></li>
        <li><a href="admin_settings.php"target="_self">Settings</a></li>
        <li><a href="logout.php"target="_self">Logout</a></li>
    </ul>
   </div>
  <div class="mid">
    <?php
    
     $results=mysqli_query($conn,"");
     if (mysqli_num_rows($results) > 0) {
        while ($rows = mysqli_fetch_assoc($results)) {
    echo $rows['courseName'];
    echo"<br>";
    echo $rows['username'];
    echo"<br>";
    ?>

<form action="del_lesson_seeReason_Instructor.php" method="POST">             
                <input type="hidden" name="examID" value="<?php echo $rows['examID']?>">
                <button>See Reason/Delete Exam</button>
</form>
<?php
        }
        }
        ?>
  </div>
</body>
</html>