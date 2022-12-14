<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soft3101_teacher_content_settings.css">
</head>
<body>
<div class="settings">
<div class="settingsiki" style="">
    <form action=""method="post"enctype="multipart/form-data" id="settingsForm">
<?php
$setting_class=new SettingsTeacher();

$settings=$setting_class->get_settings_teacher($_SESSION['mybook_userid']);
if (is_array($settings)) { 
    echo"<p id='textbox' style='text-align:center;'>-You can change your informations-</p>";
    echo"<p id='textbox'>Username:</p>";
    echo"<input type='text' id='textbox' name='username' value='".htmlspecialchars($settings['username'])."' placeholder='username'/>";
    echo"<p id='textbox'>Email:</p>";
echo"<input type='text' id='textbox' name='email' value='".htmlspecialchars($settings['email'])."' placeholder='email'/>";
echo"<p id='textbox'>Password:</p>";
echo"<input type='password' id='textbox' name='password' value='".htmlspecialchars($settings['password'])."' placeholder='password'/>";
echo"<p id='textbox'>Again Password:</p>";
echo"<input type='password' id='textbox' name='password2' value='".htmlspecialchars($settings['password'])."' placeholder='password'/>";
echo"<input id='saveChange_button' type='submit' value='SAVE'>";
}

?>
 </form>
</div>
</div>
</body>
</html>