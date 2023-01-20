<?php
include('db_connect.php');
if (isset($_POST['submit'])) {
    $username_email=$_POST['username_email'];
    $password=$_POST['password'];
    $result=mysqli_query($conn,"Select * from deneme_1.users where username='$username_email' or email='$username_email'");
    $row=mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)>0) {
      if ($password==$row["password"]) {
       $_SESSION["login"]=true;
       $_SESSION["id"]=$row['userId'];
       

    if ($row["role"] == "Instructor") {
      header('location: instructorPage.php');
      }
   elseif ($row["role"] == "Student") {
     header("location: studentPage.php");
   }
     elseif($row["role"] == "Admin") {
        header('location: adminPage.php');
      }
      }
      else {
        echo"<script>Wrog information.</script>";
      }
    }
    else{
        echo"<script>User nor registered.</script>";
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
    <link rel="stylesheet" href="css\login.css">
</head>
<body>
<nav>
<div class="first_container">
<div class="menu">
<a href="#" >Login</a>
            <a href="signup.php">Sign-up</a>
        </div>
</div>
    </nav>
<div class="mid">
    <div class="form_div">
        <form action="" method="post">
            <p>Username Or Email:</p>
        <input value="" type="text" name="username_email" id="text" placeholder="Username" required><br><br>
        <p>Password:</p>
        <input value=""type="password"name="password"id="text"placeholder="Password" required><br><br>
        <input type="submit"name="submit"id="button" value="Log in"><br><br>
        <a href="signup.php">Sign up </a>
        </form>
    </div>
</div>
</body>
</html>