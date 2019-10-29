<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") { } else {
    header("Location:../index.php");
}
$username = $_SESSION['username'];
$userid = $_SESSION['current_id'];
$uname = $_SESSION['username'];




?>
<html>

<head>
    <title>Forums</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../../student\homepage\homepage.css">

</head>

<body>



    <!-- NEW NAVIGATION BAR START -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="javascript:history.back()">Moodle v2.0</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <!-- separate -->




                    <li class="nav-item active">
                        <a class="nav-link" href="../../forum/pages/home.php">Forums <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#quest">Post something! <span class="sr-only">(current)</span></a>
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
    <!-- NEW NAVIGATION BAR END -->

    <div class="container p-3 mb-2 bg-white text-dark" style="margin:7% auto;">
        <div class="p-3 mb-2 bg-dark text-white">
            <h3><b>Current Discussions:</b></h3>
        </div>
        <hr>
        <?php include "../functions/db.php";

        $sel = mysqli_query($con, "SELECT * from category");
        while ($row = mysqli_fetch_assoc($sel)) {
            extract($row);
            echo '<div class="panel panel-success p-3 mb-2 bg-light text-dark">
                    <div class="panel-heading">
                    <h3 class="panel-title">' . $category . '</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <tr>
                    <th>Topic title</th>
                    <th>Category</th>
                    <th>Action</th>
                    </tr>';
            $sel1 = mysqli_query($con, "SELECT * from tblpost where cat_id='$cat_id' ");
            while ($row1 = mysqli_fetch_assoc($sel1)) {
                extract($row1);
                echo '<tr>';
                echo '<td>' . $title . '</td>';
                echo '<td>' . $category . '</td>';
                echo '<td><a href="content.php?post_id=' . $post_Id . '"><button class="btn btn-success">View</button></td>';
                echo '</tr>';
            }


            echo '</table>
                    </div>
                </div>';
        }
        ?>
        <br>
        <hr>
        <br>
        <h3> Post a forum yourself! </h3>
        <br>
        <hr>
        <br>

        <div class="my-quest" id="quest">
            <div>
                <form method="POST" action="question-function.php">

                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option></option>
                        <?php $sel = mysqli_query($con, "SELECT * from category");

                        if ($sel == true) {
                            while ($row = mysqli_fetch_assoc($sel)) {
                                extract($row);
                                echo '<option value=' . $cat_id . '>' . $category . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <label>Topic Title</label>
                    <input type="text" class="form-control" name="title" required>
                    <label>Content</label>
                    <textarea name="content" class="form-control">
                        </textarea>
                    <br>
                    <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                    <input type="submit" class="btn btn-success pull-right" value="Post">
                </form><br>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>