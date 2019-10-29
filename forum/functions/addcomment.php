<?php
// include "db.php";
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$comment = $_POST['comment'];
$userid = $_POST['userid'];
$postid = $_POST['postid'];
// echo $userid;
// echo $postid;
// echo $comment;

date_default_timezone_set("Asia/Taipei");
$datetime = date("Y-m-d h:i:sa");


$s1 = "insert into tblcomment (comment,post_id1,user_id1,datetime) values('$comment','$postid','$userid','$datetime')";
$result = mysqli_query($conn, $s1);



// $comment = mysqli_query($con, "Insert into tblcomment (comment,post_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
$sql = mysqli_query($conn, "SELECT * from tblcomment");

while ($row = mysqli_fetch_assoc($sql)) {
    echo "<label>Comment by: </label> " . $row['user_id1'] . "<br>";
    echo '<label class="pull-right">' . $row['datetime'] . '</label>';
    echo "<p class='well'>" . $row['comment'] . "</p>";
}
