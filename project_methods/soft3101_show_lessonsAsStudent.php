<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     echo $key['lesson_name'];
     echo $key['creator_name'];

     echo"<form method='post' enctype='multipart/form-data' id='lessonForm'>";
    echo" <input id='save_button' value='Add'type='submit'>";
     echo" </form>";
     if ($_SERVER['REQUEST_METHOD']=="POST") {
        $login=new LoginStudent();

$_SESSION['mybook_userid']=isset($_SESSION['mybook_userid'])?$_SESSION['mybook_userid']:0;
$user_data=$login->check_login_student($_SESSION['mybook_userid'],false);

$USER=$user_data;
        $lesson=new AddLesson();
        $id=$_SESSION['mybook_userid'];
        $taker_name=$user_data['username'];
        $results=$lesson->lesson_taker($id,$taker_name, $_POST,$key['creator_name'],$key['creator_id'],$key['lesson_name'],$key['lessonid']);
        $sql="select * from create_exams where creator_id='$key[creator_id]' and lessonid='$key[lessonid]'  ";
        $db=new Database();
        $result=$db->read($sql);

    foreach ($result as $newkey)
    {   
        $exam=new AddExam();
        $id_second=$_SESSION['mybook_userid'];
        $taker_name_exam=$user_data['username'];
        $result=$exam->exam_taker($id_second,$taker_name_exam, $_POST,$key['creator_name'],$key['creator_id'],$newkey['exam_name'],$newkey['examid'],$key['lessonid'],$key['lesson_name'],$newkey['exam'],$newkey['exam_date_hour'],$newkey['exam_date_day'],$newkey['exam_date_month'],$newkey['exam_date_year']);
        if ($result == "") {
            header("Location: soft3101_studentPage.php");
            die;
        }
    }
     }
     ?>
</body>
</html>