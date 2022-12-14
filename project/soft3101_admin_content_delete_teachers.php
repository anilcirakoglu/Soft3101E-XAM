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
        echo "<span style=font-size:20px; border-top:1px solid black;> Teachers:</span>"?>
        </div>
        <?php
        if ($seeteachers) {
            foreach($seeteachers as $ROW){
                $admin=new AdminSet();
                $ROW_USER=$user->get_user_admin($ROW['admin_id']);
                include("soft3101_admin_teacherset.php");
            }
        }
        ?>
    </div>
    
</body>
</html>
