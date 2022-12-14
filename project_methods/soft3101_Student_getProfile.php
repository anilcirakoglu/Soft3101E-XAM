<?php
Class ProfileStudent{
    function get_profile_student($id){
        $id=addslashes($id);
        $db=new Database();
        $query="select * from soft3101.students where userid='$id' limit 1";
        return $db->read($query);
    }
}