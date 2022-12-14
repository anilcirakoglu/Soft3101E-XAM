
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
        echo"<span style='float:right;margin-right:10px;margin-left:10px;'>";
        echo"<a href='soft3101_teacher_examDelete.php?id=$ROWW[examid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none;'>delete exam.</a>";
        echo"</span>";
    echo $ROWW['exam_name'];
    echo"<span style='margin-left:50px;'>";
    echo "lesson name: ".$ROWW['lesson_name']."<a href='soft3101_teacher_seeExamTakers.php?id=$ROWW[examid]' style='margin-left:30px;font-size:15px;padding-top:2px;text-decoration:none;'>who takes this exam.</a>";
    echo"</span>";
    echo"<a href='soft3101_exam_changeDate.php?id=$ROWW[examid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none;'>change the date of exam.</a>";
    echo"<span style='float:right;margin-right:50px;'>";
    echo "(";
    echo $ROWW['exam_date_hour'];
    echo ")   ";
    echo $ROWW['exam_date_day'];
    echo "/";
    echo $ROWW['exam_date_month'];
    echo "/";
    echo $ROWW['exam_date_year'];
    echo"</span>";
    
    ?>
</div>
</body>
</html>
