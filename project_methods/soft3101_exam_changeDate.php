
<?php
session_start();
include("soft3101_connect.php");
include("soft3101_loginset_teachers.php");
include("soft3101_Teachers.php");
include("soft3101_Teacher_getProfile.php");
include("soft3101_Teacher_settings.php"); 
include("soft3101_add_lessons.php"); 
include("soft3101_creation_exam.php"); 
include("soft3101_getExam_date.php"); 

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

$Exam=new examid();
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
  $ROW=$Exam->get_data_exam($_GET['id']);
}else {
    $ERROR="No exam was found!";
}

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $settings_class=new SettingsTeacher();
    $settings_class->save_settings_exam($_POST,$ROW['examid']);
    if ($result == "") {
        header("Location: soft3101_teacherPage.php");
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
    <link rel="stylesheet" href="soft3101_exam_changeDate.css">
</head>
<body>
    <div>
<form action=""method="post"enctype="multipart/form-data" id="settingsForm">
<?php

$setting_class=new SettingsTeacher();

$settings=$setting_class->get_settings_exam($ROW['examid']);
echo"<div class='changeDate_table'>";
    echo"<p id='textbox'>Hour:</p>";
    echo"<input type='text' id='textbox' name='exam_date_hour' value='".htmlspecialchars($settings['exam_date_hour'])."' placeholder='hour'/>";
    echo"<p id='textbox'>Day:</p>";
echo"<input type='text' id='textbox' name='exam_date_day' value='".htmlspecialchars($settings['exam_date_day'])."' placeholder='day'/>";
echo"<p id='textbox'>Month:</p>";
echo"<input type='text' id='textbox' name='exam_date_month' value='".htmlspecialchars($settings['exam_date_month'])."' placeholder='month'/>";
echo"<p id='textbox'>Year:</p>";
echo"<input type='text' id='textbox' name='exam_date_year' value='".htmlspecialchars($settings['exam_date_year'])."' placeholder='year'/>";
echo"<input id='saveChange_button' type='submit' value='SAVE'>";
echo"</div>";
?>
 </form>
</div>
</body>
</html>