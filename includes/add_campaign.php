<?php

require_once 'db/connection.php';

//get info from html
$name=$_POST['name'];
$id=$_POST['id'];
$main_tag=$_POST['main_tag'];
$rating=$_POST['rating'];
$starts_at=$_POST['starts_at'];
$ends_at=$_POST['ends_at'];
$status=$_POST['status'];


$sql="insert into campaigns(name, id, main_tag, rating, starts_at, ends_at, status) values ('$name', '$id', '$main_tag', '$rating', '$starts_at', '$ends_at', '$status')";
$stmt = mysqli_prepare($conn, $sql);


if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    header("location: campaigns.php?success");
}
else{
    header("location: campaigns.php?error");
}


?>