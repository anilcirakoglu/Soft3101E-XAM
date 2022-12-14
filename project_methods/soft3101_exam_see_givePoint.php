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

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST["username"])) {
        
        $settings_class=new SettingsTeacher();
        $settings_class->save_settings_teacher($_POST,$_SESSION['mybook_userid']);
    }else {
        $lesson=new AddLesson();
        $id=$_SESSION['mybook_userid'];
        $result=$lesson->create_lesson($id, $_POST,$user_data['username']);
        if ($result == "") {
            header("Location: soft3101_teacherPage.php");
            die;
        }
        else {
            echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
            echo"Please fill the empty place:<br><br>";
            echo $result;
            echo"</div>";
        }
    }
}
$id=$user_data['userid'];
$exam=new AddExam();
$user=new Teacher();
$Lexams=$exam->get_creator_finishExam($id);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="soft3101_teacherPage.css">
</head>
<body>
<?php
        if ($Lexams) {
            foreach($Lexams as $ROW){
                $teacher=new Teacher();
                $ROW_USER=$user->get_user_teacher($ROW['creator_id']);
                include("soft3101_exam_see_givePointset.php");
            }
        }
        ?>
</body>
</html>