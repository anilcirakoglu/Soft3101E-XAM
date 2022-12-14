<?php
class AddExam{
    
    public $error="";
  
    public function create_exam($creator_id, $data,$creator_name,$lessonid,$lesson_name){
       
        if (!empty($data['exam_name'])) {
          
            $exam_name=addslashes($data['exam_name']); 
            $exam_date_hour=addslashes($data['exam_date_hour']); 
            $exam_date_day=addslashes($data['exam_date_day']); 
            $exam_date_month=addslashes($data['exam_date_month']); 
            $exam_date_year=addslashes($data['exam_date_year']); 
            $exam=addslashes($data['exam']); 
            if ($this->error =="") {
                
            
            $examid=$this->create_examid();
            $db=new Database();
            $query="insert into create_exams(examid,exam_name,creator_id,exam_date_hour,exam_date_day,exam_date_month,exam_date_year,exam,creator_name,lessonid,lesson_name)
            values('$examid','$exam_name','$creator_id','$exam_date_hour','$exam_date_day','$exam_date_month','$exam_date_year','$exam','$creator_name','$lessonid','$lesson_name')";
           
            $db->save($query);
       
        }
        return $this->error;
    }
}
    
    public function get_exam($id){

        $query="select * from create_exams where creator_id='$id' order by id and lesson_name desc ";
        $db=new Database();
        $result=$db->read($query);

        if ($result) {
            return $result;
        }
        else {
            return false;
        } 
    }
    public function get_exam_byStudent($id){
        
            $query="select * from exam_takers where taker_id='$id' order by id desc ";
            $db=new Database();
            $result=$db->read($query);
    
            if ($result) {
                return $result;
            }
            else {
                return false;
            } 
        }
        public function finish_exam($taker_id,$data,$taker_name,$creator_name,$creator_id,$exam_name,$examid,$exam,$lesson_name){
         
            if (!empty($data['exam_solution'])) {
            $exam_solution=addslashes($data['exam_solution']); 
          if ($this->error =="") {
                
          $db=new Database();
          $query="insert into exams(taker_id,taker_name,creator_name,creator_id,exam_name,examid,exam,exam_solution,lesson_name)
          values('$taker_id','$taker_name','$creator_name','$creator_id','$exam_name','$examid','$exam','$exam_solution','$lesson_name')";
         
          $db->save($query);
        }
        return $this->error;
    }
          }
          public function get_creator_finishExam($id){

            $query="select * from exams where creator_id='$id' order by id desc ";
            $db=new Database();
            $result=$db->read($query);
    
            if ($result) {
                return $result;
            }
            else {
                return false;
            } 
        }
        public function get_taker_finishExam($id){

            $query="select * from exams where taker_id='$id' order by id desc ";
            $db=new Database();
            $result=$db->read($query);
    
            if ($result) {
                return $result;
            }
            else {
                return false;
            } 
        }
        public function get_exam_answer_of_student($id){
            $id=addslashes($id);
            if (!is_numeric($id)) {
                return false;
            }
            $query="select * from exams where examid='$id' limit 1";
            $db=new Database();
            $result=$db->read($query);
    
            if ($result) {
                return $result[0];
            }
            else {
                return false;
            } 
        }
        public function save_exam_answer($data,$point,$id){
            $point=addslashes($data['point']); 
            $db=new Database();
            $sql="update exams
            SET score='$point'
            where examid='$id' limit 1";
            $db->save($sql);
        }
        
    public function exam_taker($taker_id,$taker_name,$data,$creator_name,$creator_id,$exam_name,$examid,$lessonid,$lesson_name,$exam,$exam_date_hour,$exam_date_day,$exam_date_month,$exam_date_year){
  
          $db=new Database();
          $query="insert into exam_takers(taker_id,taker_name,creator_name,creator_id,exam_name,examid,lessonid,lesson_name,exam,exam_date_hour,exam_date_day,exam_date_month,exam_date_year)
          values('$taker_id','$taker_name','$creator_name','$creator_id','$exam_name','$examid','$lessonid','$lesson_name','$exam','$exam_date_hour','$exam_date_day','$exam_date_month','$exam_date_year')";
         
          $db->save($query);
     
      }
      public function get_data_taker_exam($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from exam_takers where examid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function get_data_taker_exam_bylessonid($id){
        $id=addslashes($id);
        if (!is_numeric($id)) {
            return false;
        }
        $query="select * from exam_takers where lessonid='$id' limit 1";
        $db=new Database();
        $result=$db->read($query);
       
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        } 
    }
    public function save_delete_exam_byTeacher($data,$id){
        $db=new Database();
        $sql="DELETE FROM create_exams WHERE `create_exams`.examid='$id' limit 1";
        $db->save($sql);
    }
    
    public function save_delete_exam_byStudent($data,$id){
        $db=new Database();
        $sql="DELETE FROM exam_takers WHERE `exam_takers`.lessonid='$id' limit 1";
        $db->save($sql);
    }
    public function i_own_exam($examid,$mybook_userid){
        $examid=addslashes($examid);
        if (!is_numeric($examid)) {
            return false;
        }
        $query="select * from soft3101.create_exam where examid='$examid' limit 1";
        $db=new Database();
        $result=$db->read($query);
 
        if (is_array($result)) {
            if ($result[0]['userid']==$mybook_userid) {
                return true;
            }
        }
           return false;
    }
    private function create_examid(){
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