<?php
 class Teacher{
    public function get_data_teacher($id){
        $query="select * from teachers where userid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
        if ($result) {
            $row=$result[0];
            return $row;
        }
        else {
            return false;
        }
    }
    public function get_user_teacher($id){
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
 
         
 }
?>