<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $examID = $_POST['examID'];

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
    <?php
if (isset($_POST["examID"])) {

$eid=$_POST["examID"];
$result2= mysqli_query($conn, "SELECT * from examstudent es join exam e on es.examID=e.examID JOIN course c on e.courseId = c.courseId JOIN users u ON u.userId=es.studentId where es.examID=$eid;");
echo "Exam Taker: ";

if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        echo"<br>";
        echo "Exam Name:";
         echo $row['eName'];
         echo"<br>";
         echo "Course Name:";
         echo $row['courseName'];
         echo"<br>";
         echo "Course Code:";
         echo $row['courseCode'];
         echo"<br>";
         echo "Student Name:";
         echo $row['username'];
         echo"<br>";
         echo "Score:";
         if ($row['is_given']>0) {
            echo $row['score'];
         }
         else {
            echo"Not scored.";
            ?>
            <form action="see_exam_givePoint.php" method="POST">             
            <input type="hidden" name="studentId" value="<?php echo $row["studentId"] ?>">
            <button>See exam/give points</button>
        
   
        </form>
        <?php
        }
         echo"<br>";
         
        }

    }else {
        echo"<br>";
        echo"No any exam takers";
    }
}
?>
</div>
</body>
</html>