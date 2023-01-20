<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["examID"])) {
    $eid=$_POST['examID'];
}
if (isset($_POST['save'])) {
    $query = "DELETE FROM exam WHERE examID='$examID' ";
    mysqli_query($conn, $query);
    $examID = $_POST['examID'];
    $query3 = "DELETE FROM delexam_request_instructor WHERE examID='$examID' ";
    mysqli_query($conn, $query3);
        $query2 = "DELETE FROM examstudent WHERE examID='$examID' ";
        mysqli_query($conn, $query2);
       if ($query && $query2 && $query3) {
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
    $result2 = mysqli_query($conn, "SELECT * FROM delexam_request_instructor dele join exam e on dele.examID=e.examID join course c on c.courseId=e.courseId join users u on c.instructorId=u.userId where dele.examID=$eid");
    if (mysqli_num_rows($result2) > 0) {
        while ($rows = mysqli_fetch_assoc($result2)) {
    if (isset( $rows['reason'])) {
        echo"Reason:";
        echo"<br>";
        echo $rows['reason'];
    }
    ?>
        <form method="post" enctype="multipart/form-data" id="create_examForm">
        <span>Delete Exam.</span>
                <input value="Yes" name="save" type="submit">
                <input type="hidden"  name="examID"  value="<?php echo $row2['examID']?>">
        </form>
        <?php
 }
 }
 ?>
    </div>
</body>

</html>