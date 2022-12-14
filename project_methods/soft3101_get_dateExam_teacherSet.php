
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
    echo "Date: ".$key['exam_date_day']." / ".$key['exam_date_month']." / ".$key['exam_date_year'];
    echo"<br>";
    echo "Exam Hour: ".$key['exam_date_hour'];
    echo"<br>";
    echo  "Lesson Name: ".$key['lesson_name'];
    echo"<br>";
    echo  "Exam name: ".$key['exam_name'];
    echo"<span style='float:right;margin-right:50px;'>";
    echo"</span>";
    ?>
</div>
</body>
</html>