<?php

    session_start();
    $uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

    $dict = $_SESSION['dict'];
    $x = $_GET['student_id'];
    $sub = $_GET['current_subject'];

    $sql = "update student set elective_name = '$sub'  where rollno = $dict[$x]";
    $result = mysqli_query($conn, $sql);
    $sql1 = "DELETE FROM pr_student WHERE rollno = $dict[$x]";
    $result = mysqli_query($conn, $sql1);
    
    $message = "Accepted";
    return "sahdhba";

    
?>