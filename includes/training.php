<?php
include("templates/header.php");
require_once 'db/connection.php';

$sql = "SELECT * FROM trainings;";
$result_trainings = mysqli_query($conn, $sql);
$num_rows_trainings = mysqli_num_rows($result_trainings);

$sql = "SELECT * FROM restaurants;";
$result_restaurants = mysqli_query($conn, $sql);
$num_rows_restaurants = mysqli_num_rows($result_restaurants);

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: includes/login/login.php");
    exit;
}
?>
<!doctype html>
<html dir="rtl" lang="he">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
</head>
<body>


<main>
<main class="container">
<div class="text-black rounded bg-white" dir="rtl">
<div class="col-md-6 px-0">
<h1 class="display-4 fst-italic">ממשק ניהול הדרכות</h1>

<p class="lead my-3" style="text-align: right;">נולד להורים ספורטאים בצפון, זכה לחיזורים מסרביה והחליט לייצג את ישראל בזכות פיני גרשון. הדרך של השחקן שמרגש מדינה שלמה.</p>
</div>
</div>



<div class="row" dir="rtl">
<div class="col-md-8">
<h3 class="pb-4 mb-4 fst-italic border-bottom" style="text-align: right;">לוח הדרכות</h3>

    <iframe src="https://calendar.google.com/calendar/embed?src=jc3cigngdkkmhrpv782m5c2fa4%40group.calendar.google.com&ctz=Asia%2FJerusalem" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

<article class="blog-post">
<h2 class="blog-post-title mb-1" style="text-align: right;">טבלת הדרכות</h2>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">רשת</th>
            <th scope="col">&nbsp;כמות הדרכות כוללת</th>
            <th scope="col">חריגות</th>
            <th scope="col">הדרכות אייפד</th>
            <th scope="col">הדרכות הכשרה</th>

        </tr>
        </thead>
        <tbody>
        <?php

        while($row = mysqli_fetch_assoc($result_trainings))
        {
            echo '        
        <tr>
            <td>לייקרס</td>
            <td>78</td>
            <td>50</td>
            <td>95</td>
            <td>25</td>
        </tr>';
            echo $row['name'];
            echo '</a></li>';
        }
        ?>

        </tbody>
    </table>
</div>

<div class="col-md-4">
    <div class="py-5 text-center" dir="rtl">
        <p style="text-align: right;"></p>

        <h2 style="text-align: right;">הוספת הדרכה חדשה</h2>

        <p class="lead" style="text-align: right;"><strong>מלאו את הטופס בכדי להוסיף הדרכה חדשה ללוח השנה<br>
    </div>

    <div class="row g-3" dir="rtl">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: right;">הדרכות הקרובות</h4>
            <?php

            while($row = mysqli_fetch_assoc($result_trainings))
            {
                echo '
                <h4 class="d-flex justify-content-between align-items-center mb-3" dir="rtl" style="text-align: left;"><span style="font-size: 13.3333px;">שם הדרכה</span></h4>
            <p class="list-group-item d-flex justify-content-between lh-sm" dir="rtl" style="text-align: left;">תאריך הדרכה</p>
                ';
                echo $row['name'];
                echo '</a></li>';
            }
            ?>
        </div>

        <div class="col-md-7 col-lg-8">
            <form action="send_details.php" class="needs-validation" method="post" novalidate="">
                <div class="row g-3">
                    <div class="col-12">
                        <p style="text-align: right;"><label class="form-label" for="name"&nbsp;</label>שם ההדרכה<input class="form-control" id="name" placeholder="" required="" type="text" value="" name="name"/></p>

                        <div class="invalid-feedback" style="text-align: right;"></div>
                    </div>

                    <div class="col-12">
                        <p style="text-align: right; margin-bottom: 0px;"><label class="form-label" for="name"&nbsp;</label>רשת</p>
                        <select name="restaurants" id="restaurants" class="form-select">
                            <?php

                            while($row = mysqli_fetch_assoc($result_restaurants))
                            {
                                $name = $row['name'];
                                echo '<option value="'.$name.'">'.$name.'</option>';
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-12">
                        <p style="text-align: right;">
                        <label class="form-label" for="name"&nbsp;</label>סוג הדרכה&nbsp;
                            <select name="type" id="type" class="form-select">
                                <option value="ipad"> אייפד</option>
                                <option value="team"> צוותי</option>
                            </select>

                        </p>

                    </div>

                    <div class="col-12" style="text-align: right;"><label class="form-label" for="name"&nbsp;>תאריך הדרכה</label>&nbsp;<input class="form-control" id="credit" placeholder="" type="text" name="credit" /></div>

                    <div class="col-md-5">
                        <p style="text-align: right;"></p>
                    </div>
                </div>

                <hr class="my-4" />
                <p style="text-align: right;"><button class="w-100 btn btn-primary btn-lg" type="submit" value="run">שמור אירוע</button></p>
            </form>
        </div>
    </div>
</div>
</div>
</main>

<?php
    include("templates/footer.php");
?>
</main>
<script src="/bootstrap/assets/dist/js/bootstrap.bundle.min.js"></script></body>
</html>