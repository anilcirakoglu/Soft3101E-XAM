<?php

class LoginTeacher{
    private $error= "";
    public function evaluate_teacher($data)
{
    $username=addslashes( $data['username']);  
    $password=addslashes( $data['password']);
    $query="select * from teachers where username='$username' limit 1";
    $db=new Database();
    $result=$db->read($query);
    if ($result) {
        $row=$result[0];
        if ($password==$row['password']) {
            
            $_SESSION['mybook_userid']= $row['userid'];
        }
        else {
            $this->error.="wrong username or password<br>";
        }
    }
    else {
     $this->error.="wrong username or password <br>";
    }
        return $this->error;
}
private function hash_text($text){
    $text=hash("sha1",$text);
    return $text;
}


public function check_login_teacher($id,$redirect=true)
{
    if (is_numeric($id))
    {
    $query="select * from soft3101.teachers where userid='$id' limit 1";
    $db=new Database();
    $result=$db->read($query);
if ($result) {
    $user_data=$result[0];
    return $user_data;
}
else {
    if ($redirect) {
        header("Location: soft3101_login_teacher.php");
     die;
    }else {
        $_SESSION['mybook_userid']=0;
    }
   
}

}else {
    if ($redirect) {
        header("Location: soft3101_login_teacher.php");
     die;
}else {
    $_SESSION['mybook_userid']=0;
}
}
}
}
?>