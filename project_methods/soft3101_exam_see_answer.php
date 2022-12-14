<?php
session_start();
include("soft3101_connect.php");
include("soft3101_loginset_teachers.php");
include("soft3101_Teachers.php");
include("soft3101_Teacher_getProfile.php");
include("soft3101_Teacher_settings.php"); 
include("soft3101_add_lessons.php"); 
include("soft3101_creation_exam.php"); 
 
$login=new LoginTeacher();
$_SESSION['mybook_userid']=isset($_SESSION['mybook_userid'])?$_SESSION['mybook_userid']:0;
$user_data=$login->check_login_teacher($_SESSION['mybook_userid'],false);

$USER=$user_data;

$see_solution=new AddExam();
$see_lessonName=new AddLesson();
$ROWW=false;
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
    $ROW=$see_solution->get_exam_answer_of_student($_GET['id']);
  }else {
      $ERROR="No exam was found!";
  }
  if ($_SERVER['REQUEST_METHOD']=="POST") {
    $give_point_class=new AddExam();
    $give_point_class->save_exam_answer($_POST,$ROW['score'],$_GET['id']);
    if ($result == "") {
        header("Location: soft3101_teacherPage.php?");
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
    <title></title>
    <link rel="stylesheet" href="soft3101_exam_see_answer.css">
</head>
<body>
<div class="f_line">
    <p style="text-align:center;">Lesson name: <?php echo $ROW['lesson_name']; ?> / Exam name:<?php echo $ROW['exam_name']; ?> </p>
</div>
<?php
echo "Question: ";
echo"<br>";
?>
<div class="question">
<?php 
echo $ROW['exam']; ?>
</div>
<?php
echo "Answer: ";
echo"<br>";
?>
<div class="answer">
<?php echo $ROW['exam_solution']; ?>

</div>
<form action=""method="post"enctype="multipart/form-data" id="create_exam_result">

<div class="inputline">

<input type='text' id='pointbox' name='point' value=''placeholder='give point.'/>
            
        </div>   
        <div class="inputline">
            <input id="post_button" value="SAVE"type="submit">         
            
        </div>   
        </form>  
</body>
</html>