<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_teacher_content_exams.css">
</head>
<body>
    <div class="examPart">
        <div class="line"></div>
        <div class="usernameLineofExam">
        <?php
        echo "<span style=font-size:20px; border-top:1px solid black;> Exams by $user_data[username] :  </span>"?>
        </div>
        <?php
        if ($exams) {
            foreach($exams as $ROWW){
                $teacher=new Teacher();
                $ROW_USER=$user->get_user_teacher($ROWW['creator_id']);
                include("soft3101_examset.php");
            }
        }
        ?>
    </div>
    
</body>
</html>
