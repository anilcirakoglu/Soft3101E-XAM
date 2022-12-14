
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
if (isset($_GET['id'])) {
    $profile=new ProfileTeacher();
    $profile_data=$profile->get_profile_teacher($_GET['id']);
    
        if (is_array($profile_data)) {
            $user_data = $profile_data[0];
        }
}

$delete_lesson=new AddLesson();
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
    $ROW=$delete_lesson->get_data_lesson($_GET['id']);
  }else {
      $ERROR="No exam was found!";
  }
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $exam=new AddExam();
    $id=$_SESSION['mybook_userid'];
    $result=$exam->create_exam($id, $_POST,$user_data['username'],$ROW['lessonid'],$ROW['lesson_name']);
    if ($result == "") {
        header("Location:soft3101_teacherPage.php");
        die;
    }
    else {
        echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
        echo"Please fill the empty place:<br><br>";
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
    <link rel="stylesheet" href="soft3101_createExam.css">
</head>
<body>  
<div class="createExam">
        <form method="post" enctype="multipart/form-data"id="create_examForm">
            <span>Add Exam Name: </span>
        <input type="text"id='textbox' name='exam_name' placeholder='Add exam name here. '>
        <span>Exam Write Area: </span>    
        <textarea name="exam" id="exam_type_area"placeholder="Please write the exam here."></textarea>
        <span style="margin-top:4px; color:grey;">*Type date as: 9 9 11 2022 >>>hour:9.00 day:9 month:11 year:2022</span>
        <div class="setDay_for_exam"style="margin-top:10px;">
        <span>Add Exam Date: </span>
        <input type="text"id='textboxiki' name='exam_date_hour' placeholder='Add exam hour here. '>
        <input type="text"id='textboxiki' name='exam_date_day' placeholder='Add exam day here. '>
        <input type="text"id='textboxiki' name='exam_date_month' placeholder='Add exam month here. '>
        <input type="text"id='textboxiki' name='exam_date_year' placeholder='Add exam year here. '>
        </div>
        <div class="inputline">
            <input id="post_button" value="Post"type="submit">         
            
        </div>    
        </form>
            </div>
</body>
</html>