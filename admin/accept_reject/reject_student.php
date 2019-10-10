<?php

    session_start();
    $uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

    $dict = $_SESSION['dict'];
    $x = $_GET['student_id'];
    $sub = $_SESSION['current_subject'];
    $subid = $_SESSION['current_subject_id'];
    
    $sql = "insert into reject_students(rollno, course_id, course_name) values ($dict[$x], $subid, '$sub');";
    $result = mysqli_query($conn, $sql);
    $sql1 = "DELETE FROM pr_student WHERE rollno = $dict[$x]";
    $result = mysqli_query($conn, $sql1);
    
    $message = "Accepted";
    echo "<script type='text/javascript'>alert('$message');</script>";
?>