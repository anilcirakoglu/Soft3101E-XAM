
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
       <?php
    echo "Student: " .$ROW["taker_name"];
    echo " Point: ".$ROW["score"];
    echo"<a href='soft3101_exam_see_answer.php?id=$ROW[examid]' style=' font-size:15px;padding-top:2px;text-decoration:none;margin-left:20px;'>see the answer/give a point</a>";
    ?>
</div>
</body>
</html>
