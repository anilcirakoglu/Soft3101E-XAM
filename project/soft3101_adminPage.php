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

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST["username"])) {
        
        $settings_class=new SettingsAdmin();
        $settings_class->save_settings_admin($_POST,$_SESSION['mybook_userid']);
    }
}
    if (isset($_GET['id'])) {
        $profile=new ProfileAdmin();
        $profile_data=$profile->get_profile_admin($_GET['id']);
        
            if (is_array($profile_data)) {
                $user_data = $profile_data[0];
            }
}
$id=$user_data['userid'];
$teacherset=new AdminSet();
$seeteachers=$teacherset->get_data_teacher_byAdmin($id);
$studentset=new AdminSet();
$seestudents=$studentset->get_data_student_byAdmin($id);
$teacher_approval=new AdminSet();
$approvals=$teacher_approval->get_data_preTeachers_byAdmin($id);
$user=new Admin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="soft3101_adminPage.css">
</head>
<body>
<nav class="mobile-nav">
<a href="soft3101_login.php" >Logout</a>
    </nav>
    <nav>
<div class="first_container">   
    <p>LOGO</p>
<div class="menu">
<a href="soft3101_login.php" >Logout</a>
        </div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
</button>
</div>
    </nav>

    <div class="middle">
        <div class="namePart">
           
    <h2 id="namecollumn"> 
        <?php echo $user_data['username'] ?>
    </h2>
        </div>

        <div class="emailPart">
        <?php echo "(".$user_data['email'].")" ?>
        </div>
<div class="quick_selectionPart">
    <ul>
        <li><a href="soft3101_adminPage.php?section=approval&id=<?php echo $user_data['userid']?>">Profile Approval</a></li>
        <li><a href="soft3101_adminPage.php?section=delete_students&id=<?php echo $user_data['userid']?>">Delete Students</a></li>
        <li><a href="soft3101_adminPage.php?section=delete_teachers&id=<?php echo $user_data['userid']?>">Delete Teachers</a></li>
        <li><a href="soft3101_adminPage.php?section=settings&id=<?php echo $user_data['userid']?>">Settings</a></li>
    </ul>
</div>

<?php
    $section="approval";
    if (isset($_GET['section'])) {
        $section=$_GET['section'];
    }
    if ($section=="approval") {
        include("soft3101_admin_content_approvals.php");
    }
    elseif ($section=="delete_students") {
        include("soft3101_admin_content_delete_students.php");
    }
    elseif ($section=="delete_teachers") {
        include("soft3101_admin_content_delete_teachers.php");
    }
    elseif ($section=="delete_more") {
        include("soft3101_admin_content_delete_more.php");
    }
    elseif ($section=="settings") {
       include("soft3101_admin_content_settings.php");
    }
    ?>
    </div>
<script src="navbar.js"></script>
</body>
</html>