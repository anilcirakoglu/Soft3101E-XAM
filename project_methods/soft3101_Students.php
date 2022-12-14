<?php
 class Student{
    public function get_data_student($id){
        $query="select * from students where userid='$id' limit 1";
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
    public function get_user_student($id){
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
 
         
 }
?>