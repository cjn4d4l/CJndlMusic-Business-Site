<?php
$db_server = "127.0.0.1:3307";
$db_user = "root";
$db_password = "";
$db_name = "cjndlmusicdb";
$db_connection = "";
try {
    $db_connection = mysqli_connect($db_server, $db_user, $db_password, $db_name);
} catch (mysqli_sql_exception){
    echo "<script>console.log('Database is not Connected')</script>";
}

if ($db_connection) {
    echo "<script>console.log('Database is Connected')</script>";
}
?>