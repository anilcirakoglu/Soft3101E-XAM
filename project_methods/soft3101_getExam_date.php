<?php
Class getExamDate{
    function get_exam_date($id){
        $id=addslashes($id);
        $db=new Database();
        $query="select * from soft3101.create_exams where examid='$id' limit 1";
        return $db->read($query);
    }
   
}
class examid{
    public function get_data_exam($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from create_exams where examid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function get_exam_teacher($id){
        $query="select * from create_exams where examid='$id' limit 1";
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