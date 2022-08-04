<?php

require_once 'db/connection.php';

//get info from html
$value=$_POST['value'];
$restaurant_id=$_POST['id'];


$sql="update enterprises set del_commision = ".$value." where id = ".$restaurant_id;
$stmt = mysqli_prepare($conn, $sql);


if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    header("location: stats.php?$restaurant_id");
}
else{
    header("location: training.php?$restaurant_id");
}


?>