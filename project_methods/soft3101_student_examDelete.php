
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
if (isset($_GET['id'])) {
    $profile=new ProfileStudent();
    $profile_data=$profile->get_profile_student($_GET['id']);
    
        if (is_array($profile_data)) {
            $user_data = $profile_data[0];
        }
}

$delete_exam=new AddExam();
$ERROR="";
$ROW=false;
if (isset($_GET['id'])){
    $ROW=$delete_exam->get_data_taker_exam($_GET['id']);
  }else {
      $ERROR="No exam was found!";
  }
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $delete_class=new AddExam();
    $delete_class->save_delete_exam_byStudent($_POST,$ROW['examid']);
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
    <link rel="stylesheet" href="soft3101_exam_changeDate.css">
</head>
<body>
    <div>
<form action=""method="post"enctype="multipart/form-data" id="settingsForm">
<?php
echo"<div class='changeDate_table'>";
echo"<p id='textbox'>Are you sure want to delete this lesson ?</p>";
echo"<input id='saveChange_button' type='submit' value='Yes'>";
echo"</div>";
?>
 </form>
</div>
</body>
</html>