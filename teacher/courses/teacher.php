<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');

$sql = "select course_name from courses where teacher_id = $currentid";
$currentcourse = '';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $currentcourse = $row["course_name"];
  }
}

$currentcard = '';
$currentcard = $currentcourse;
$currentcard .= "card";

?>




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="./teacher.css">
  <link rel="stylesheet" href="../css/main.css">

  <title>Courses</title>
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

  <!-- NAV BAR ENDS -->

  <br>
  <h3 style='padding-left:20px;'>Your current courses: </h3>
  <hr>
  <!-- All cards -->

  <div class="container-fluid">

    <!-- BCE card -->
    <div class="card" id=bcecard style="width: 18rem;">
      <img src="./img/bce.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">BCE</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- ADMT card -->

    <div class="card" id=admtcard style="width: 18rem;">
      <img src="./img/db.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">ADMT</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- MES card -->

    <div class="card" id=mescard style="width: 18rem;">
      <img src="./img/mes.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">MES</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- IP card -->

    <div class="card" id=ipcard style="width: 18rem;">
      <img src="./img/ip.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">IP</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- CNS card -->

    <div class="card" id=cnscard style="width: 18rem;">
      <img src="./img/cns.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">CNS</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- CGVR card -->

    <div class="card" id=cgvrcard style="width: 18rem;">
      <img src="./img/cgvr.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">CGVR</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>

    <!-- ADSA card -->

    <div class="card" id=adsacard style="width: 18rem;">
      <img src="./img/adsa.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">ADSA</h5>
        <p class="card-text">Something nice about the course.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          View Enrolled Students
        </button>
      </div>
    </div>
  </div>


  <!-- MODAL -->

  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Students enrolled in <?php echo $currentcourse; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table>

            <tr>
              <th>Roll No.
              <th>
              <th>Name
              <th>
            </tr>

            <?php
            if ($currentcourse != 'adsa' && $currentcourse != 'cgvr') {

              $sql = "select rollno,name from student";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>" . $row["rollno"] . "</td><td>" . $row["name"] . "</td></tr>";
                }
                echo "</table>";
              } else {
                echo "0 results";
              }
            } else {

              $sql = "select rollno,name from student where elective_name = '$currentcourse'";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>" . $row["rollno"] . "</td><td>" . $row["name"] . "</td></tr>";
                }
                echo "</table>";
              } else {
                echo "0 results";
              }
            }
            ?>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>















  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
    document.getElementById('<?php echo $currentcard; ?>').style.display = 'block';
  </script>

</body>

</html>