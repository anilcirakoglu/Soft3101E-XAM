<?php
class SettingsAdmin{
    public function get_settings_admin($id){
        $db=new Database();
        $sql="select * from admin where userid='$id' limit 1";
        $row=$db->read($sql);
        if (is_array($row)) {
            return $row[0];
        }
    }
    public function save_settings_admin($data,$id){
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

        $sql="update admin set ";
        foreach($data as $key => $value){
            $sql .= $key . "='" . $value."',";
        }
        
        $sql=trim($sql,",");
        $sql.="where userid='$id' limit 1";
        $db->save($sql);
    }
   
}