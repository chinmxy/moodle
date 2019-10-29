<?php

session_start();
$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$dict = $_SESSION['dict'];
$dict1 = $_SESSION['dict1'];
$x = $_GET['t_id'];
$troll = $dict[$x];
$tcourse = $dict1[$x];



$sql = "insert into teacher_courses (teacher_id, course_name) values ($troll, '$tcourse') ";
$result = mysqli_query($conn, $sql);

$s = "delete from pr_teacher where teacher_id = $troll";
$result = mysqli_query($conn, $s);
