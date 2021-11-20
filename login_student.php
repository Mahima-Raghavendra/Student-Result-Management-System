<?php
    require('db.php');
    session_start();
    //mysqli_close($con);
    if(isset($_POST['submit'])){
    	$usn =  $_POST['usn'];
    	$password =  $_POST['password'];
    	$query = "SELECT * FROM student as s where s.student_id='$usn' and s.student_password='$password'";
    	$sql = mysqli_query($con,$query);
    	$rows = mysqli_num_rows($sql);
    	if($rows == 1){
    		$_SESSION['usn'] = $usn;
    		$_SESSION['password'] = $password;
    		$query1 = "SELECT * FROM result as r where r.student_id = '$usn'";
    		$query2 = "SELECT * from coursecombo as cc, student as s where s.student_id='$usn' and s.class_id=cc.class_id";
    		$sql1 = mysqli_query($con, $query1);
    		$sql2 = mysqli_query($con, $query2);
    		$row = mysqli_num_rows($sql1);
    		$row1 = mysqli_num_rows($sql2);
    		echo $row1;
    		if($row!=$row1)
    		{
    			echo "<script> alert('All subjects results not yet declared')</script>";
    		}
    		else{
    			header("Location: new_page.php");
    		}
    	}
    	else{
    		echo "<script>
    				alert('Invalid USN and password');
    			  </script>";
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login_student.css">
	<link rel="stylesheet" href="bootstrap original/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="login_student.js"></script>
</head>
<body>
	<div class="Entire">
		<div id="login">
			<form class="inner_login" method="post">
				<div id="stud_logo"></div>
				<div id="heading">Student Login</div>
				<div class="namepass left-addon" id="userspace">
					<span class="glyphicon glyphicon-user"></span>
					<input class="uname" type="text" name="usn" placeholder="USN" id="uname" required>
				</div>
				<div class="namepass left-addon" id="passspace">
					<span class="glyphicon glyphicon-lock"></span>
					<input id="password" class="uname" type="password" name="password" placeholder="Password" required>
				</div>
				<div class="showpass">
					<input type="checkbox" name="pass" onclick="showpassword()"> Show password
				</div>
				<input type="submit" id="loginbutton" name="submit" onmouseover="loginbuttonin()" onmouseout="loginbuttonout()" value="Login">
				<div class="admin">
					Click here for <a href="login_admin.php">Admin login</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>