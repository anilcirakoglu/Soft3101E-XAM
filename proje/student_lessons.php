<?php
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['filter'])) {
    if (isset($_POST['s_one']) && isset($_POST['s_two']) && isset($_POST['s_three'])) {
      

        $true = mysqli_query($conn, "select * from course c JOIN users u on c.instructorId = u.userId where c.iname='$_POST[s_three]' and c.courseCode='$_POST[s_two]' and c.courseName='$_POST[s_one]' ");
        $row_new = mysqli_fetch_assoc($true);
        if (!mysqli_num_rows($true) == 0) {
            echo "Lesson Found and Register.";
            $studentId = $id;
            $instructorId = $row_new['instructorId'];
            $courseId = $row_new['courseId'];
            $adminId = 4;
            $query1 = "INSERT INTO deneme_1.coursestudent values('','$studentId',' $courseId','$instructorId','$adminId')";
            $used=mysqli_query($conn,"SELECT * FROM `coursestudent` WHERE studentId='$_SESSION[id]' and courseId='$courseId'");
            if (mysqli_num_rows($used)>0) {
             echo"<script> alert('already taken course');</script>";
            }
            else {
            mysqli_query($conn, $query1);



        } 
    }
    else {
        echo "No Lesson Found.";
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
    <h3> Courses have taken:</h3>
    <?php
    $id = $_SESSION["id"];
    $result2 = mysqli_query($conn, "select * from coursestudent cs Join course cc on cs.instructorId =cc.instructorId WHERE cs.instructorId=cc.instructorId and cs.courseId=cc.courseId and cs.studentId=$id ");

    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            if (isset($row2["courseName"])) {
                echo "<div>";
                echo "<div>";
                echo "Course Name: ";

                echo $row2["courseName"];
                echo "</div>";
                echo "<div>";
                echo "Course Code: ";
                echo $row2["courseCode"];

                echo "</div>";
                echo "<div>";
                echo "Course Instoctor: ";
                echo $row2["iname"];

                echo "</div>";
                echo "</div>";
                echo "<br>";
                
                
            }?>
            <form action="deleteLesson_byStudent.php" method="post"> 
                <input type="hidden"  name="courseId" id="courseId" value=<?php echo $row2["courseId"]?>>
                <button>Delete Lesson </button>
                <br><br> 

            </form>
           <?php
        }

    } ?>
    <h3>All Courses:</h3>
    <?php
    $result = mysqli_query($conn, "select * from course ");

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

                echo "</div>";
                echo "<div>";
                echo "Course Instoctor: ";
                echo $row["iname"];

                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
            
        }
    } else {
        echo "There is no course.";
    }
    ?>
    <div class="form_div">
        <form action="" method="post">
            <p>Add Lesson</p>
            <label>Course Name/Course Code/Course Instructor:</label>
            <select name="s_one">
                <option value="">Course Name</option>
                <?php
                $sql = mysqli_query($conn, "SELECT  DISTINCT courseName FROM course");
                while ($row = $sql->fetch_assoc()) {
                    echo "<option value='$row[courseName]'>" . $row['courseName'] . "</option>";
                }
                ?>
            </select>
            <select name="s_two">
                <option value="">Course Code</option>
                <?php
                $sql = mysqli_query($conn, "SELECT  DISTINCT  courseCode FROM course");
                while ($row = $sql->fetch_assoc()) {
                    echo "<option value='$row[courseCode]'>" . $row['courseCode'] . "</option>";
                }
                ?>
            </select>
            <select name="s_three">
                <option value="">Course Instoctor</option>
                <?php
                $sql = mysqli_query($conn, "SELECT  DISTINCT iname FROM course");
                while ($row = $sql->fetch_assoc()) {
                    echo "<option value='$row[iname]'>" . $row['iname'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="filter" id="button" value="Save"><br><br>
        </form>
        </div>
</body>

</html>