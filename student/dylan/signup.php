<?php
	if (isset($_POST['submit']))
	{
		session_start();
		$conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn , 'ip');
    
    $rollno= $_POST['rollno'];
		$fname = $_POST['name'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
    $choice = $_POST['choice'];

    echo "initial check vaar".$choice;
      
    $s = "select * from student where uname = '$uname' ";
    
		$result = mysqli_query($conn,$s);
		$n = mysqli_affected_rows($conn);
		if ($n == 1)
		{
			echo "User Name TAKEN";
    }
    
    $s = "select * from teacher where uname = '$uname' ";
    
		$result = mysqli_query($conn,$s);
		$n = mysqli_affected_rows($conn);
		if ($n == 1)
		{
			echo "User Name TAKEN";
    }

   else{
    
    if($choice == 'student'){
      $t = "insert into student values ('$rollno','$uname','$pass','$fname')";
    mysqli_query($conn , $t);
    echo "Signed up successfully as student";

    }

    else{
      $t = "insert into teacher values ('$rollno','$uname','$pass','$fname')";
    mysqli_query($conn , $t);
    echo "Signed up successfully as teacher";
    }
    
    
    
    

   } 
    
		}
 ?>
 
<html>
<head>
    <title>Sign up for printing</title>
    <link href="sstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
    <div class="row">
    
    <ul class="homenav">
    <li><a href="login.php" >Login</a></li>
    <li><a href="signup.php" class='active'>Sign up</a></li>
    <li><a href="about.php">About</a></li>
    </ul>
    <h1>WELCOME TO CRCE PRINTERS</h1>
    </div>
                
    <div class="form">
    <h1 class='signup'>Sign Up to Access Printers</h1>
    
    <form align="left" method='POST' action="">
        
    <input type="text" size="5" maxlength="15" name="rollno" class="form" placeholder="Roll number/Teacher number" required><br>
        <input type="text" size="10" maxlength="15" name="name" class="form" placeholder="Name" required><br>
        
        <input type="text" size="10" maxlength="15" name="uname" class="form" placeholder="Username" required><br>
      
        <input type="password" size="20" maxlength="20" name="pass" class="form" placeholder="Password"><br>
        <input type="password" size="20" maxlength="20" name="cpass" class="form" placeholder="Re-confrim Password"><br>
        <select name="choice">
      <option value="teacher">Teacher</option>
      <option value="student">Student</option>
      
      </select>

        <input type="submit" value="Sign Up" name='submit' class='submit'></input> 

        
        
        </form>
    
    </div>
    
    </header>
    
    
    </body>
    
</html>