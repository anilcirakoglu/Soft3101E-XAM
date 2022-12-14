<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_student_content_exams.css">
</head>
<body>
<div class="lessonPart">
        <div class="line"></div>
        <div class="usernameLineofLesson">
        <?php
        echo "<span style=font-size:20px; border-top:1px solid black;> Your Exams: </span>"?>
        </div>
        <?php
        if ($exams) {
            foreach($exams as $data_exam_row){
                $student=new Student();
                $ROW_USER=$user->get_user_student($data_exam_row['taker_id']);
                include("soft3101_get_exam_studentSet.php");
                
            }
        }
        ?>
    </div>
</body>
</html>