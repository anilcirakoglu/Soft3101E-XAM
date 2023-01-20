<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
    
}
if (isset($_POST["examID"])) {
    $result = mysqli_query($conn,"select * from course c join coursestudent cs on c.courseId= cs.courseId Join exam e on cs.courseId =e.courseId where examID='$_POST[examID]' limit 1");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['save'])) {
    $examID=$_POST['examID'];
    $InstructorId=$_POST['InstructorId'];
    $courseId=$_POST['courseId'];
    $examNow=$_POST['exam_solution'];
    $score=0;
    $adminId=4;
    $studentId=$id;
    $attend=1;
    $is_given=0;
    $query1="INSERT INTO deneme_1.examstudent values('','$examID','$InstructorId','$courseId','$examNow','$score','$adminId','$studentId','$attend','$is_given')";
    mysqli_query($conn, $query1);
    if ($query1) {
        header("Location:studentPage.php ");
        die;
       }


echo"submited";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="startExam.css">

</head>

<body>
    <span>Exam name:<?php echo $row['eName'] ?> </span>
    <br>
    <span>Lesson name:<?php echo $row['courseName'] ?> </span>
    <br>
    <span>Instructor name:<?php echo $row['iname'] ?> </span>
    <br>

    <span>Exam Question:<br>   <?php echo $row['examQuestion'] ?> </span> <br>
    <form method="post">
    <span>Exam Write Area: </span>
    <br>
    <textarea name="exam_solution" id="exam_type_area" style="width:80%; height:400px;" placeholder="Please write the exam solution here." required></textarea>
    <br>
    <input type="submit" name="save" id="button" value="Submit"><br>
    <input type="hidden"  name="InstructorId"  value="<?php echo $row['InstructorId']?>">

    <input type="hidden"  name="examID"  value="<?php echo $row['examID']?>">
    <input type="hidden"  name="courseId"  value="<?php echo $row['courseId']?>">

    </form>
</body>
</html>