
<?php
    require_once 'db/connection.php';
    $tag = $_POST['tag'];
    $rate = $_POST['rate'];
    $sql2 = "SELECT name FROM enterprises WHERE main_tag='$tag' AND avg_goods_rating>='$rate'";
    $result2 = mysqli_query($conn, $sql2);
    echo "<table>";

    while ($data = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo '<td>'.$data['name'].'</td>';
        echo "</tr>";
    }
    echo "</table>";

?>