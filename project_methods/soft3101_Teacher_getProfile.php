<?php
Class ProfileTeacher{
    function get_profile_teacher($id){
        $id=addslashes($id);
        $db=new Database();
        $query="select * from soft3101.teachers where userid='$id' limit 1";
        return $db->read($query);
    }
}