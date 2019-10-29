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
  <title></title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../../student\homepage\homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <link rel="stylesheet" type="text/css" href="../css/global.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


</head>

<body>
  <!-- NEW NAVIGATION BAR START -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- <a class="navbar-brand" href="javascript:history.back()">Back</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <a class="btn btn-lg btn-primary fa fa-arrow-circle-o-left" href="javascript:history.back()" role="button"> Back</a>



    </nav>
  </div>
  <!-- NEW NAVIGATION BAR END -->

  <div class="container p-3 mb-2 bg-white text-dark" style="margin:7% auto;">
    <h3><b>Current Discussion</b></h3>
    <hr>
    <div class="panel panel-success p-3 mb-2 bg-light text-dark">
      <div class="panel-heading">
        <h3 class="panel-title">Programming</h3>
      </div>
      <div class="panel-body">



        <?php

        include "../functions/db.php";
        $id = $_GET['post_id'];



        $sql = mysqli_query($con, "SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
        if ($sql == true) {
          while ($row = mysqli_fetch_assoc($sql)) {
            extract($row);

            echo "<label>Topic Title: </label> " . $title . "<br>";
            echo "<label>Topic Category: </label> " . $category . "<br>";
            echo "<label>Date time posted: </label> " . $datetime;
            echo "<p class='well'>" . $content . "</p>";
            echo "<label>Posted By: </label> $user_Id";

            $sel = mysqli_query($con, "SELECT * from tbluser where user_Id='$userid' ");
            while ($row = mysqli_fetch_assoc($sel)) {
              extract($row);
              echo "<label>Topic Title: </label> " . $title . "<br>";
              echo "<label>Topic Category: </label> " . $category . "<br>";
              echo "<label>Date time posted: </label> " . $datetime;
              echo "<p class='well'>" . $content . "</p>";
              echo '<label>Posted By: </label>' . $username;
            }
          }
        }



        ?>

        <br><label>Comments</label><br>
        <div id="comments">
          <?php
          $postid = $_GET['post_id'];
          $sql = mysqli_query($con, "SELECT * from tblcomment where post_id1='$postid' order by datetime");
          $num = mysqli_num_rows($sql);
          if ($num > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
              echo "<label>Comment by: </label> " . $row['user_id1'] . "<br>";
              echo '<label class="pull-right">' . $row['datetime'] . '</label>';
              echo "<p class='well'>" . $row['comment'] . "</p>";
            }
          }

          ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="col-sm-5 col-md-5 sidebar">
      <h3>Comment</h3>
      <form method="POST">
        <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
        <input type="hidden" name="postid" id="postid" value="<?php echo $_GET['post_id']; ?>">
        <input type="hidden" id="userid" name="postid" value="<?php echo $_SESSION['current_id']; ?>">
        <input type="submit" name="hero" id="save" class="btn btn-success pull-right" value="Comment">
      </form>
    </div>


  </div>

  <!-- <div class="my-quest" id="quest">
    <div>
      <form method="POST" action="question-function.php">

        <label>Category</label>
        <select name="category" class="form-control">
          <option></option>
          <option value="IP"> IP</option>
          <option value="ADMT">ADMT</option>
          <option value="MES">MES</option>
          <option value="CGVR">CGVR</option>
          <option value="ADSA">ADSA</option>
          <option value="BCE">BCE</option>
        </select>
        <label>Topic Title</label>
        <input type="text" class="form-control" name="title" required>
        <label>Content</label>
        <textarea name="content" class="form-control">

                        </textarea>
        <br>
        <input type="submit" class="btn btn-success pull-right" value="Post">
      </form><br>
      <hr>
      <a href="" class="pull-right">Close</a>
    </div>
  </div> -->
</body>
<script>
  $("#save").click(function() {
    var postid = $("#postid").val();
    var userid = $("#userid").val();
    var comment = $("#commenttxt").val();
    var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
    if (!comment) {
      alert("Please enter some text comment");
    } else {
      $.ajax({
        type: "POST",
        url: "../functions/addcomment.php",
        data: datastring,
        cache: false,
        success: function(result) {
          document.getElementById("commenttxt").value = ' ';
          $("#comments").append(result);
          window.location.reload();
        }
      });
    }
    return false;
  })
</script>

</html>