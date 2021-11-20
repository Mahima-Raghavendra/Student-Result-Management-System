<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login_admin.css">
	<link rel="stylesheet" href="bootstrap original/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	
	<script src="login_admin.js"></script>
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['admin_name'])) {
        $admin_name = stripslashes($_REQUEST['admin_name']);  
        $admin_name = mysqli_real_escape_string($con, $admin_name);
        $admin_password = stripslashes($_REQUEST['admin_password']);
        $admin_password = mysqli_real_escape_string($con, $admin_password);
        $query    = "SELECT * FROM `admin` WHERE admin_name='$admin_name' AND admin_password='$admin_password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['admin_name'] = $admin_name;
            header("Location: dashboard.php");
        } else {
            echo "<script>
            		alert('Invalid admin_name or admin_password');
            		window.location.href = 'login_admin.php';
            	  </script>";
        }
    } else {
?>
	<div class="Entire">
		<div id="login">
			<form class="inner_login" method="POST">
				<div id="stud_logo"></div>
				<div id="heading">Admin Login</div>
				<div class="namepass left-addon" id="userspace">
					<span class="glyphicon glyphicon-user"></span>
					<input class="uname" type="text" name="admin_name" placeholder="Username" id="uname" required>
				</div>
				<div class="namepass left-addon" id="passspace">
					<span class="glyphicon glyphicon-lock"></span>
					<input id="password" class="uname" type="password" name="admin_password" placeholder="Password" required>
				</div>
				<div class="showpass">
					<input type="checkbox" name="pass" onclick="showpassword()"> Show password
				</div>
				<input type="submit" id="loginbutton" onmouseover="loginbuttonin()" onmouseout="loginbuttonout()" value="Login">
				<div class="admin">
					Click here for <a href="login_student.php">Student login</a>
				</div>
			</form>
		</div>
	</div>
<?php
    }
?>
</body>
</html>