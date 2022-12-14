<?php
 class Admin{
    public function get_data_admin($id){
        $query="select * from admin where userid='$id' limit 1";
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
    public function get_user_admin($id){
        $query="select * from admin where userid='$id' limit 1";
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