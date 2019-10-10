<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];
$fullname = '';

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

$sql = "select teacher_name from teacher where teacher_id = $currentid";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
      $fullname = $row["teacher_name"];
    }
}

$subject = '';
$sql = "select course_name from courses where teacher_id = $currentid";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
      $subject = $row["course_name"];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View profile</title>
  <link rel="stylesheet" href=./view_marks.css>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
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

</br>
<div class="col" id="student-marks">
        <!--
        <h1>
            Your marks
            <small class="text-muted">Version 2.1</small>
        </h1>
        -->
        
        <div class="card">
            <h4 class="card-header">Your profile</h4>
            <div class="card-body">
                <form>
                    <h5>Name:</h5>
                    <input type='text' value='<?php echo $fullname; ?>' disabled>
                    </br></br>
                    <h5>Username:</h5>
                    <input type='text' value='<?php echo $uname; ?>' disabled>
                    </br></br>
                    <h5>Teacher ID:</h5>
                    <input type='text' value='<?php echo $currentid; ?>' disabled>
                    </br></br>
                    <h5>Courses under you:</h5>
                    <input type='text' value='<?php echo $subject; ?>' disabled>
                    
            </div>
        </div>
       
        

    </div>

</body>
</html>