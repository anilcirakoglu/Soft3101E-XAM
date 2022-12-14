<?php
class AddLesson{
    
    public $error="";
  
    public function create_lesson($creator_id, $data,$creator_name){
       
        if (!empty($data['lesson_name'])) {
          
            $lesson_name=addslashes($data['lesson_name']); 

            if ($this->error =="") {
                
            
            $lessonid=$this->create_lessonid();
            $db=new Database();
            $query="insert into lessons(lessonid,lesson_name,creator_id,creator_name)
            values('$lessonid','$lesson_name','$creator_id','$creator_name')";
           
            $db->save($query);
       
        }
        return $this->error;
    }
}
    
    public function get_lesson($id){

        $query="select * from lessons where creator_id='$id' order by id desc ";
        $db=new Database();
        $result=$db->read($query);

        if ($result) {
            return $result;
        }
        else {
            return false;
        } 
    }
  public function lesson_taker($taker_id,$taker_name,$data,$creator_name,$creator_id,$lesson_name,$lessonid){

        $db=new Database();
        $query="insert into lesson_takers(taker_id,taker_name,creator_name,creator_id,lesson_name,lessonid)
        values('$taker_id','$taker_name','$creator_name','$creator_id','$lesson_name','$lessonid')";
       
        $db->save($query);
   
    }
    public function get_lesson_student($id){
        
        $query="select * from lesson_takers where taker_id='$id' order by id desc ";
        $db=new Database();
        $result=$db->read($query);

        if ($result) {
            return $result;
        }
        else {
            return false;
        } 
    }
    public function get_data_taker_lesson($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from lesson_takers where lessonid='$id' ";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    
    
    public function get_data_lesson($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from lessons where lessonid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function save_delete_lesson_byStudent($data,$id){
        $db=new Database();
        $sql="DELETE FROM lesson_takers WHERE `lesson_takers`.lessonid='$id' limit 1";
        $db->save($sql);
    }
    public function save_delete_lesson_byTeacher($data,$id){
        $db=new Database();
        $sql="DELETE FROM lessons WHERE `lessons`.lessonid='$id' limit 1";
        $db->save($sql);
    }
    public function i_own_lesson($lessonid,$mybook_userid){
        $lessonid=addslashes($lessonid);
        if (!is_numeric($lessonid)) {
            return false;
        }
        $query="select * from soft3101.lessons where lessonid='$lessonid' limit 1";
        $db=new Database();
        $result=$db->read($query);
 
        if (is_array($result)) {
            if ($result[0]['userid']==$mybook_userid) {
                return true;
            }
        }
           return false;
    }
    private function create_lessonid(){
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