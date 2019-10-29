<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$_SESSION['username'] = $uname;
$_SESSION['password'] = $pass;

$currentroll = '';

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$sql = "select rollno from student where username = '$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $currentroll = $row["rollno"];
  }
} else {
  $sql = "select teacher_id from teacher where username = '$uname'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $currentroll = $row["teacher_id"];
    }
  } else {
    echo "0 results";
  }
}

$_SESSION['currentrollno'] = $currentroll;

$realpass = "";

$sql = "select password from student where rollno = $currentroll";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $realpass = $row["password"];
  }
}




if (isset($_POST['pass-change-button'])) {
  $current_pass  = $_POST['current-pass-1'];
  $new_pass_1 = $_POST['new-pass-1'];
  $new_pass_2 = $_POST['new-pass-2'];

  $pass_err = '';


  if ($new_pass_1 != $new_pass_2) {
    $pass_err = 'Passwords do not match.';
    echo "<script type='text/javascript'>alert('$pass_err');</script>";
  } elseif ($current_pass == $new_pass_1) {
    $pass_err = 'New password same as old password.';
    echo "<script type='text/javascript'>alert('$pass_err');</script>";
  } elseif ($current_pass != $realpass) {
    $pass_err = 'Please enter correct current password.';
    echo "<script type='text/javascript'>alert('$pass_err');</script>";
  } else {

    $sql3 = "update student set password = '$new_pass_1' where rollno = $currentroll";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
      $pass_err = 'Password changed successfully.';
      echo "<script type='text/javascript'>alert('$pass_err');</script>";
      $pass_err = '';
    }
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
  <title>Change password</title>
  <link rel="stylesheet" href=./change_pass.css> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
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

  <!-- NAV BAR ENDS -->

  <!-- MAIN BODY -->
  </br>
  <div class="col" id="change-password">
    <!--
        <h1>
            Your marks
            <small class="text-muted">Version 2.1</small>
        </h1>
        -->

    <div class="card">
      <h4 class="card-header">Change your password</h4>
      <div class="card-body">
        <form method='POST'>
          <input type=password name='current-pass-1' placeholder='Enter current password'>
          </br></br>
          <input type=password name='new-pass-1' width='25%' placeholder='Enter new password'>
          </br></br>
          <input type=password name='new-pass-2' placeholder='Confirm new password'>
          </br></br>
          <input type='submit' class="btn btn-primary" name='pass-change-button'>

        </form>




      </div>
    </div>



  </div>


</body>

</html>