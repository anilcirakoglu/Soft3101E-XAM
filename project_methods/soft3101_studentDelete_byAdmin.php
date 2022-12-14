
<?php
session_start();
include("soft3101_connect.php");
include("soft3101_loginset_admin.php");
include("soft3101_admin.php");
include("soft3101_Admin_getProfile.php");
include("soft3101_Admin_settings.php"); 
include("soft3101_admin_setMethods.php");

$login=new LoginAdmin();
$_SESSION['mybook_userid']=isset($_SESSION['mybook_userid'])?$_SESSION['mybook_userid']:0;
$user_data=$login->check_login_admin($_SESSION['mybook_userid'],false);

$USER=$user_data;
if (isset($_GET['id'])) {
    $profile=new ProfileAdmin();
    $profile_data=$profile->get_profile_admin($_GET['id']);
    
        if (is_array($profile_data)) {
            $user_data = $profile_data[0];
        }
}

$delete_teacher=new AdminSet();
$ERROR="";
$ROWW=false;
if (isset($_GET['id'])){
    $ROWW=$delete_teacher->get_id_student_byAdmin($_GET['id']);
  }else {
      $ERROR="No student was found!";
  }
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $delete_class=new AdminSet();
    $delete_class->save_delete_student_byAdmin($_POST,$ROWW['userid']);
    if ($result == "") {
        header("Location: soft3101_adminPage.php?");
        die;
    }
    else {
        echo"<div style='text-align:center;font-size:12px;color:red;bacground-color:white;margin-top:104px;'>";
        echo"Please fill the empty places:<br><br>";
        echo $result;
        echo"</div>";
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
    <link rel="stylesheet" href="soft3101_exam_changeDate.css">
</head>
<body>
    <div>
<form action=""method="post"enctype="multipart/form-data" id="settingsForm">
<?php
echo"<div class='changeDate_table'>";
echo"<p id='textbox'>Are you sure want to delete this student ?</p>";
echo"<input id='saveChange_button' type='submit' value='Yes'>";
echo"</div>";
?>
 </form>
</div>
</body>
</html>