
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
        
    echo $data_row['lesson_name'];
    echo"<a href='soft3101_lesson_lessonDelete.php?id=$data_row[lessonid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none;'>delete lesson.</a>";
    echo"<span style='float:right;margin-right:50px;'>";
    echo"</span>";
    ?>
</div>
</body>
</html>