<?php
class SettingsTeacher{
    public function get_settings_teacher($id){
        $db=new Database();
        $sql="select * from teachers where userid='$id' limit 1";
        $row=$db->read($sql);
        if (is_array($row)) {
            return $row[0];
        }
    }
    public function save_settings_teacher($data,$id){
        $db=new Database();
        $password=$data['password'];
        if (strlen($password) < 30) {
            if ($data['password']==$data['password2']){
                $data['password']=$password;
            }else {
                unset($data['password']);
            }
        }
        unset($data['password2']);

        $sql="update teachers set ";
        foreach($data as $key => $value){
            $sql .= $key . "='" . $value."',";
        }
        
        $sql=trim($sql,",");
        $sql.="where userid='$id' limit 1";
        $db->save($sql);
    }
    public function get_settings_exam($id){
        $db=new Database();
        $sql="select * from create_exams where examid='$id' limit 1";
        $row=$db->read($sql);
        if (is_array($row)) {
            return $row[0];
        }
    }
    public function save_settings_exam($data,$id){
        $db=new Database();
        $sql="update create_exams set ";
        foreach($data as $key => $value){
            $sql .= $key . "='" . $value."',";
        }
        
        $sql=trim($sql,",");
        $sql.="where examid='$id' limit 1";
        $db->save($sql);
    }
}