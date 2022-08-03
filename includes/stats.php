<?php
include("templates/header.php");
require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}

$enterprise_id = $_SERVER['QUERY_STRING'];
echo $enterprise_id;
$sql_current = "SELECT * FROM enterprises where id = ".$enterprise_id;
$result_current = mysqli_query($conn, $sql_current);
$row_current = mysqli_fetch_assoc($result_current);

$sql = "SELECT * FROM enterprises";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
?>
<!doctype html>
<html dir="rtl" lang="he">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/assets/dist/css/dashboard.rtl.css" rel="stylesheet">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="../dashboard/dashboard.rtl.css" rel="stylesheet" />

	
</head>
<body>


<div class="container-fluid" dir="rtl">
<div class="row">

    <pre id="content" style="white-space: pre-wrap;"></pre>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

            <ul class="nav flex-column">
                <?php

                while($row = mysqli_fetch_assoc($result))
                {
                    $active = '';
                    if($row_current['id'] == $row['id']){
                        $active='active';}

                    echo '<li class="nav-item">
                    <a class="nav-link '.$active.'" href="stats.php?'.$row['id'].'">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 297.653 297.653" style="enable-background:new 0 0 297.653 297.653;" xml:space="preserve">
<g>
	<path d="M38.167,66.826c-3.271,0-5.996,1.966-7.236,4.778c-0.964-3.336-3.993-5.778-7.639-5.778c-3.647,0-6.696,2.442-7.66,5.778   c-1.24-2.812-4.205-4.778-7.475-4.778c-4.418,0-8.156,3.582-8.156,8v37.363c0,9.714,7,18.017,15,21.223v106.414   c0,4.418,3.582,8,8,8s8-3.582,8-8V133.411c9-3.206,15-11.509,15-21.222V74.826C46,70.408,42.584,66.826,38.167,66.826z"/>
	<path style="fill:#B4EBDD;" d="M151.332,65.492C105.383,65.492,68,102.876,68,148.826s37.383,83.334,83.332,83.334   c45.95,0,83.334-37.384,83.334-83.334S197.282,65.492,151.332,65.492z M151.332,216.159c-37.126,0-67.331-30.205-67.331-67.333   s30.205-67.333,67.331-67.333c37.128,0,67.333,30.205,67.333,67.333S188.46,216.159,151.332,216.159z"/>
	<path d="M151.332,49.492C96.56,49.492,52,94.053,52,148.826s44.56,99.334,99.332,99.334c54.772,0,99.334-44.561,99.334-99.334   S206.104,49.492,151.332,49.492z M151.332,232.16C105.383,232.16,68,194.777,68,148.826s37.383-83.334,83.332-83.334   c45.95,0,83.334,37.384,83.334,83.334S197.282,232.16,151.332,232.16z"/>
	<path style="fill:#FFFFFF;" d="M151.332,97.493c-28.304,0-51.331,23.028-51.331,51.333s23.027,51.333,51.331,51.333   c28.305,0,51.333-23.028,51.333-51.333S179.637,97.493,151.332,97.493z"/>
	<path d="M151.332,81.493c-37.126,0-67.331,30.205-67.331,67.333s30.205,67.333,67.331,67.333c37.128,0,67.333-30.205,67.333-67.333   S188.46,81.493,151.332,81.493z M151.332,200.159c-28.304,0-51.331-23.028-51.331-51.333s23.027-51.333,51.331-51.333   c28.305,0,51.333,23.028,51.333,51.333S179.637,200.159,151.332,200.159z"/>
	<path d="M297.483,131.124l-16.334-75c-0.869-3.993-4.764-6.688-8.839-6.252c-4.064,0.438-7.31,3.867-7.31,7.954v182   c0,4.418,3.582,8,8,8s8-3.582,8-8v-90.749l13.3-9.851C296.804,137.348,298.149,134.183,297.483,131.124z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>';
                    echo '&nbsp';
                    echo $row['name'];
                    echo '</a></li>';
                }
                ?>

            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>סה״כ מסעדות</span>
                <span><?php echo $num_rows; ?></span>
            </h6>
        </div>
    </nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2><?php echo $row_current['name'];?></h2>

<div class="btn-toolbar mb-2 mb-md-0">
<div class="btn-group me-2"><button class="btn btn-sm btn-outline-secondary" type="button" onclick="location.href='mailto:<?php echo $row_current['coo_email'];?>';"><?php echo $row_current['coo_email'];?></button><button class="btn btn-sm btn-outline-secondary" type="button" onclick="window.location.href='https://api.whatsapp.com/send?phone=972<?php echo $row_current['coo_phone'];?>'">לשיחה בווטסאפ</button></div>

</div>
</div>
    <div class="container my-5">
        <div class="row ">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">סל ממוצע רשתי</h5>
                        <p class="card-text"><?php echo $row_current['avg_basket'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">סך הכל מכירות</h5>
                        <p class="card-text"><?php echo $row_current['total_sales'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">רייטינג ממוצע</h5>
                        <p class="card-text"><?php echo $row_current['avg_goods_rating'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">יחס המרה</h5>
                        <p class="card-text"><?php echo $row_current['avg_convertion'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">יחס דחייה</h5>
                        <p class="card-text"><?php echo $row_current['rejection_rate'];?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">כמות מכירות</h5>
                        <p class="card-text"><?php echo $row_current['purchase_count'];?></p>
                    </div>
                </div>
            </div>
        </div>

        <p><canvas class="my-2 w-30" height="100px" id="myChart" width="200px"></canvas></p>
    </div>


</div>


</main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="../bootstrap/assets/dist/js/dashboard.js"></script>


<script>
    (function ($){
        $.fn.counter = function() {
            const $this = $(this),
                numberFrom = parseInt($this.attr('data-from')),
                numberTo = parseInt($this.attr('data-to')),
                delta = numberTo - numberFrom,
                deltaPositive = delta > 0 ? 1 : 0,
                time = parseInt($this.attr('data-time')),
                changeTime = 10;

            let currentNumber = numberFrom,
                value = delta*changeTime/time;
            var interval1;
            const changeNumber = () => {
                currentNumber += value;
                //checks if currentNumber reached numberTo
                (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
                this.text(parseInt(currentNumber));
                currentNumber == numberTo ? clearInterval(interval1) : currentNumber;
            }

            interval1 = setInterval(changeNumber,changeTime);
        }
    }(jQuery));

    $(document).ready(function(){

        $('.count-up').counter();
        $('.count1').counter();
        $('.count2').counter();
        $('.count3').counter();

        new WOW().init();

        setTimeout(function () {
            $('.count5').counter();
        }, 3000);
    });
</script>
</body>


<p dir="rtl">
<?php
    include("templates/footer.php");
?>
</html>