<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$current_id = $_SESSION['current_id'];

$_SESSION['username'] = $uname;
$_SESSION['password'] = $pass;
$_SESSION['current_id'] = $current_id;


$subject = '';
$sql = "select course_name from courses where teacher_id = $current_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    $subject = $row['course_name'];
  }
}
$_SESSION['current_sub'] = $subject;

?>

<!-- HTML STARTS -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Marks</title>
  <link rel="stylesheet" href=./view_marks.css> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href='table.css'>
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
              <a class="dropdown-item" href="../courses/teacher.php">My courses</a>
              <a class="dropdown-item" href="../accept_reject/accept.php">Accept/Reject students</a>
              <a class="dropdown-item" href="../courses/optcourses.php">Opt for courses</a>
              <a class="dropdown-item" href="../courses/status.php">Check status</a>
              <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>-->
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

    <h1>
      Marks
      <small class="text-muted"></small>
    </h1>

    <div id='requests'>


      <?php
      if ($subject == 'adsa' || $subject == 'cgvr') {
        $sql = "select marks.rollno,marks.elective from marks inner join student on marks.rollno = student.rollno and student.elective_name = '$subject'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo '<form method="POST">';
          echo '<div class="limiter"><div class="table100">';
          echo "<table style='text-align:center;'><tr><th>ROLL NO.</th><th>MARKS</th></tr>";
          $i = 1;
          $dict = array();
          while ($row = mysqli_fetch_assoc($result)) {
            $r = $row['rollno'];
            $s = $row['elective'];
            $dict[$i] = $r;
            echo "<tr><td>$r</td><td>$s</td><td><button type='button' onclick='elecFunction($i)' class='btn btn-primary'>Change</button></td></tr>";
            $i = $i + 1;
          }
          echo "</table>";
          echo '</div></div>';
          echo '</form>';
        }
      } else {
        $sql = "select rollno,$subject from marks";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo '<form method="POST">';
          echo '<div class="limiter"><div class="table100">';
          echo "<table style='text-align:center;'><tr><th>ROLL NO.</th><th>MARKS</th></tr>";
          $i = 1;
          $dict = array();
          while ($row = mysqli_fetch_assoc($result)) {
            $r = $row['rollno'];
            $s = $row[$subject];
            $dict[$i] = $r;
            echo "<tr><td>$r</td><td>$s</td><td><button type='button' onclick='newFunction($i)' class='btn btn-primary'>Change</button></td></tr>";
            $i = $i + 1;
          }
          echo "</table>";
          echo '</div></div>';
          echo '</form>';
        }
      }



      ?>
      <?php $_SESSION['dict'] = $dict; ?>

      </br>
    </div>


  </div><!-- Main Col END -->

  </div><!-- body-row END -->
  <script>
    function newFunction(x) {
      // console.log("here");
      var nmarks = prompt("Please enter marks:", "0-80");
      //console.log(person);
      var xhttp;

      if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
      } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }



      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("requests").innerHTML = this.responseText;

          alert("Marks changed successfully!");
          window.location.reload();
        }
      };

      xhttp.open("GET", "chng_marks.php?student_id=" + x + "&nmarks=" + nmarks, true);
      xhttp.send(null);

    }

    function elecFunction(x) {
      // console.log("here");
      var nmarks = prompt("Please enter marks:", "0-80");
      //console.log(person);
      var xhttp;

      if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
      } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }



      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("requests").innerHTML = this.responseText;

          alert("Marks changed successfully!");
          window.location.reload();
        }
      };

      xhttp.open("GET", "chng_marks_elec.php?student_id=" + x + "&nmarks=" + nmarks, true);
      xhttp.send(null);

    }
  </script>

</body>

</html>