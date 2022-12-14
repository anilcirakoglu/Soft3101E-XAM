
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="post">
        <div id="postat" style="font-size:18px;font-weight:bold;padding:4px;">  <?php
    echo $ROW['lesson_name'];
    echo"<a href='soft3101_teacher_seeLessonTakers.php?id=$ROW[lessonid]' style='margin-left:30px;font-size:15px;padding-top:2px;text-decoration:none;'>who takes this lesson.</a>";
    echo"<a href='soft3101_teacher_lessonDelete.php?id=$ROW[lessonid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none;'>delete lesson.</a>";
    echo"<a href='soft3101_teacher_lesson_AddExam.php?id=$ROW[lessonid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none; margin-right:50px;'>add exam.</a>";
    echo"<span style='float:right;margin-right:50px;'>";
    echo"</span>";
    ?>
</div>
</body>
</html>
