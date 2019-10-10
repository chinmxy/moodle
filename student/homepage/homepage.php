<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRCEMoodle - Home</title>
  <link rel="stylesheet" href=./homepage.css>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      
      
      <a href="../../login/index.php" class="btn btn-outline-danger">Logout</a>
    </form>
  </div>
</nav>
</div>

<!-- NAV BAR ENDS --> 
</br>
<!-- CAROUSEL -->

<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="./img/img01.jpg" class="d-block w-100 img-car" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/img02.jpg" class="d-block w-100 img-car" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/img03.jpg" class="d-block w-100 img-car" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/img04.jpg" class="d-block w-100 img-car" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</br>
<!-- -->
<!-- Site footer -->
<footer class="site-footer">
      <div class="jumbotron">
        <div class="jumbo" >
    <div class="container" >
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify"><b>Moodle v2.0 </b><i><br>Designed for Fr.CRCE </i><br>Moulding engineers who can build the nation.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Made Using</h6>
          <ul class="footer-links">
            <li><a href="https://html.com">HTML</a></li>
            <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS">CSS</a></li>
            <li><a href="https://getbootstrap.com/">Bootstrap</a></li>
            <li><a href="https://www.javascript.com/">Javascript</a></li>
            <li><a href="https://www.php.net/manual/en/intro-whatis.php">PHP</a></li>
           
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="http://www.github.com/chinmxy">Github</a></li>
            <li><a href="http://www.linkedin.com/in/chinmaygawde">Linkedin</a></li>
            <li><a href="https://twitter.com/chinmayxo">Twitter</a></li>
            <li><a href="https://www.facebook.com/chinmxy">Facebook</a></li>
           
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">
       <a href="#"></a>.
          </p>
        </div>

      <!--  <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div> -->
      </div>
    </div class=heart>
    <div style='text-align:center;'>
    Made with ❤ by <a href='https://github.com/chinmxy'>Chinmay Gawde</a> and <a href='https://github.com/Dylan-Dsouza'>Dylan D`souza</a>. 
</div>
</div>
</footer>
  
</body>
</html>
