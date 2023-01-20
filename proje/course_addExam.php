<?php
include('db_connect.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST["courseId"])) {

if (isset($_POST['save'])) {
    $ename = $_POST['exam_name'];
    $exam_date = $_POST['date_exam'];
    $instructorId = $id;
    $courseId = $_POST['courseId'];
    $examQuestion = $_POST['exam'];
    $examNow;
    $score;
    $adminid = 4;
    $StudentId;
    $attend;
    $query = "INSERT INTO deneme_1.exam values('','$ename','$exam_date','$id','$courseId','$examQuestion','$adminid')";
    mysqli_query($conn, $query);
   if ($query) {
    echo"<div style='margin-top:50px;'>";
    echo "exam saved.";
    echo"</div>";
   }
}

$result = mysqli_query($conn, "select * from deneme_1.course where courseId='$_POST[courseId]'");
$row = mysqli_fetch_assoc($result);
$courseTitle = "courseId: ". $row['courseId'] . " - courseCode: ".$row['courseCode'] . " - courseName: ".$row["courseName"] . " | ADD EXAM";
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
    <script src="main.js"></script>
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
        <form method="post" enctype="multipart/form-data" id="create_examForm">
        <span>Exam Name: </span>
           <input type="text" name="exam_name">
            <p id="sonuc"></p>
            <span>Exam Write Area:</span>
            <br>
            <textarea name="exam" style="width:80%; height:500px;" id="exam_type_area" placeholder="Please write the exam here." required></textarea>
            <div class="setDay_for_exam" style="margin-top:10px;">
                <span>Add Exam Date: </span>
                <input type="date" id='textbox' name='date_exam' required>
            </div>
            <div class="inputline">
                <input value="Save" name="save" type="submit">

            </div>
            <input type="hidden"  name="saveExam"  value="1">
            <input type="hidden"  name="courseId"  value="<?php echo $_POST['courseId']?>">

        </form>
    </div>
</body>
<?php

mysqli_close($conn);
?>

</html>