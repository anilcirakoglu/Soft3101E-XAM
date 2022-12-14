<?php

session_start();
include("soft3101_connect.php");
include("soft3101_loginset_students.php");
include("soft3101_Students.php");
include("soft3101_Student_getProfile.php");
include("soft3101_Student_settings.php"); 
include("soft3101_add_lessons.php"); 
include("soft3101_creation_exam.php"); 
$login=new LoginStudent();

$_SESSION['mybook_userid']=isset($_SESSION['mybook_userid'])?$_SESSION['mybook_userid']:0;
$user_data=$login->check_login_student($_SESSION['mybook_userid'],false);

$USER=$user_data;

if (isset($_GET['find'])) {
    $find=addslashes($_GET['find']);
    $findcreator=addslashes($_GET['find_teacher']);
    $sql="select * from lessons where lesson_name='$find' and creator_name='$findcreator' limit 1";
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
        include("soft3101_show_lessonsAsStudent.php");
    }
}
    ?>
</body>
</html>