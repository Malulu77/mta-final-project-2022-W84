<?php

require_once 'db/connection.php';

//get info from html
$id=$_POST['id'];
$name=$_POST['name'];
$main_tag=$_POST['main_tag'];
$rating=$_POST['rating'];
$starts_at=$_POST['starts_at'];
$ends_at=$_POST['ends_at'];
$status=$_POST['status'];


try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO campaigns(id, name, main_tag, rating, starts_at, ends_at, status)
    VALUES ( '$id', '$name', '$main_tag', '$rating', '$starts_at', '$ends_at', '$status')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;


// $sql="insert into campaigns(id, name, main_tag, rating, starts_at, ends_at, status) values ( '$id', '$name', '$main_tag', '$rating', '$starts_at', '$ends_at', '$status')";
// $stmt = mysqli_prepare($conn, $sql);

// if (mysqli_stmt_execute($stmt)) {
//     mysqli_stmt_store_result($stmt);
//     header("location: campaigns.php?success");
//     echo($id);


// }
// else{
//     header("location: campaigns.php?error");
//     echo($id);

// }


?>