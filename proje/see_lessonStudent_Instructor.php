<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $courseId = $_POST['courseId'];
    
   
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
$result2 = mysqli_query($conn, "SELECT * FROM coursestudent cs JOIN users u ON cs.studentId = u.userId WHERE cs.courseId = $courseId");
    echo "takes lesson: ";
    if (mysqli_num_rows($result2) > 0) {
        while ($row3 = mysqli_fetch_assoc($result2)) {
            if (isset($row3["courseId"])) {
                echo "<div>";
                echo"Student Name: ";
                echo $row3["username"];
    
                echo "</div>";
                echo "<div>";
                echo"Student Email:";
                echo $row3["email"];
    
                echo "</div>";
                echo "<br>";
            }
        }
    }
        ?>
</div>
</body>
</html>