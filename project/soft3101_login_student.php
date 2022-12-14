<?php
session_start();
include("soft3101_connect.php");
include("soft3101_loginset_students.php");

$username="";
$password="";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $login=new LoginStudent();
    $result=$login->evaluate_student($_POST);
    if ($result !="") {
        echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
        echo"Please fill the empty places:<br><br>";
        echo $result;
        echo"</div>";
    }
    else {
        header("Location:soft3101_studentPage.php");
        die;
    }
    $username=$_POST['username'];
    $password=$_POST['password'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="soft3101_login_student.css">
</head>
<body>
    <nav class="mobile-nav">
    <a href="#" class="is-active">Login</a>
            <a href="soft3101_signup.php">Sign-up</a>
    </nav>
    <nav>
<div class="first_container">   
    <p>LOGO</p>
<div class="menu">
            <a href="#" class="is-active">Login</a>
            <a href="soft3101_signup.php">Sign-up</a>
        </div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
</button>
</div>
    </nav>
    <div class="middle">
    <form method="post">
    <div class="login">
        <div class="login_form">
          
        <h1 id="loginForm_write">Login As Student</h1>

        <input value="<?php echo $username ?>" type="text" name="username" id="text" placeholder="Username"><br><br>
        <input value="<?php echo $password ?>"type="password"name="password"id="text"placeholder="Password"><br><br>
        <input type="submit"name=""id="button" value="Log in"><br><br>
        <a href="" class="linkinsign">Forgotten password?</a><br>
        <a href="soft3101_signup_student.php"class="linkinsign">Sign up </a>
        </div>
    </div>
    </div>
    
<script src="navbar.js"></script>
</body>
</html>