<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$_SESSION['username'] = $uname;
$_SESSION['password'] = $pass;

$currentroll='';

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn , 'ip');

$sql = "select rollno from student where username = '$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $currentroll = $row["rollno"];
    }
} else {
  $sql = "select teacher_id from teacher where username = '$uname'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $currentroll = $row["teacher_id"];
      }
  } else {
      echo "0 results";
  }
}

$_SESSION['currentrollno'] = $currentroll;

$cns='';
$ip='';
$bce='';
$admt='';
$mes='';

$sql1 = "select cns,ip,bce,admt,mes from marks where marks.rollno = '$currentroll'";
$result1 = mysqli_query($conn, $sql1);
  
  if (mysqli_num_rows($result1) > 0) {
      // output data of each row
      while($row1 = mysqli_fetch_assoc($result1)) {
          $cns = $row1["cns"];
          $ip = $row1["ip"];
          $bce = $row1["bce"];
          $admt = $row1["admt"];
          $mes = $row1["mes"];
      }
  } else {
      echo "0 results";
  }


  if (isset($_POST['pass-change-button'])){
    $current_pass  = $_POST['current-pass-1'];
    $new_pass_1 = $_POST['new-pass-1'];
    $new_pass_2 = $_POST['new-pass-2'];
    

    
    
    if($new_pass_1 != $new_pass_2){
      echo "Passwords do not match";
    }
    elseif($current_pass == $new_pass_1){
      echo "New password same as old password";

    }
    else{
      
      $sql3 = "update student set password = '$new_pass_1' where rollno = $currentroll";
      $result3 = mysqli_query($conn, $sql3);
      if ($result3)
      {
        echo "password changed successfully";
      }
    }
  
  
  }
?>


<!-- HTML START -->

<html>

<head>
<title>Courses</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">

</head>

<body>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Moodle v2.0</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">My Courses</a>
          <a class="dropdown-item" href="#">Enroll</a>
          
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Forums <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
      Hello, <?php echo $uname; ?>  |
      <a href="../login/index.php"><button class="btn btn-outline-danger">Logout</button> 
    </form>
  </div>
</nav>

</div>

<!-- COPIED -->

<!-- Bootstrap NavBar -->

      
      <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
      <li class="nav-item dropdown d-sm-block d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
            <a class="dropdown-item" href="#">Dashboard</a>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Tasks</a>
            <a class="dropdown-item" href="#">Etc ...</a>
        </div>
      </li><!-- Smaller devices menu END -->
      
    </ul>
  </div>
</nav><!-- NavBar END -->


<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span> 
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu1' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Charts</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Reports</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Tables</span>
                </a>
            </div>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Profile</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Settings</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" onclick='showPasswordWindow()'>
                    <span class="menu-collapsed">Password</span>
                </a>
            </div>            
            <a href="#" class="bg-dark list-group-item list-group-item-action" onclick="showMarksWindow()">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-tasks fa-fw mr-3"></span>
                    <span class="menu-collapsed">Marks</span>    
                </div>
            </a>
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPTIONS</small>
            </li>
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-calendar fa-fw mr-3"></span>
                    <span class="menu-collapsed">Calendar</span>
                </div>
            </a>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-envelope-o fa-fw mr-3"></span>
                    <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
                </div>
            </a>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>            
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-question fa-fw mr-3"></span>
                    <span class="menu-collapsed">Help</span>
                </div>
            </a>
            <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
            <!-- Logo -->
            <li class="list-group-item logo-separator d-flex justify-content-center">
                <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width="30" height="30" />    
            </li>   
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col" id="temp-landing">
        <!--
        <h1>
            Your marks
            <small class="text-muted">Version 2.1</small>
        </h1>
        -->
        
        <div class="card">
            <h4 class="card-header">This is landing page temporarily</h4>
            <div class="card-body">
                <ul>
                    <li>K O H I N O O R</li>
                    
                </ul>
            </div>
        </div>
       
        

    </div>
    
    <!-- CHANGE PASSWORD -->
    <div class="col" id="change-password" style="display:none">
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




    <!-- MARKS MAIN WINDOW -->
    <div class="col" id="student-marks" style="display:none">
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

<!-- SCRIPTS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="javascript" src="app.js"></script>

<script>
function removeElement() {
  document.getElementById("mainreal").style.display = "none";
}

function changeVisibility() {
  document.getElementById("imgbox2").style.visibility = "hidden";
}

function resetElement() {
  document.getElementById("imgbox1").style.display = "block";
  document.getElementById("imgbox2").style.visibility = "visible";
}

function showMarksWindow(){
  document.getElementById("temp-landing").style.display = "none";
  document.getElementById("student-marks").style.display = "block";
}

function showPasswordWindow(){
  document.getElementById("temp-landing").style.display = "none";
  document.getElementById("change-password").style.display = "block";
}
</script> 
<!-- SCRIPTS END -->


</body>

</html>