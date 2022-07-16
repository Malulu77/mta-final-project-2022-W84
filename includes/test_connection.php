<?php
$server_name="db";
$user_name="root";
$password="admin";
$database_name="amitml_deni_avdija";
//create connection
$conn=new mysqli($server_name,$user_name,$password,$database_name);

//check the connection
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

?>