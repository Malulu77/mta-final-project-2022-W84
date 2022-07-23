<?php

// to use db locally replace localhost with 172.24.2.2
$server_name = "172.24.2.2";
$db_user_name = "isamitml_user";
$db_password = "iG_W7XXnV!8U";
$database_name = "isamitml_db2";

//create connection
$conn = mysqli_connect($server_name, $db_user_name, $db_password, $database_name);

//check the connection
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}