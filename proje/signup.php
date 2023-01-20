<?php
include('db_connect.php');
 if (isset($_POST['submit'])) {
   $username=$_POST['username'];
   $email=$_POST['email'];
   $role=$_POST['role'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
   $used=mysqli_query($conn,"Select * from users where username='$username' or email='$email'");
   if (mysqli_num_rows($used)>0) {
    echo"<script> alert('Username or email has already taken.');</script>";
   }
   else {
    if (($password==$cpassword)&&($role=='Student')) {
      $query="INSERT INTO deneme_1.users values('','$username','$password','$email','$role')";
      if ($conn->query($query) == TRUE) {

        header("location:login.php");
    }
   }else if (($password==$cpassword)&&($role=='Instructor')) {
    $query="INSERT INTO deneme_1.preinstructor values('','$username','$password','$email','$role','4')";
    if ($conn->query($query) == TRUE) {
        echo"<script> alert('Your registeration has been sent to admin.');</script>";
    }
   }

 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="css\signup.css">
</head>
<body>
<nav>
<div class="first_container">
<div class="menu">
<a href="login.php" >Login</a>
            <a href="#">Sign-up</a>
        </div>
</div>
    </nav>
<div class="mid">
    <div class="form_div">
        <form action="" method="POST";>
            <p id="ud">Username:</p>
        <input value="" type="text" name="username" id="text" placeholder="Username"><br><br>
        <p>Email:</p>
        <input value="" type="text" name="email" id="text" placeholder="Email"><br><br>
        <p>Role:</p>
        <select name="role" id="">Select a Role
            <option value="Instructor">Instructor</option>
            <option value="Student">Student</option>
        </select>
        <p>Password:</p>
        <input value=""type="password"name="password"id="text"placeholder="Password" maxlength="30" minlength="3"><br><br>
        <p>Confirm Password:</p>
        <input value=""type="password"name="cpassword"id="text"placeholder="Password" maxlength="30" minlength="3" ><br><br>
        
        <input type="submit"name="submit"id="button" value="Log in"><br><br>
        <a href="login.php"class="">Login </a>
        </form>
    </div>
</div>
</body>
</html>