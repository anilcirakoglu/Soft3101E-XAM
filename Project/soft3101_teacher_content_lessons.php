<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_teacher_content_lessons.css">
</head>
<body>
<div class="lessonPart">
    <div class="LessonTable">
           <div class="lessonarea">
        <form method="post" enctype="multipart/form-data" id="lessonForm">
        <input type="text"id='textbox' name='lesson_name' placeholder='Add Lesson: '>
        <div class="save_buttonLine">
            <input id="save_button" value="SAVE"type="submit">     
        </div>    
        </form>
            </div>
            <div class="lesson_bar"> 
                <div class="lessons">
                <div id="postat" style="">  <?php
    echo "<span style=font-size:20px;> Lessons by $user_data[username] :  </span>"?>
    </div>
                <?php
        if ($lessons) {
            foreach($lessons as $ROW){
                $teacher=new Teacher();
                $ROW_USER=$user->get_user_teacher($ROW['creator_id']);

                include("soft3101_lessonset.php");
            }
        }
        ?>
    </div>
    </div>
    
    </div>
    
    
</body>
</html>
