
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

$see_taker_exam=new AddExam();
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
    $ROWW=$see_taker_exam->get_data_taker_exam($_GET['id']);
  }else {
      $ERROR="No exam was found!";
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
<?php
echo "Lesson name: ".$ROWW['lesson_name']." Exam name: ".$ROWW['exam_name']." (by ".$ROWW['creator_name'].")";
echo"<br>";
echo"Exam Takers:";
echo"<br>";
echo $ROWW['taker_name'];
?>
</body>
</html>