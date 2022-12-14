<?php
 class AdminSet{
    public function get_data_teacher_byAdmin($id){
        $query="select * from soft3101.teachers where admin_id='$id'  order by id desc";
        $db=new Database();
        $result=$db->read($query);
        if ($result) {
            $row=$result;
            return $row;
        }
        else {
            return false;
        }
    }
    public function get_data_student_byAdmin($id){
        $query="select * from soft3101.students where admin_id='$id' order by id desc ";
        $db=new Database();
        $result=$db->read($query);
        if ($result) {
            $row=$result;
            return $row;
        }
        else {
            return false;
        }
    }
    public function get_data_preTeachers_byAdmin($id){
        $query="select * from soft3101.pre_teachers where admin_id='$id' order by id desc ";
        $db=new Database();
        $result=$db->read($query);
        if ($result) {
            $row=$result;
            return $row;
        }
        else {
            return false;
        }
    }
         
    public function get_id_preTeacher_byAdmin($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from pre_teachers where userid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function get_id_teacher_byAdmin($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from teachers where userid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function get_id_student_byAdmin($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from students where userid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function save_delete_preTeacher_byAdmin($data,$id){
        $db=new Database();
        $sql="DELETE FROM pre_teachers WHERE `pre_teachers`.userid='$id' limit 1";
        $db->save($sql);
    }
    public function save_delete_teacher_byAdmin($data,$id){
        $db=new Database();
        $sql="DELETE FROM teachers WHERE `teachers`.userid='$id' limit 1";
        $db->save($sql);
    }
    public function save_delete_student_byAdmin($data,$id){
        $db=new Database();
        $sql="DELETE FROM students WHERE `students`.userid='$id' limit 1";
        $db->save($sql);
    }
    public function create_approved_teacher($data,$adminid,$userid,$username,$password,$email){
    $db=new Database();
    $query="insert into teachers(userid,username,password,email,admin_id)
    values ('$userid','$username','$password','$email','$adminid')";
    $db->save($query);
    }
}
?>