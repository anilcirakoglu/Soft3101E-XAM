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

if (isset($_GET['year'])&&isset($_GET['month'])&&isset($_GET['year'])) {
    $year=addslashes($_GET['year']);
    $month=addslashes($_GET['month']);
    $day=addslashes($_GET['day']);
    $sql="select * from create_exams where exam_date_day='$day' and exam_date_month='$month' and exam_date_year='$year' ";
    $db=new Database();
    $results=$db->read($sql);
    
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_student_addLesson.css">
</head>
<body>
<?php
if (is_array($results) || is_object($results))
{
    foreach ($results as $key)
    {
        include("soft3101_get_dateExam_teacherSet.php");
    }
}
    ?>
</body>
</html>