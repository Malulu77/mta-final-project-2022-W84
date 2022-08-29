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
    <script> $(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           // ajax call get data from server and append to the div
    }
    });
    </script>

    <style>

        body{
            background-image:url("../images/bk-image.jpg");
            background-attachment: fixed;


        }
         main{
            margin:auto;
            width: 100%; 

        }
        .card{
            margin-top: 2%;
            margin-bottom: 2%;
            margin-left: 2%;
            display: inline;
            width: 30%;
        }

        @media (max-width:900px) {
            .card {
            display: block;
            width: 90%;
            }
        }
        @media (min-width:2060px) {
            .card {
            width: 15%;
            }
            .card-deck{
                margin-right:12%;

            }
        }

        @media (max-width:2060px) {

            .card-deck{
                margin-right:7%;

            }        }



        @media (max-width:100px) {
            .card-group {
            display: flex;
            flex-flow: row wrap;
        }
        }

        .card-title{
        text-align: left;
        }


        .card-img,
        .card-img-bottom,
        .card-img-top {
        width: 70%;
        height: 97%;
        margin: auto;
        display: block; 
        }

        .img-container {
        width: 100%;
        height: 300px;
        }
    
        .card-deck{
            width:90%;
            margin-right:5%:
        
        }

        .searchbox-input{
            width: 100%;
        }


        .button-10 {
          display: flex;
          flex-direction: column;
          align-items: center;
          padding: 6px 14px;
          font-family: -apple-system, BlinkMacSystemFont, 'Roboto', sans-serif;
          border-radius: 6px;
          border: none;
          width:100%;
          margin-top:5%;
        
          color: #fff;
          background: linear-gradient(180deg, #4B91F7 0%, #367AF6 100%);
           background-origin: border-box;
          box-shadow: 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2);
          user-select: none;
          -webkit-user-select: none;
          touch-action: manipulation;
        }

        .button-10:focus {
          box-shadow: inset 0px 0.8px 0px -0.25px rgba(255, 255, 255, 0.2), 0px 0.5px 1.5px rgba(54, 122, 246, 0.25), 0px 0px 0px 3.5px rgba(58, 108, 217, 0.5);
          outline: 0;
        }

        .button-10:hover{
            opacity: 70%;
        }

        .con-tooltip{
            background-color:#E8E8E8;
            border-radius: 50%;
            width:70px;
            height:70px;
            text-align:center;
            float:right;
            margin:auto;
            padding: 6px 3px 0 3px;
            position: relative;                
            display: inline-block;  
            clear:both;   


        }

        .tooltip {
        visibility: hidden;
        z-index: 1;
        opacity: .40;
        width: auto;
        padding: 0px 20px;
        background: gray;
        position: absolute;
        top:-100%;
        border-radius: 9px;        
        transform: translateY(9px);
        transition: all 0.3s ease-in-out;
        font-size: 22px;
        font-weight: bold;
        box-shadow: 0 0 3px rgba(56, 54, 54, 0.86);
        color:white;
        
        }
        
        
        /* tooltip  after*/
        .tooltip::after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 12px 12.5px 0 12.5px;
        border-color: gray transparent transparent transparent;
        position: absolute;
        left: 32%;
        
        }
        
        .con-tooltip:hover .tooltip{
        visibility: visible;
        transform: translateY(-10px);
        opacity: 1;
          transition: .3s linear;
        animation: odsoky 1s ease-in-out infinite  alternate;
        
        }
        @keyframes odsoky {
        0%{
          transform: translateY(6px); 
        }
        
        100%{
          transform: translateY(1px); 
        }
        
        }






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