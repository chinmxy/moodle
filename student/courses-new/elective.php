<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
	$uname = $_SESSION['username'];
  $pass = $_SESSION['password'];
  $currentroll = $_SESSION['currentrollno'];


if (isset($_POST['enrollcgvr']))
{
  $SQL = "INSERT INTO pr_student (rollno, course_id, course_name) VALUES ( $currentroll, 6, 'cgvr')";
     $result = mysqli_query($conn, $SQL);
     echo "entered successfully";
}

if (isset($_POST['enrolladsa']))
{
  $SQL = "INSERT INTO pr_student (rollno, course_id, course_name) VALUES ( $currentroll, 7, 'adsa')";
     $result = mysqli_query($conn, $SQL);
     echo "entered successfully";
}

?>





<!-- HTML STARTS -->




<html>
<head>
<title>Elective</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="elecive.css">
</head>
<body>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Moodle v2.0</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasle">Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="courses.php">Courses</a>
          <a class="dropdown-item" href="electives.php">Opt for electives</a>

  </div>
</nav>

<br>
<h3> Enroll in any one course: </h3>
<br>

<div class="container-fluid">
<div class="card-deck">

  <div class="card" style="max-width: 25rem;">
    <div class="card-edit">
    <img src="./img/cgvr.jpeg" class="card-img-top" alt="...">
  </div>
    <div class="card-body">
      <h5 class="card-title">CGVR</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='cgvr-btn' name='enrollcgvr' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mr. Nilesh Patil</small>
    </div>
  </div>
  <div class="card" style="max-width: 25rem;">
    <div class="card-edit">
    <img src="./img/adsa.png" class="card-img-top" alt="...">
  </div>
    
    
    
    
    <div class="card-body">
      <h5 class="card-title">ADSA</h5>
      <p class="card-text">Some lines which explain this particular elecive subject in brief.</p>
      <br>
      <form method='POST'>
        <input type='submit' id='adsa-btn' name='enrolladsa' value='Enroll now!' class='btn btn-danger' onclick='disableBtn2()'>
      <!--<button id="adsa-btn" type="submit" class="btn btn-danger" name="submit" value="Enroll now!" onclick="disableBtn2()">Enroll now!</button> -->
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mrs. Prajakta Dhamanskar</small>
    </div>
  </div>
</div>

</div>

</div>

<!-- SCRIPTS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

function disableBtn1() {
  document.getElementById("cgvr-btn").disabled = true;
   document.getElementById("adsa-btn").disabled = true;
   document.getElementById("cgvr-btn").value="Enrolled into CGVR"

}
function disableBtn2(){
 document.getElementById("cgvr-btn").disabled = true;
   document.getElementById("adsa-btn").disabled = true;
   document.getElementById("adsa-btn").value="Enrolled into ADSA"
}

</script>

</body>

</html>
