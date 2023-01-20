<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $rowa = mysqli_fetch_assoc($result);
    $resulta = mysqli_query($conn, "select courseId from course c JOIN users u on c.instructorId = u.userId where c.instructorId=$id");
    $row = mysqli_fetch_assoc($resulta);

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $ccode = $_POST['ccode'];
    $instructorId = $id;
    $iname = $rowa['username'];
    $adminid = 4;
    $query = "INSERT INTO deneme_1.course values('',' $ccode','$lname','$instructorId','$iname','$adminid')";
    $used=mysqli_query($conn,"SELECT * FROM `course` WHERE instructorId='$_SESSION[id]' and courseName='$lname'");
    if (mysqli_num_rows($used)>0) {
     echo"<script> alert('already used course name and code.');</script>";
    }
    else {
    mysqli_query($conn, $query);
}


}
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
            <form action="" method="post">
                <p>Add Lesson</p>
                <label for="password">Course Name</label>
                <input type="text" name="lname" required>
                <label for="password">Create Course Code</label>
                <input type="text" name="ccode" required>
                <input type="submit" name="submit" id="button" value="Save"><br><br>
            </form>
        </div>
        </div>
        <div class="show_lessons">
            <h3>Your Courses:</h3>
            
            <?php
            
            $result = mysqli_query($conn, "select * from course where instructorId  = '$id' ");
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($row["courseName"])) {
                        echo "<div>";
                        echo "<div>";
                        echo "Course Name: ";
                        echo $row["courseName"];
                        echo "</div>";
                        echo "<div>";
                        echo "Course Code: ";
                        echo $row["courseCode"];
                        echo "Course Code: ";
                        echo $row["courseCode"];
                        echo "</div>";
                        echo "<div>";
                        ?>
                         <form action="course_addExam.php" method="POST">             
                <input type="hidden" name="courseId" value="<?php echo $row["courseId"] ?>">
                <button style="margin-top:5px;">Add Exam </button>
            

            </form>
            <form action="see_lessonStudent_Instructor.php" method="post"> 
                <input type="hidden"  name="courseId" id="courseId" value=<?php echo $row["courseId"]?>>
                <button style="margin-top:5px;">Who takes lesson</button>

                  </form>
                 
            <form action="delete_lesson_instructor.php" method="post"> 
                <input type="hidden"  name="courseId" id="courseId" value=<?php echo $row["courseId"]?>>
                <button style="margin-top:5px;">Delete Lesson </button>
                <br><br> 

            </form>

                        <?php 
                        
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                echo "There is no course.";
            }
            ?>

       
    </div>
</body>

</html>