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
$currentroll = $_SESSION['current_id'];

?>

<?php
$elected = '';
$sql =  "select elective_name from student where rollno = $currentroll";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {


  while ($row = mysqli_fetch_assoc($result)) {
    $elected = $row['elective_name'];
  }
}


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
              <a class="dropdown-item" href="status.php">Check status</a>
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
            <?php echo "Hello, " . $uname . "!" ?>
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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            View
          </button>
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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            View
          </button>
        </div>
        <div class="card-footer">
          <small class="text-muted">Mrs. Sarika Davare</small>
        </div>
      </div>
      <div class="card" style="max-width: 25rem;">
        <img src="img/ip1.jpg" class="card-img-top" alt="..." height=350px width=750px>
        <div class="card-body">
          <h5 class="card-title">IP</h5>
          <p class="card-text">Some lines which explain this particular subject in brief.</p>
          <br>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            View
          </button>
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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            View
          </button>
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
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            View
          </button>
        </div>
        <div class="card-footer">
          <small class="text-muted">Mr. Joseph Rodrigues</small>
        </div>
      </div>
    </div>

  </div>
  <br>
  <div class="container-fluid">

    <div class="alert alert-dark">
      Your elected courses:
    </div>

  </div>
  <hr>

  <?php

  if ($elected == 'adsa') {

    echo "<div class='container-fluid'><div class='card-deck'>";

    echo "<div class='card' style='max-width: 25rem;'><img src='./img/adsa.png' class='card-img-top' alt='...'><div class='card-body'><h5 class='card-title'>ADSA</h5><p class='card-text'>Some lines which explain this particular elecive subject in brief.</p><br><!-- Button trigger modal --><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal2'>View</button></div><div class='card-footer'><small class='text-muted'>Mrs. Prajakta Dhamanskar</small></div></div>";

    echo "</div></div>";
  } elseif ($elected == 'cgvr') {
    echo "<div class='container-fluid'><div class='card-deck'>";

    echo "<div class='card' style='max-width: 25rem;'>
<img src='./img/cgvr.jpeg' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>CGVR</h5>
  <p class='card-text'>Some lines which explain this particular subject in brief.</p>
  <br>
  <!-- Button trigger modal -->
  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal2'>
    View
  </button>
</div>
<div class='card-footer'>
  <small class='text-muted'>Mr. Nilesh Patil</small>
</div>
</div>";

    echo "</div></div>";
  }

  ?>

  </br>
  </br>



  <!-- Modal for compulsory-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Students currently enrolled :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php

          $sql =  "select * from student";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Roll no.</th><th>Name</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td>" . $row['rollno'] . "</td><td>" . $row['name'] . "</td></tr>";
            }

            echo "</table>";
          }

          ?>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal for elected-->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Students currently enrolled :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">



          <?php

          $sql =  "select * from student where elective_name = '$elected'";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Roll no.</th><th>Name</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr><td>" . $row['rollno'] . "</td><td>" . $row['name'] . "</td></tr>";
            }

            echo "</table>";
          }

          ?>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>


  <!-- ********************************************SCRIPTS*************************************************************************-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>