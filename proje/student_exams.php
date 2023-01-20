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
            <h3>Your Exams:</h3>
            
            <?php
            
              $result2 = mysqli_query($conn, "select DISTINCT c.iname,c.courseName, e.examID, e.eName, e.InstructorId from course c join coursestudent cs on c.courseId= cs.courseId Join exam e on cs.courseId =e.courseId WHERE cs.studentId='$id'");

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
                echo "<br>";
            }
            $used=mysqli_query($conn,"select * from examstudent es
            join exam e on es.examID=e.examID
            join coursestudent cs on e.courseId=cs.courseId
            join users u on cs.studentId=u.userId
            where e.examID='$row2[examID]'");
    if (mysqli_num_rows($used)>0) {
     echo"exam submited";
    }else {
    ?>
                         <form action="startExam.php" method="post"> 
                <input type="hidden"  name="examID" id="examID" value=<?php echo $row2["examID"]?>>
                <button>Enter exam</button>

                  </form>
                        
                        <?php
                        echo"<br>";
    }
                    }
                    
    }
            else {
                echo "There is no exam.";
            }
            ?>
            

       
    </div>
</body>

</html>