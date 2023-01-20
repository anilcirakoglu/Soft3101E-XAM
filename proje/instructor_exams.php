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
            
        </div>
        </div>
        <div class="show_lessons">
            <h3>Your Exams:</h3>
            
            <?php
            
            $result = mysqli_query($conn, "select * from course c JOIN exam e on c.courseId = e.courseId where c.instructorId='$id' ");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($row["eName"])) {
                        echo "<div>";
                        echo "<div>";
                        echo "Exam Date: ";
                        echo $row["eDate"];
                        echo "</div>";
                        echo "<div>";
                        echo "Exam Name: ";
                        echo $row["eName"];
                        echo "</div>";
                        echo "<div>";
                        echo "Course Name: ";
                        echo $row["eName"];
                        echo "</div>";
                        echo "<div>";
                        echo "Course Code: ";
                        echo $row["courseCode"];
                        echo "</div>";
                        echo "<div>";
                        ?>
                         <form action="see_examStudent_Instructor.php" method="post"> 
                <input type="hidden"  name="courseId" id="courseId" value=<?php echo $row["examID"]?>>
                <button>Who takes exam</button>

                  </form>
                         <form action="delete_exam_Instructor.php" method="post"> 
                <input type="hidden"  name="examID" id="examID" value=<?php echo $row["examID"]?>>
                <button>Delete Exam </button>
                <br><br> 

                  </form>
                        <?php
                        echo"<br>";

                    }
                    
                }
            } else {
                echo "There is no exam.";
            }
            ?>
            

       
    </div>
</body>

</html>