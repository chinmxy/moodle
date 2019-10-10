<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

$subject_id = '';
$subject_name = '';

$s = "select course_id, course_name from courses where teacher_id = $currentid";
$result = mysqli_query($conn, $s);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   $subject_id = $row['course_id']; 
   $subject_name = $row['course_name'];
  }
  
  } else { echo "0 results"; }

  if (isset($_POST['accept'])){
    
    echo $row['rollno'];
  }

  $_SESSION['current_subject'] = $subject_name;
  $_SESSION['current_subject_id'] = $subject_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./accept.css">
    <title>Accept/Reject</title>
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
          <a class="dropdown-item" href="accept.php">Accept/Reject students</a>
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

</br>
<h2><b>Accept/Reject students in course</b></h2>
<hr>
<br>

<div id = 'requests'>


<?php

$sql = "select rollno from pr_student where course_id = $subject_id";
$result = mysqli_query($conn, $sql);
$i = 1;
$j = 1;
$dict = array();
$dict1 = array();
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo "<table><tr><th>Roll No.<th></tr>";


  while($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $row["rollno"]. "</td><td>". "<button type='button' name='accept' value='Accept' class='btn btn-primary' id=$i style='padding: 5px 24px;' onclick='accept_student($i)'>ACCEPT</button>". "   ".  "<button type='button' value='Reject' class='btn btn-danger' id = $j style='padding: 5px 24px;' onclick='reject_student($j)'>REJECT</button>"."</td></tr>";
  $dict[$i] = $row['rollno'] ;
  $i += 1;

  $dict1[$j] = $row['rollno'] ;
  $j += 1;
  }
  echo "</table>";
  } 
  
  else { echo "NO PENDING REQUESTS";}

?>

<?php $_SESSION['dict'] = $dict;?>

</table>
</div>


<div id='alert' class="alert alert-danger" role="alert" style='display:none'>
  A simple danger alert—check it out!
</div>









<script language='javascript'>

function makeVisible(){
  document.write(5+6)

  var x = document.getElementById('alert')
  if (x.style.display === "none") {
    x.style.display = "block";
  }

}

function accept_student(x) {
  var xhttp;
			
			if (window.XMLHttpRequest)
			{
				xhttp = new XMLHttpRequest();
			}
			else
			{
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
            
            
			
			xhttp.onreadystatechange = function() {
				if ( this.readyState == 4 && this.status == 200 ) {
					document.getElementById("requests").innerHTML = this.responseText;
          window.location.reload();
				}
			};
			
			xhttp.open("GET","accept_student.php?student_id=" +x , true);
			xhttp.send(null);
			
}

function reject_student(x) {
  var xhttp;
			
			if (window.XMLHttpRequest)
			{
				xhttp = new XMLHttpRequest();
			}
			else
			{
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
            
            
			
			xhttp.onreadystatechange = function() {
				if ( this.readyState == 4 && this.status == 200 ) {
					document.getElementById("requests").innerHTML = this.responseText;
				}
			};
			
			xhttp.open("GET","reject_student.php?student_id=" +x , true);
			xhttp.send(null);
			
}

</script>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>