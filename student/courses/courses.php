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

?>




<!-- HTML  -->
<html>
<head>
<title>Courses</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="elective.css">
</head>
<body>
<!-- NAVBAR Common to all students pages -->

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
        <a class="dropdown-item" href="view_profile.php">View profile</a>
        <a class="dropdown-item" href="view_marks.php">View marks</a>  
        <a class="dropdown-item" href="change_pass.php">Change password</a>
          
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
          <a class="dropdown-item" href="../courses/courses.php">Courses</a>
          <a class="dropdown-item" href="../courses/elective.php">Opt for electives</a>
          <a class="dropdown-item" href="#">Check status</a>
          <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
    -->  
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
      <button class="btn btn-outline-danger" href="">Logout</button> 
    </form>
  </div>
</nav>
</div>
<br>
<div class="container-fluid">

<div class="alert alert-dark">
  Your compulsory courses: 
</div>

</div>

<div class="container-fluid">

<div class="card-deck">
  <div class="card" style="max-width: 25rem;">
    <img src="./img/cns.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">CNS</h5>
      <p class="card-text">Some lines which explain this particular subject in brief.</p>
      <br>
      <button type="button" class="btn btn-info">Learn more</button>
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
      <button type="button" class="btn btn-info">Learn more</button>
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
      <button type="button" class="btn btn-info">Learn more</button>
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
      <button type="button" class="btn btn-info">Learn more</button>
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
      <button type="button" class="btn btn-info">Learn more</button>
    </div>
    <div class="card-footer">
      <small class="text-muted">Mr. Joseph Rodrigues</small>
    </div>
  </div>
</div>
<br>
<br>
<br>
</div>




<!-- ********************************************SCRIPTS*************************************************************************-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
