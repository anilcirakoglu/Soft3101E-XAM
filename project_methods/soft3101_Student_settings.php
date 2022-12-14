<?php
class SettingsStudent{
    public function get_settings_student($id){
        $db=new Database();
        $sql="select * from students where userid='$id' limit 1";
        $row=$db->read($sql);
        if (is_array($row)) {
            return $row[0];
        }
    }
    public function save_settings_student($data,$id){
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

        $sql="update students set ";
        foreach($data as $key => $value){
            $sql .= $key . "='" . $value."',";
        }
        
        $sql=trim($sql,",");
        $sql.="where userid='$id' limit 1";
        $db->save($sql);
    }
}