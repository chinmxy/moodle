<?php

session_start();
$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$dict = $_SESSION['dict'];
$x = $_GET['student_id'];
$nmarks = $_GET['nmarks'];
$sub = $_SESSION['current_sub'];

$h = $dict[$x];
// echo $nmarks;
// echo $sub;
$sql = "update marks set elective = $nmarks where rollno = $h ";
$result = mysqli_query($conn, $sql);
