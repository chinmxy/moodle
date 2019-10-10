<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

$message = "Enrolled successfully. Please check the status after a few days. :)";


if (isset($_POST['enrollcns']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 1, 'cns')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrollmes']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 2, 'mes')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrollip']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 3, 'ip')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrollbce']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 4, 'bce')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrolladmt']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 5, 'admt')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrollcgvr']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 6, 'cgvr')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_POST['enrolladsa']))
{
  $SQL = "INSERT INTO pr_teacher (teacher_id, course_id, course_name) VALUES ( $currentid, 7, 'adsa')";
     $result = mysqli_query($conn, $SQL);
     echo "<script type='text/javascript'>alert('$message');</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Opt for courses</title>
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../homepage/homepage.php">Moodle v2.0</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../profile/view_profile.php">View profile</a>
        <a class="dropdown-item" href="../profile/view_marks.php">View marks</a>  
        <a class="dropdown-item" href="../profile/change_pass.php">Change password</a>
          
          <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
    -->  
    </li> 

    <!-- separate -->


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../courses/teacher.php">My courses</a>
          <a class="dropdown-item" href="../courses/optcourses.php">Opt for courses</a>
          <a class="dropdown-item" href="../courses/status.php">Check status</a>
          <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>-->
      </li>  
      
      <li class="nav-item active">
        <a class="nav-link" href="#">Forums <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <div class="navbar-right">
    <?php echo "Hello, ". $uname. "!"?>
    </div>
      <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
      
      
      <a href="../../login/index.php" class="btn btn-outline-danger">Logout</a>
    </form>
  </div>
</nav>
</div>

<!-- NAV BAR ENDS -->
<!-- NAVBAR END -->
 </br>

<div class="container-fluid">

<div class="card-deck">
  <div class="card" style="max-width: 25rem;">
    <img src="./img/cns.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">CNS</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='cns-btn' name='enrollcns' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mrs. Prajakta Bhangale</small>
    </div>
  </div>
  <div class="card" style="max-width: 25rem;">
    <img src="./img/db.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">ADMT</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='admt-btn' name='enrolladmt' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mrs. Sarika Davare</small>
    </div>
  </div>
  <div class="card" style="max-width: 25rem;">
    <img src="./img/ip.jpg" class="card-img-top" alt="..." height=350px width=750px>
    <div class="card-body">
      <h5 class="card-title">IP</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='ip-btn' name='enrollip' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mr. Saurabh Kulkarni</small>
    </div>
  </div>
</div>

</div>
<br>
<hr>
<br>



<div class="container-fluid">

<div class="card-deck">
  <div class="card" style="max-width: 25rem;">
    <img src="./img/mes.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">MES</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='mes-btn' name='enrollmes' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mrs. Garima Tripathi</small>
    </div>
  </div>
  <div class="card" style="max-width: 25rem;">
    <img src="./img/bce.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">BCE</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='bce-btn' name='enrollbce' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mr. Joseph Rodrigues</small>
    </div>
  </div>
  <div class="card" style="max-width: 25rem;">
    <img src="./img/adsa.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">ADSA</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='adsa-btn' name='enrolladsa' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mrs. Prajakta Dhamanskar</small>
    </div>
  </div>

<br>
<hr>
<br>


<div class="container-fluid">
<br>
<hr>
<br>
<div class="card-deck">
  <div class="card" style="max-width: 25rem;">
    <img src="./img/cgvr.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">CGVR</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <form method='POST'>
      <input type='submit' id='mes-btn' name='enrollmes' value='Enroll now!' class='btn btn-danger' onclick='disableBtn1()'>
      </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mr. Nilesh Patil</small>
    </div>
  </div>

  

<br>
<hr>
<br>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>