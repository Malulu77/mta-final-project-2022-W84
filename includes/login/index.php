<?php

$server_name = "172.22.0.2";
$user_name = "isamitml_admin";
$password = "iG_W7XXnV!8U";
$database_name = "isamitml_db";

$link = mysqli_connect($server_name, $user_name, $password);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);