<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $courseId = $_POST['courseId'];
    echo $courseId;

}
if (isset($_POST["courseId"])) {
    $result2= mysqli_query($conn, "SELECT * from course where courseId= '$_POST[courseId]' ");
    $row = mysqli_fetch_assoc($result2);
}
if (isset($_POST['submit'])) {
    $reason=$_POST["del_reason"];
    $cid=$_POST["courseId"];
    $adminId=4;
    $query = "INSERT INTO deneme_1.delcourse_request_instructor values('','$cid','$reason','$adminId')";
    mysqli_query($conn, $query);
    if ($query) {
        header("Location:instructorPage.php ");
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
    <link rel="stylesheet" href="css\studentPage.css">
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
<form action="" method="post">
<p>Give a reason</p>
        <textarea name="del_reason" id=""  style="width:400px; height:200px;"></textarea>
        <br>
        <input type="submit"name="submit"id="button" value="Send"><br><br>
        <input type="hidden"  name="courseId"  value="<?php echo $row['courseId']?>">
    </form>
</div>
   
</body>
</html>