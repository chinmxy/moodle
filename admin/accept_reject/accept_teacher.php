<?php

session_start();

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];
$currentid = $_SESSION['current_id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'ip');


if (isset($_POST['accept'])) {

    echo $row['rollno'];
}

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
    <div>
        <div class="spinner-border text-primary" id='loader' role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

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

                            <a class="dropdown-item" href="accept.php">Accept/Reject students</a>
                            <a class="dropdown-item" href="accept_teacher.php">Accept/Reject teachers</a>
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

    </br>
    <h2><b>Accept/Reject teachers:</b></h2>
    <hr>
    <br>

    <div id='requests'>


        <?php

        $sql = "select teacher_id,course_name from pr_teacher";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $j = 1;
        $dict = array();
        $dict1 = array();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table><tr><th>Teacher ID</th><th>Course</th></tr>";


            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['course'] = $row["course_name"];
                echo "<tr><td>" . $row["teacher_id"] . "</td><td>" . $row["course_name"] . "</td><td>" . "<button type='button' name='accept' value='Accept' class='btn btn-primary' id=$i style='padding: 5px 24px;' onclick='accept_t($i)'>ACCEPT</button>" . "   " .  "<button type='button' value='Reject' class='btn btn-danger' id = $j style='padding: 5px 24px;' onclick='reject_t($j)'>REJECT</button>" . "</td></tr>";
                $dict[$i] = $row['teacher_id'];
                $i += 1;

                $dict1[$j] = $row['course_name'];
                $j += 1;
            }
            echo "</table>";
        } else {
            echo '<div class="alert alert-danger m-5 text-center" role="alert">
   No Pending Request!
  </div>';
        }

        ?>

        <?php $_SESSION['dict'] = $dict;
        $_SESSION['dict1'] = $dict1;

        ?>

        </table>
    </div>


    <div id='alert' class="alert alert-danger" role="alert" style='display:none'>
        A simple danger alert—check it out!
    </div>







    <script language='javascript'>
        function accept_t(x) {
            var xhttp;

            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }



            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("requests").innerHTML = this.responseText;
                    window.location.reload();
                }
            };

            xhttp.open("GET", "t_accept.php?t_id=" + x, true);
            xhttp.send(null);

        }

        function reject_t(x) {
            var xhttp;

            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }



            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("requests").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "t_reject.php?t_id=" + x, true);
            xhttp.send(null);

        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#loader').hide();
        });
    </script>
</body>

</html>