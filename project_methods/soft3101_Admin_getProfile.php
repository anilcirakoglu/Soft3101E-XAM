<?php
Class ProfileAdmin{
    function get_profile_admin($id){
        $id=addslashes($id);
        $db=new Database();
        $query="select * from soft3101.admin where userid='$id' limit 1";
        return $db->read($query);
    }
}