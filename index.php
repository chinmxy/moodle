<?php
/* for logout functionality */
session_start();
session_destroy();

session_start();
if (isset($_POST['submit'])) {

	$conn = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($conn, 'ip');

	$uname = $_POST['username'];
	$_SESSION['username'] = $uname;
	$pass = $_POST['password'];
	$_SESSION['password'] = $pass;
	$current_id = '';

	$s = "select * from student where username = '$uname' and password = '$pass'";
	$result = mysqli_query($conn, $s);
	$n = mysqli_affected_rows($conn);
	if ($n == 1) {
		header('Location: student/homepage/homepage.php');
		$sql = "select rollno from student where username = '$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				$current_id = $row["rollno"];
			}
		}
	}

	$s = "select * from teacher where username = '$uname' and password = '$pass'";
	$result = mysqli_query($conn, $s);
	$n = mysqli_affected_rows($conn);
	if ($n == 1) {
		header('Location: teacher/homepage/homepage.php');
		$sql = "select teacher_id from teacher where username = '$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				$current_id = $row["teacher_id"];
			}
		}
		$subject = '';
		$sql = "select course_name from courses where teacher_id = $currentid";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
				$subject = $row["course_name"];
			}
		}
		$_SESSION['current_sub'] = $subject;
	}

	$s = "select * from admin where username = '$uname' and password = '$pass'";
	$result = mysqli_query($conn, $s);
	$n = mysqli_affected_rows($conn);
	if ($n == 1) {
		header('Location: admin/homepage/homepage.php');
		$sql = "select admin_no from admin where username = '$uname'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				$current_id = $row["admin_no"];
			}
		}
	} else {
		$message = "PLEASE ENTER VALID CREDENTIALS";
		echo "<script type='text/javascript'>alert('$message');</script>";
		// echo " ";
	}

	$_SESSION['current_id'] = $current_id;
}

?>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>CRCEMoodle-Login</title>
	<link rel="stylesheet" href="login/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="login/img/crce-logo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="" method="POST">
						<div class="input-group mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" placeholder="username">
						</div>
						<div class="input-group mb-2 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>


						<div class="d-flex justify-content-center mt-3 login_container">
							<input name='submit' type="submit" class="btn login_btn" value="Login">
						</div>

				</div>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	</br>
	</br>
	<!-- -->
	<!-- Site footer -->
	<footer class="site-footer">
		<div class="jumbotron">
			<div class="jumbo">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<h6>About</h6>
							<p class="text-justify"><b>Moodle v2.0 </b><i><br>Designed for Fr.CRCE </i><br>Moulding engineers who can build the nation.</p>
						</div>

						<div class="col-xs-6 col-md-3">
							<h6>Made Using</h6>
							<ul class="footer-links">
								<li><a href="https://html.com">HTML</a></li>
								<li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS">CSS</a></li>
								<li><a href="https://getbootstrap.com/">Bootstrap</a></li>
								<li><a href="https://www.javascript.com/">Javascript</a></li>
								<li><a href="https://www.php.net/manual/en/intro-whatis.php">PHP</a></li>

							</ul>
						</div>

						<div class="col-xs-6 col-md-3">
							<h6>Quick Links</h6>
							<ul class="footer-links">
								<li><a href="http://www.github.com/chinmxy">Github</a></li>
								<li><a href="http://www.linkedin.com/in/chinmaygawde">Linkedin</a></li>
								<li><a href="https://twitter.com/chinmayxo">Twitter</a></li>
								<li><a href="https://www.facebook.com/chinmxy">Facebook</a></li>

							</ul>
						</div>
					</div>
					<hr>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12">
							<p class="copyright-text">
								<a href="#"></a>.
							</p>
						</div>

						<!--  <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div> -->
					</div>
				</div class=heart>
				<div style='text-align:center;'>
					Made with ❤ by <a href='https://github.com/chinmxy'>Chinmay Gawde</a> and <a href='https://github.com/Dylan-Dsouza'>Dylan D`souza</a>.
				</div>
			</div>
	</footer>


</body>

</html>