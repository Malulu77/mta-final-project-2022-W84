<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'isamitml_admin');
define('DB_PASSWORD', 'iG_W7XXnV!8U');
define('DB_NAME', 'isamitml_db');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>