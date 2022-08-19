<?php
require_once 'db/connection.php';



$sql = "SELECT * FROM enterprises;";
$result_enterprises = mysqli_query($conn, $sql);
$num_rows_enterprises = mysqli_num_rows($result_enterprises);

// Check if the user is logged in, if not then redirect him to login page

?>
<!doctype html>
<html dir="rtl" lang="he">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
        <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
        </script>
   

<main>
<main class="container-lg">
<div class="text-black rounded bg-white" dir="rtl">
<div class="col-md-6 px-0">
</div>
</div>

<article class="blog-post">
<h2 class="blog-post-title mb-1" style="text-align: right;">טבלת הדרכות</h2>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">רשת</th>
            <th scope="col">&nbsp;כמות הדרכות כוללת</th>
            <th scope="col">הדרכות אייפד</th>
            <th scope="col">הדרכות הכשרה</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM enterprises;";
        $result_enterprises = mysqli_query($conn, $sql);



        while($row_enterprises = mysqli_fetch_assoc($result_enterprises))
        {
            $count_sql = 'SELECT * FROM trainings where restaurant_id = '.$row_enterprises['id'].';';
            $count_result = mysqli_query($conn, $count_sql);
            $count_training_per_enterprise = mysqli_num_rows($count_result);

            $count_sql_ipad = 'SELECT * FROM trainings where restaurant_id = '.$row_enterprises['id'].' and type = "ipad";';
            $count_result_ipad = mysqli_query($conn, $count_sql_ipad);
            $count_training_per_enterprise_ipad = mysqli_num_rows($count_result_ipad);

            $count_sql_team = 'SELECT * FROM trainings where restaurant_id = '.$row_enterprises['id'].' and type = "team";';
            $count_result_team = mysqli_query($conn, $count_sql_team);
            $count_training_per_enterprise_team = mysqli_num_rows($count_result_team);

            echo '        
        <tr>
            <td>'.$row_enterprises['name'].'</td>
            <td>'.$count_training_per_enterprise.'</td>
            <td>'.$count_training_per_enterprise_ipad.'</td>
            <td>'.$count_training_per_enterprise_team.'</td>
        </tr>';
            echo '</a></li>';
        }
        ?>

        </tbody>
    </table>
    </div>
    </article>

</main>
</html>