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

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST["username"])) {
        
        $settings_class=new SettingsStudent();
        $settings_class->save_settings_student($_POST,$_SESSION['mybook_userid']);
    }
}
if (isset($_GET['id'])) {
    $profile=new ProfileStudent();
    $profile_data=$profile->get_profile_student($_GET['id']);
    
        if (is_array($profile_data)) {
            $user_data = $profile_data[0];
        }
}
$addLesson_student=new AddLesson();
$id=$user_data['userid'];
$lessons=$addLesson_student->get_lesson_student($id);
$exam=new AddExam();
$exams=$exam->get_exam_byStudent($id);
$user=new Student();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="soft3101_studentPage.css">
</head>
<body>
<nav class="mobile-nav">
<a href="soft3101_login.php" >Logout</a>
    </nav>
    <nav>
<div class="first_container">   
    <p>LOGO</p>
<div class="menu">
<a href="soft3101_login.php" >Logout</a>
        </div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
</button>
</div>
    </nav>

    <div class="middle">
        <div class="namePart">
           
    <h2 id="namecollumn"> 
        <?php echo $user_data['username'] ?>
    </h2>
        </div>

        <div class="emailPart">
        <?php echo "(".$user_data['email'].")" ?>
        </div>
<div class="quick_selectionPart">
    <ul>
        <li><a href="soft3101_studentPage.php?section=results&id=<?php echo $user_data['userid']?>">Results</a></li>
        <li><a href="soft3101_studentPage.php?section=exams&id=<?php echo $user_data['userid']?>">Exams</a></li>
        <li><a href="soft3101_studentPage.php?section=exam_calander&id=<?php echo $user_data['userid']?>">Exam Calander</a></li>
        <li><a href="soft3101_studentPage.php?section=lessons&id=<?php echo $user_data['userid']?>">Lessons</a></li>
        <li><a href="soft3101_studentPage.php?section=settings&id=<?php echo $user_data['userid']?>">Settings</a></li>
    </ul>
</div>

<?php
    $section="results";
    if (isset($_GET['section'])) {
        $section=$_GET['section'];
    }
    if ($section=="results") {
        include("soft3101_student_content_results.php");
    }
    elseif ($section=="exams") {
        include("soft3101_student_content_exams.php");
    }
    elseif ($section=="exam_calander") {
        include("soft3101_student_content_exam_calander.php");
    }
    elseif ($section=="lessons") {
        include("soft3101_student_content_lessons.php");
    }
    elseif ($section=="settings") {
       include("soft3101_student_content_settings.php");
    }
    ?>
    </div>
<script src="navbar.js"></script>
</body>
</html>