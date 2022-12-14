
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
        echo"<span style='float:left;margin-right:10px;margin-left:10px;'>";
        echo"</span>";
        echo"Name: ";
       echo $ROWW['username'];
       echo"<span style='margin-left:50px;'>";
       echo"Teacher id: ";
       echo $ROWW['userid'];
       echo"</span>";
       echo"<span style='float:right;margin-right:10px;margin-left:10px;'>";
       echo"<a href='soft3101_studentDelete_byAdmin.php?id=$ROWW[userid]' style='float:right; font-size:15px;padding-top:2px;text-decoration:none;'>delete teacher.</a>";
       echo"</span>";
      
    
    ?>
</div>
</body>
</html>
