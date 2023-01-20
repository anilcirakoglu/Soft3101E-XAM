<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $studentId = $_POST['studentId'];
    echo $studentId;

}
if (isset($_POST["studentId"])) {
    $sid=$_POST["studentId"];
    $result2= mysqli_query($conn, "SELECT * from examstudent es join exam e on es.examID=e.examID JOIN course c on e.courseId = c.courseId JOIN users u ON u.userId=es.studentId where es.studentId=$sid;");
    $row = mysqli_fetch_assoc($result2);
}
if (isset($_POST['submit'])) {
    $score=$_POST["score"];
    $sid=$_POST["sid"];
    $query = "update examstudent set score=$score , is_given=1 where studentId=$sid ";
    mysqli_query($conn, $query);
    if ($query) {
        header("Location:studentPage.php ");
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
    <span>Exam Question:</span>
    <?php
    echo $row['examQuestion']
    ?>
      <span>Exam Answer:</span>
    <?php
    echo $row['examNow']
    ?>
<form action=""method="post">
             <span>Score:</span>
             <input type="text" name="score" require>
             <input type="hidden" name="sid" value="<?php echo $row["studentId"] ?>">
             <input type="submit"name="submit"id="button" value="Save"><br><br>
             
</form>
</div>
</body>
</html>