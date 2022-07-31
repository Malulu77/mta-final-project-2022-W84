<?php

require_once 'db/connection.php';

//get info from html
$name=$_POST['name'];
$date=$_POST['date'];
$type=$_POST['type'];
$restaurant_id=$_POST['enterprises'];

//add donation
$sql="insert into trainings(name, type, date, restaurant_id) values ('$name', '$type', '$date', '$restaurant_id')";
$stmt = mysqli_prepare($conn, $sql);
mysql_query("SET NAMES 'utf8'");
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

?>