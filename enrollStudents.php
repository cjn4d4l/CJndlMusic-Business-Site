<?php
include('C:\xampp\htdocs\CJndlMusic Business Site\backend\databaseConnection.php');
$student_name = $_POST['student_name'];
$student_gmail = $_POST['student_gmail'];
$instrument = $_POST['instrument'];
$level = $_POST['level'];
$date_enrolled = date("Y/m/d");
if (!empty($student_name) || !empty($student_gmail)) {
    $sql = "INSERT INTO students (student_name, student_gmail, instrument, student_level, date_enrolled) VALUE ('$student_name', '$student_gmail', '$instrument', '$level', '$date_enrolled')";
    try {
        mysqli_query($db_connection, $sql);
    } catch (mysqli_sql_exception) {
        echo "<script>console.log('could not insert')</script>";
    }
    mysqli_close($db_connection);
}
