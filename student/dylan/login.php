
<?php
	session_start();
	if (isset($_POST['submit']))
	{

		$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn , 'ip');
		
		$uname = $_POST['username'];
		$_SESSION['username'] = $uname;
		$pass = $_POST['pass'];
		$_SESSION['password'] = $pass;
		
		$s = "Select * from student where username = '$uname' and password = '$pass'";
		$result = mysqli_query($conn , $s);
		$n = mysqli_affected_rows($conn);
		if ($n == 1)
		{
			header('Location: student.php');
		}
    
    $s = "Select * from teacher where username = '$uname' and password = '$pass'";
		$result = mysqli_query($conn , $s);
		$n = mysqli_affected_rows($conn);
		if ($n == 1)
		{ 
			header('Location: teacher.php');
		}
    
	}
	
 ?>



<html>
	<head>
<title>Printer</title>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
<div class="login">
    <div class="row">
    
    <ul class="homenav">
    <li><a href="login.php" class='active'>Login</a></li>
    <li><a href="signup.php">Sign up</a></li>
    <li><a href="about.php">About</a></li>
    </ul>
    <h1 class="welcome">
        WELCOME TO CRCE PRINTERS</h1>
    </div>
	<div class='form'>
	<form align="center" method='POST' action="">
		<input type="text" name="username" size="20" maxlength="30" class="uname" placeholder="Username" required>
		<br>
		<input type="password" name="pass"  class="psswd"  placeholder="Password" required>
		<br>
		<input type="submit" value="Login" name='submit' id='submit'	>
	</form>
	</div>
<p class="signup">Not a user? </p> <a class="su" href="signup.php">Sign up</a>

</div>
</header>
</body>
</html>