<?php
class SignupTeacher{
private $error="";
public function evaluate_teacher($data)
{
    foreach ($data as $key => $value) {
       
        if (empty($value)) {
            $this->error= $this->error . $key . "is empty!<br>";
        }
        $e="select username from soft3101.pre_teachers where email='$data[email]' ";
        $db=new Database();
        $resultstwo=$db->read($e);
        if ($key=="email") {
            if (($resultstwo)>0) {
                $this->error= $this->error . "email already exists !<br>";
            
            }
            if (!preg_match("/([\w\-}+\@{\w\-]+\.[\w\-]+)/",$value)) {
                $this->error= $this->error . "invalid email address  !<br>";
            }
        } 
        $u="select username from soft3101.pre_teachers where username='$data[username]' ";
        $db=new Database();
        $results=$db->read($u);
       
        if ($key=="username") {
            if (($results)>0) {
                $this->error= $this->error . "username already exists !<br>";
            
            }
            if (is_numeric($value)) {
                $this->error= $this->error . "username can't have number  !<br>";
            }
            if (strstr($value, " ")) {
                $this->error= $this->error . "username can't have spaces   !<br>";
            }
        }
    }
    $db=new Database();
    $data['userid']=$this->create_userid_teacher();    
    if ($this->error=="") {
        $this->create_user_teacher($data,"666666");
    }
    else {
        return  $this->error;
    }
}
public function create_user_teacher($data,$adminid)
{
    $username=$data['username'];  
    $password=$data['password'];
    $email=$data['email'];
    $userid=$data['userid'];
    $query="insert into pre_teachers(userid,username,password,email,admin_id)
    values ('$userid','$username','$password','$email','$adminid')";
    $db=new Database();
    $db->save($query);
}
 private function create_userid_teacher(){
    $length= rand(4,19);
    $number="";
    for ($i=0; $i < $length; $i++) { 
        $new_rand=rand(0,9);
        $number=$number .$new_rand;
    }
    return $number;
 }
}
?>