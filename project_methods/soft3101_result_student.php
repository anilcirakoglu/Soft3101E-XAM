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

$id=$user_data['userid'];
$exam=new AddExam();
$user=new Student();
$Lexams=$exam->get_taker_finishExam($id);



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
         if ($Lexams) {
            foreach($Lexams as $ROW){
                $teacher=new Student();
                $ROW_USER=$user->get_user_student($ROW['taker_id']);
            }
        }
    echo"<div>";
    echo"<span>";
    echo $ROWW["exam_name"]." / ".$ROWW["lesson_name"];
    echo"</span>";
    echo"<span style='float:right;'>";
    if (isset($ROW["score"])) {
        echo "Point: ".$ROW["score"];
    }
    else {
        echo"Not started yet.";
    }
    echo"</span>";
    echo"<br>";
    echo"</div>";
    ?>
</body>
</html>
