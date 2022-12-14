<?php

include("soft3101_connect.php");
include("soft3101_signupset_students.php");
$username="";
$email="";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $signup=new SignupStudent();
    $result=$signup->evaluate_student($_POST);
    if ($result !="") {
        echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
        echo"Please fill the empty places:<br><br>";
        echo $result;
        echo"</div>";
    }
    else {
        header('Loacation: soft3101_login_student.php');
    }
    $username=$_POST['username'];
    $email=$_POST['email'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="soft3101_signup_student.css">
</head>
<body>
    <nav class="mobile-nav">
    <a href="soft3101_login.php" >Login</a>
            <a href="#" class="is-active">Sign-up</a>
    </nav>
    <nav>
<div class="first_container">
    <p>LOGO</p>
<div class="menu">
<a href="soft3101_login.php" >Login</a>
            <a href="#" class="is-active">Sign-up</a>
        </div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
</button>
</div>
    </nav>
    <div class="middle">
    <form method="post" action="">
    <div class="login">
        <div class="login_form">
          
        <h1 id="loginForm_write">Student Sign-up</h1>

        <input value="<?php echo $username ?>" type="text" name="username" id="text" placeholder="Username"><br><br>
        <input type="password"name="password"id="text"placeholder="Password"><br><br>
        <input value="<?php echo $email ?>" type="text" name="email" id="text" placeholder="Email"><br><br>
        <input type="submit"name=""id="button" value="Sign up"><br><br>
        <a href="soft3101_login_student.php"class="linkinsign">Log in </a>
        </div>
    </div>
    </form>
    </div>
    
<script src="navbar.js"></script>
</body>
</html>