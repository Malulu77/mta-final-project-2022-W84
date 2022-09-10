<?php
include("includes/templates/header.php");
include("includes/notifications.php");
require_once 'includes/db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
$sql = "SELECT * FROM enterprises;";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
?>
<!doctype html>
<html dir="rtl" lang="he">
<head>

    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="/style/style.css" rel="stylesheet" />
    <link href="/style/index.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/includes/index.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>



</head>
<body>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5" dir="rtl">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">ממשק ניהול רשתות</h1>
            </div>
        </div>
        <input type="search" placeholder="חיפוש מהיר.." name="search" class="form-control searchbox-input" required onkeyup="buttonUp();">
    </section>
    <div class="card-deck">
        <?php

        while($row = mysqli_fetch_assoc($result))
        {
            echo ' 
            <div class="card shadow-lg" style="display: flex; display: inline-block;">
                <div class="card-body">
                    <h4 class="card-title">'.$row['name'].'</h4> 
                    <div class="con-tooltip top">כמות סניפים
                            <div class="tooltip ">
                                <p><b>'.$row['venues_num'].'</b></p>
                            </div>
                        </div>         
                    <div class="img-container">               	
                    <img class="card-img-bottom" src="images/'.$row['img'].'">	
                </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="includes/stats.php?'.$row['id'].'" class="button-10">לצפייה ועדכון פרטי רשת</a>
                            
                        
                    </div>
                </div>
            </div>
        ';
        }
        ?>
    </div>
</main>

</body>
<?php
include("includes/templates/footer.php");
?>
</html>