<?php
include("includes/templates/header.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        main{width: 90%; margin: auto;}

    </style>
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

    
    <div class="card-group" >
        <?php

        while($row = mysqli_fetch_assoc($result))
        {
            echo ' 
            <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="card-title">'.$row['name'].'</h4>'.'
                <div class="img-container">               
                    <img class="card-img-bottom" src="images/'.$row['img'].'">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="includes/stats.php?'.$row['id'].'"  class="btn btn-sm btn-outline-secondary">לצפייה ועדכון פרטי רשת</a></div>
                    <p><small class="text-muted">'.$row['venues_num'].'</small></p>
                </div>
            </div>
            </div>
        ';
        }
        ?>
    </div>

</main>
<script>
    var buttonUp = () => {
        const input = document.querySelector(".searchbox-input");
        const cards = document.getElementsByClassName("card");
        let filter = input.value.toString().toLowerCase();
        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector(".card-title").innerText.toString().toLowerCase();
            if (title.indexOf(filter) > -1) {
                cards[i].classList.remove("d-none")
            } else {
                cards[i].classList.add("d-none")
            }
        }
    }
</script>


</body>
<?php
include("includes/templates/footer.php");
?>
</html>
