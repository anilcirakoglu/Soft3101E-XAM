<?php

class Login{
    private $error= "";
    public function evaluate($data)
{
    $username=addslashes( $data['username']);  
    $password=addslashes( $data['password']);
    $query="select * from users where username='$username' limit 1";
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

public function check_login($id,$redirect=true)
{
    if (is_numeric($id))
    {
    $query="select * from users where userid='$id' limit 1";
    $db=new Database();
    $result=$db->read($query);
if ($result) {
    $user_data=$result[0];
    return $user_data;
}
else {
    if ($redirect) {
        header("Location: soft3101_login.php");
     die;
    }else {
        $_SESSION['mybook_userid']=0;
    }
   
}

}else {
    if ($redirect) {
        header("Location: soft3101_login.php");
     die;
}else {
    $_SESSION['mybook_userid']=0;
}
}
}
}
?>