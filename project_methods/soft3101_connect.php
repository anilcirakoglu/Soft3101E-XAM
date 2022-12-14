<?php
class Database 
{
private $host="127.0.0.2";
private $user="root";
private $password="";
private $db="Soft3101";

 function connect(){
    $connection= mysqli_connect($this->host,$this->user,$this->password,$this->db);
    return $connection;
 }

 function read($query){
    $conn=$this->connect();
    $result=mysqli_query($conn,$query);
    if (!$result) {
      return false;
   }
   else{
     $data=false;
     while ($row = mysqli_fetch_assoc($result)) {
      $data[]=$row;
     }
     return $data;
   }
 }
 function save($query){
   $conn=$this->connect();
   $result=mysqli_query($conn,$query);
   if (!$result) {
      return false;
   }
   else{
      return true;
   }
 }
}
?>