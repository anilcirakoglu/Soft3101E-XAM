<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["courseId"])) {
    $cid=$_POST['courseId'];
}
if (isset($_POST['save'])) {
    $courseId = $_POST['courseId'];
    $query3 = "DELETE FROM delstudent_lesson WHERE courseId='$courseId' ";
    mysqli_query($conn, $query3);
        $query2 = "DELETE FROM coursestudent WHERE courseId='$courseId' ";
        mysqli_query($conn, $query2);
       if ($query2 && $query3) {
        header("location:adminPage.php");
        die;
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
    <?php
    $result2 = mysqli_query($conn, "SELECT DISTINCT delcs.reason ,delcs.courseId,c.courseName,c.courseCode, u.username FROM 
    delstudent_lesson delcs 
    join course c on delcs.courseId=c.courseId
    join coursestudent cs on c.courseId=cs.courseId 
    join users u on cs.studentId=u.userId where cs.courseId=$cid");
      if (mysqli_num_rows($result2) > 0) {
        while ($rows = mysqli_fetch_assoc($result2)) {
    if (isset( $rows['reason'])) {
        echo"Reason:";
        echo"<br>";
        echo $rows['reason'];
    }
    ?>
        <form method="post" enctype="multipart/form-data" id="create_examForm">
        <span>Delete Course.</span>
                <input value="Yes" name="save" type="submit">
                <input type="hidden"  name="courseId"  value="<?php echo $row2['courseId']?>">
        </form>
        <?php
        }
    }
        ?>
    </div>
</body>

</html>