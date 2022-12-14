<?php
  if ( isset($_GET['success']) && $_GET['success'] == 1 )
  {
    echo "<script type='text/javascript'>alert('Please wait for your approval');</script>";
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="soft3101_login.css">
</head>
<body>
    <nav class="mobile-nav">
    <a href="#"  class="is-active">Login</a>
            <a href="#" >Sign-up</a>
    </nav>
    <nav>
<div class="first_container">
    <p>LOGO</p>
<div class="menu">
<a href="soft3101_login.php" class="is-active">Login</a>
            <a href="soft3101_signup.php" >Sign-up</a>
        </div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
</button>
</div>
    </nav>
    <div class="middle">
        <h2 style="margin-top:-10px;">Choose Your Statue :</h3>
   <div id=student_part>
    <h3><a href="soft3101_login_student.php"><button class="button"> Login as Student</button></a></h3></div>
   <div id=teacher_part>
   <h3><a href="soft3101_login_teacher.php"><button class="button"> Login as Teacher</button></a></h3></div>
    </div>
    <div class="adminGo">  <a href="soft3101_login_admin.php">Admin login</a></div>
    <a href=""></a>
    
<script src="navbar.js"></script>
</body>
</html>