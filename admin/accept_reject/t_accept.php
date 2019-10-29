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

$c_id = '';

$sql = "select course_id from courses where course_name = '$tcourse'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['course_id'];
    }
}



$sql = "insert into teacher_status (teacher_id, course_id,course_name,status) values ($troll, $c_id, '$tcourse','accepted') ";
$result = mysqli_query($conn, $sql);

$s = "delete from pr_teacher where teacher_id = $troll";
$result = mysqli_query($conn, $s);
