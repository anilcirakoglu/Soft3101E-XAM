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
<form action="soft3101_student_addLesson.php" method="get">
            <input type="text"id="search_box" name='find'placeholder="Search the lesson"required>
            <input type="text"id="search_box" name='find_teacher'placeholder="Search the creator"required>
            <input id="save_button" name="submit"value="Search"type="submit">   
        </form>
        <div class="line"></div>
        <div class="usernameLineofLesson">
        <?php
        echo "<span style=font-size:20px; border-top:1px solid black;> Your Lessons: </span>"?>
        </div>
        <?php
        if ($lessons) {
            foreach($lessons as $data_row){
                $student=new Student();
                $ROW_USER=$user->get_user_student($data_row['taker_id']);
                include("soft3101_get_lesson_studentSet.php");
                
            }
        }
        ?>
    </div>
</body>
</html>