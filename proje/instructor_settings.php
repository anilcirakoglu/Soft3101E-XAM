<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
   $id=$_SESSION["id"];
   $result=mysqli_query($conn,"select * from deneme_1.users where userId=$id");
   $row=mysqli_fetch_assoc($result);
}
if (isset($_POST['submit'])) {
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
if ($password==$cpassword) {
    $query="update deneme_1.users set password='$cpassword'where userId='$id' ";
    mysqli_query($conn,$query);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\studentPage.css">
</head>
<body>
<nav>
   <div class="first_container">
   <div class="menu">
    <a href="instructorPage.php" target="_self">Logo</a></li>
        <a href="instructor_results.php"target="_self">Results</a>
        <a href="instructor_exams.php"target="_self">Exams</a>
        <a href="instructor_lessons.php"target="_self">Lessons</a>
        <a href="instructor_settings.php"target="_self">Settings</a>
        <a href="logout.php"target="_self">Logout</a>
   </div>
   </div>
</nav>
    <div class="info">
        <p>Username:</p>
        <?php echo $row["username"];?>
        <p>Email</p>
        <?php echo $row["email"];?>
   <form action="" method="post">
    <p>Change Password</p>
  <label for="password">Password</label>
  <input type="password"name="password"required>
  <label for="cpassword">Confirm Password</label>
  <input type="password"name="cpassword"required>
  <input type="submit"name="submit"id="button" value="Save"><br><br>
   </form>
</div>
</body>
</html>