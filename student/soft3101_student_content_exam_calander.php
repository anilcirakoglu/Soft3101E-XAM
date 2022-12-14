<?php
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

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST["username"])) {
        
        $settings_class=new SettingsStudent();
        $settings_class->save_settings_student($_POST,$_SESSION['mybook_userid']);
    }else {
        $lesson=new AddLesson();
        $id=$_SESSION['mybook_userid'];
        $result=$lesson->create_lesson($id, $_POST,$user_data['username']);
        if ($result == "") {
            header("Location: soft3101_studentPage.php");
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

$lesson=new AddLesson();
$id=$user_data['userid'];
$lessons=$lesson->get_lesson($id);
$exam=new AddExam();
$exams=$exam->get_exam($id);
$user=new Student();
$Lexams=$exam->get_creator_finishExam($id);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_teacher_content_exam_calander.css">
</head>
<body>
<form action="soft3101_student_seecalander.php"method="get"enctype="multipart/form-data" id="postTo_weekly_calander">
    <div class="select_week">
        year:
    <input type='text' id='year_box' name='year' value=''placeholder='enter year'/>
    month:
<select name="month" id="month_box">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
day:
<select name="day" id="month_box">
<option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
	<option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
	<option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
</select>
<input id="post_button" value="Search"type="submit">
    </div>
</form>
</div>
</body>
</html>
