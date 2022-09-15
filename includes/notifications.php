<?php

require_once 'db/connection.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
$tom = date('Y-m-d', strtotime('tomorrow'));
$count=0;
$sql4 = "SELECT * FROM campaigns where status = 'RUNNING' order by status asc limit 10";
$result_trainings4 = mysqli_query($conn, $sql4);
while($row4 = mysqli_fetch_assoc($result_trainings4)){++$count;}
$sql5 = "SELECT * FROM trainings where date>now() and date < '".$tom."' order by date asc limit 10";
$result_trainings5 = mysqli_query($conn, $sql5);
while($row5 = mysqli_fetch_assoc($result_trainings5)){++$count;}

?>



<html>

<head>
    <meta charset="utf-8">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="box">
            <div class="notifications">
                <i class="fa fa-bell"></i>
                <?php
                echo '
                <span class="num">'.$count.'</span> ';
                ?>
                <ul class="ul-design">
                    <li class="li-design icon">
                        <span class="icon"><i class="fa fa-clipboard"></i></span>
                         <span class="text">הדרכות המתרחשות היום</span>


                                    <?php
                                        $flag=0;
                                                $tom = date('Y-m-d', strtotime('tomorrow'));
                                                $sql = "SELECT * FROM trainings
                                                        where date>now() and date < '".$tom."'
                                                        order by date asc
                                                        limit 10";
                                                $result_trainings = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_assoc($result_trainings))
                                                    {
                                                        ++$flag;
                                                       $sql2 = "SELECT name FROM enterprises where id='".$row['restaurant_id']."'";
                                                       $result_trainings2 = mysqli_query($conn, $sql2);
                                                       $row3 = mysqli_fetch_assoc($result_trainings2);
                                                        echo '
                                                        <li class="li-design icon">'.$row['name'].' - '.$row['type'].' - '.$row3['name'].' </li>
                                                        ';



                                                }
                                                if ($flag==0){
                                                echo '
                                                <li class="li-design icon">אין אירועים זמינים</li>
                                                     ';
                                                }
                                    ?>



                    </li>

                       <li class="li-design icon">
                                            <span class="icon"><i class="fa fa-gift"></i></span>
                                             <span class="text">קמפיינים רצים</span>


                                                        <?php
                                                                    $flag=0;
                                                                    $sql = "SELECT * FROM campaigns where status = 'RUNNING'
                                                                            order by status asc
                                                                            limit 10";
                                                                    $result_trainings = mysqli_query($conn, $sql);

                                                                        while($row = mysqli_fetch_assoc($result_trainings))
                                                                        {
                                                                            ++$flag;
                                                                            echo '
                                                                            <li class="li-design icon">'.$row['name'].'</li>
                                                                            ';


                                                                        }

                                                                   if ($flag==0){
                                                                      echo '
                                                                      <li class="li-design icon">אין אירועים זמינים</li>
                                                                       ';
                                                                      }
                                                        ?>



                                        </li>

                </ul>
            </div>
        </div>
    </div>
</div>

</html>
<style>

    .box {
        position:fixed;
        top:20%;
        left:48%;
        transform:translate(-50%,-80%);
                z-index: 9;

    }
    .notifications {
        width:60px;
        height:60px;
        background:#fff;
        border-radius:30px;
        box-sizing:border-box;
        text-align:center;
        box-shadow:0 5px 5px rgba(0,0,0,.2);
        z-index: 9;

    }
    .notifications:hover {
        width:300px;
        height:60px;
        text-align:right;
        padding:0 15px;
        background: #2c8bff;
        transform:translateY(-100%);
        border-bottom-left-radius:0;
        border-bottom-right-radius:0;
    }
    .notifications:hover .fa {
        color:#fff;
    }
    .notifications .fa {
        color:#cecece;
        line-height:60px;
        font-size:20px;
    }
    .notifications .num {
        position:absolute;
        top:0;
        right:-5px;
        width:25px;
        height:25px;
        border-radius:50%;
        background: #2c8bff;
        color:#fff;
        line-height:25px;
        font-family:sans-serif;
        text-align:center;
        z-index: 9;

    }
    .notifications:hover .num {
        position:relative;
        background:transparent;
        color:#fff;
        font-size:24px;
        top:-4px;
    }
    .notifications:hover .num:after {
        content:' התראות חדשות';

    }
    .ul-design {
        position:absolute;
        left:0px;
        top:50px;
        margin:0;
        width:100%;
        background:#fff;
        box-shadow:0 5px 15px rgba(0,0,0,.5);
        padding:20px;
        box-sizing:border-box;
        border-bottom-left-radius:30px;
        border-bottom-right-radius:30px;
        display:none;
    }
    .notifications:hover ul {
        display:block;
    }
    .ul-design .li-design {
        list-style:none;
        border-bottom:1px solid rgba(0,0,0,.1);
        padding:8px 0;
        display:flex;

    }
    .ul-design .li-design:last-child {
        border-bottom:none;
    }
    .ul-design .li-design  .icon {
        width:24px;
        height:24px;
        background:#ccc;
        border-radius:50%;
        text-align:center;
        line-height:24px;
    }
    .ul-design .li-design  .icon .fa {
        color:#fff;
        font-size:16px;
        line-height:24px;
    }
    .ul-design .li-design  .text {
        position:relative;
        font-family: 'Varela Round';
        top:3px;
        cursor:pointer;
        font-weight:bolder;
        margin-right:2px;

    }
    .ul-design .li-design:hover .text {
        font-weight:bold;
        color:#2c8bff;

    }


    h2{ color:#fff;
        text-align:center;
        font-family: 'Varela Round';


    }
</style>

