<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $examID = $_POST['examID'];

}
if (isset($_POST["examID"])) {
    $result2= mysqli_query($conn, "SELECT * from exam where examID= '$_POST[examID]' ");
    $row = mysqli_fetch_assoc($result2);
}
if (isset($_POST['submit'])) {
    $reason=$_POST["del_reason"];
    $eid=$_POST["examID"];
    $adminId=4;
    $query = "INSERT INTO deneme_1.delexam_request_instructor values('','$reason','$adminId','$eid')";
    mysqli_query($conn, $query);
    if ($query) {
        header("Location:instructorPage.php ");
        die;
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
<p>Give a reason</p>
    <form action="" method="post">
        <textarea name="del_reason" id="" style="width:400px; height:200px;"></textarea>
        <br>
        <input type="submit"name="submit"id="button" value="Send"><br><br>
        <input type="hidden"  name="examID"  value="<?php echo $row['examID']?>">
    </form>
</div>
</body>
</html>