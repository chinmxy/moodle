<?php

session_start();


$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];


$cns = 'NA';
$ip = 'NA';
$bce = 'NA';
$admt = 'NA';
$mes = 'NA';

$sql1 = "select cns,ip,bce,admt,mes from marks where marks.rollno = '$currentid'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $cns = $row1["cns"];
    $ip = $row1["ip"];
    $bce = $row1["bce"];
    $admt = $row1["admt"];
    $mes = $row1["mes"];
  }
}


?>

<!-- HTML STARTS -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Marks </title>
  <link rel="stylesheet" href=./view_marks.css> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
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
              <a class="dropdown-item" href="../courses/status.php">Check status</a>
              <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
    -->
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="../../forum/pages/home.php">Forums <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <div class="navbar-right">
            <?php echo "Hello, " . $uname . "!" ?>
          </div>
          <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->


          <a href="../../login/index.php" class="btn btn-outline-danger">Logout</a>
        </form>
      </div>
    </nav>
  </div>

  <!-- MAIN BODY -->
  </br>
  <div class="col" id="student-marks">
    <!--
        <h1>
            Your marks
            <small class="text-muted">Version 2.1</small>
        </h1>
        -->

    <div class="card">
      <h4 class="card-header">Your marks</h4>
      <div class="card-body">
        <table style="width:100% ">
          <tr>
            <th>Subject Name</th>
            <th>Marks Obtained</th>
            <th>Maximum Marks</th>
          </tr>
          <tr>
            <td>CNS</td>
            <td><?php echo $cns; ?></td>
            <td>80</td>
          </tr>
          <tr>
            <td>ADMT</td>
            <td><?php echo $admt; ?></td>
            <td>80</td>
          </tr>
          <tr>
            <td>MES</td>
            <td><?php echo $mes; ?></td>
            <td>80</td>
          </tr>
          <tr>
            <td>IP</td>
            <td><?php echo $ip; ?></td>
            <td>80</td>
          </tr>
          <tr>
            <td>BCE</td>
            <td><?php echo $ip; ?></td>
            <td>80</td>
          </tr>

        </table>
      </div>
    </div>



  </div><!-- Main Col END -->

  </div><!-- body-row END -->

</body>

</html>