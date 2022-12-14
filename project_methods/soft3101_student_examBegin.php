
<?php
session_start();
include("soft3101_connect.php");
include("soft3101_loginset_students.php");
include("soft3101_Students.php");
include("soft3101_Student_getProfile.php");
include("soft3101_Student_settings.php"); 
include("soft3101_add_lessons.php"); 
include("soft3101_creation_exam.php"); 
include("soft3101_getExam_date.php");
$login=new LoginStudent();
$_SESSION['mybook_userid']=isset($_SESSION['mybook_userid'])?$_SESSION['mybook_userid']:0;
$user_data=$login->check_login_student($_SESSION['mybook_userid'],false);

$USER=$user_data;

$begin_exam=new AddExam();
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
    $ROW=$begin_exam->get_data_taker_exam($_GET['id']);
  }else {
      $ERROR="No exam was found!";
  }
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $finishExam_class=new AddExam();
    $id=$_SESSION['mybook_userid'];
    $finishExam_class->finish_exam($id,$_POST,$ROW['taker_name'],$ROW['creator_name'],$ROW['creator_id'],$ROW['exam_name'],$ROW['examid'],$ROW['exam'],$ROW['lesson_name']);
    if ($result == "") {
        header("Location: soft3101_studentPage.php?");
        die;
    }
    else {
        echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
        echo"Please fill the empty places:<br><br>";
        echo $result;
        echo"</div>";
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
    <link rel="stylesheet" href="soft3101_applyExam.css">
</head>
<body>
    <div>
        <?php
        echo"<div id='exam_info'>";
        echo"<span class='exam_info_span'> ";
        echo"Lesson: ";
        echo $ROW['lesson_name'];
        echo"</span>";
        echo"<span class='exam_info_span'>";
        echo"Exam: ";
        echo $ROW['exam_name'];
        echo"</span>";
        echo"<span class='exam_info_span'>";
        echo"Teacher: ";
        echo $ROW['creator_name'];
        echo"</span>";
        echo"</div>";
        echo"<p id='question'>";
        echo $ROW['exam'];
        echo"</p>";
      
        ?>
<form action=""method="post"enctype="multipart/form-data" id="create_examForm">
<span>Exam Write Area: </span>    
        <textarea name="exam_solution" id="exam_type_area"placeholder="Please write the solution here."></textarea>
        <div class="inputline">
            <input id="post_button" value="Finish"type="submit">         
            
        </div>    

 </form>
</div>
</body>
</html>