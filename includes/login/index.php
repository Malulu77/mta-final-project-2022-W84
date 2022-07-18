<?php

$server_name="localhost";
$user_name="isamitml_admin";
$password="iG_W7XXnV!8U";
$database_name="isamitml_db";


//create connection
$conn=new mysqli($server_name,$user_name,$password,$database_name);

//check the connection
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
?>