
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
    echo"<div>";
    echo"<span>";
    echo $ROWW["exam_name"]." / ".$ROWW["lesson_name"];
    echo"</span>";
    echo"<span style='float:right;'>";
    echo"<a href='soft3101_exam_see_givePoint.php?id=$ROWW[examid]' style=' font-size:15px;padding-top:2px;text-decoration:none;'>see who finished/give points</a>";
    echo"</span>";
    echo"<br>";
    echo"</div>";
    ?>
</body>
</html>
