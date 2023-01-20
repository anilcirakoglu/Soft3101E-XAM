<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
    echo $row["userId"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\studentPage.css">
    <title>Document</title>
</head>

<body>
<nav>
   <div class="first_container">
   <div class="menu">
    <a href="studentPage.php" target="_self">Logo</a></li>
        <a href="student_results.php"target="_self">Results</a>
        <a href="student_exams.php"target="_self">Exams</a>
        <a href="student_lessons.php"target="_self">Lessons</a>
        <a href="student_settings.php"target="_self">Settings</a>
        <a href="logout.php"target="_self">Logout</a>
   </div>
   </div>
</nav>
        <div class="info">
           
        </div>
        </div>
        <div class="show_lessons">
            <h3>Your Results:</h3>
            
            <?php
            
              $result2 = mysqli_query($conn, "select DISTINCT c.iname,c.courseName, e.examID, e.eName, e.InstructorId , es.score, es.is_given from course c join coursestudent cs on c.courseId= cs.courseId Join exam e on cs.courseId =e.courseId Join examstudent es on e.courseId =es.courseId WHERE es.studentId='$id'");
              $row2 = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            if (isset($row2["examID"])) {
                echo "<div>";
                echo "<div>";
                echo "Course Name: ";
                echo $row2["courseName"];
                echo "</div>";
                echo "<div>";
                echo "Exam Name: ";
                echo $row2["eName"];
                echo "</div>";

                echo "<div>";
                echo "Course Instoctor: ";
                echo $row2["iname"];

                echo "</div>";
                echo "</div>";
                echo "<div>";
                echo "Score: ";
                if ($row2["is_given"]>0) {
                echo $row2["score"];
                }else {
                    echo"Not Graded";
                }
                

                echo "</div>";
            }
        

                            echo"<br>";

                    }
                    
    }
            else {
                echo "There is no exam.";
            }
            ?>
            

       
    </div>
</body>

</html>