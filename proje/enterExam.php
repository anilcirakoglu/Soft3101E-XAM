<?php 
include('db_connect.php');
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from deneme_1.users where userId=$id");
    $row = mysqli_fetch_assoc($result);
}


echo $_POST["courseId"]   



?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <div class="top">
        <ul>
            <li><a href="studentPage.php" target="_self">Logo</a></li>
            <li><a href="student_results.php" target="_self">Results</a></li>
            <li><a href="student_exams.php" target="_self">Exams</a></li>
            <li><a href="student_lessons.php" target="_self">Lessons</a></li>
            <li><a href="student_settings.php" target="_self">Settings</a></li>
            <li><a href="logout.php" target="_self">Logout</a></li>
        </ul>
    </div>
    <h3> aldığın sınavlar:</h3>
    <?php
    $id = $_SESSION["id"];
    $result2 = mysqli_query($conn, "SELECT DISTINCT e.instructorId,e.adminId,e.examID,e.eName,e.eDate,e.courseId,e.examQuestion from coursestudent cs JOIN exam  e ON cs.courseId=e.courseId where cs.studentId=$id");

    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            if (isset($row2["eName"])) {
                echo "<div>";
                echo "<div>";
                echo "Exam Name: ";

                echo $row2["eName"];
                echo "<br>";
                echo "Exam date: ";
                echo $row2["eDate"];
                 echo "<br>";
                echo $row2["examID"];
                


            
            ?>
            <form action="nowexam.php" method="post"> 
   <input type="hidden"  name="courseId" id="courseId" value=<?php echo $row2["examID"]?> >
   <button>Enter exam</button>

     </form>
    
           <?php
           }
        }
        
    }

    
    ?>
         
           
    
       

</body>

</html>