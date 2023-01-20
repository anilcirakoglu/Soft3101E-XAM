<?php
session_start();
$host="127.0.0.1";
 $user="root";
 $password="";
 $db="deneme_1";
$conn= mysqli_connect($host,$user,$password,$db);
if($conn -> connect_errno){
    echo "Can not connect to db".$conn->connect_errno;
    exit();


}else{
}

?>