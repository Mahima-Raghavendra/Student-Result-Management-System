<?php
	session_start();
	error_reporting(0);
	include('db.php');
	if(isset($_POST['submit']))
	{
    	$usn = $_POST['usn'];
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$gender = $_POST['gender'];
    	$classid = $_POST['classid'];
    	$query1 = "SELECT * from class where class_id='$classid'";
    	$update = mysqli_query($con, $query1);
    	if(mysqli_num_rows($update)==0)
    	{
    		echo "<script>
    				alert('No such class exists');
    				</script>";
    	}
    	else{
	    	$query = "INSERT INTO student(student_id, student_name, student_email, student_gender, class_id) VALUES('$usn', '$name', '$email', '$gender', '$classid')";
	    	$insert = mysqli_query($con, $query);
	    	if(!$insert)
	    	{
	        	echo mysqli_error();
	    	}
	    	else
	    	{
	        	echo "<script>
	            		alert('Student added successfully!!');
	            		window.location.href = 'students-list.php';
	            	  </script>";
	    	}
    	}
	}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add student</title>
	<link rel="stylesheet" type="text/css" href="add-student.css">
	<link rel="stylesheet" type="text/css" href="common_css.css">
	<link rel="stylesheet" href="bootstrap original/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<div class="heading">
			<span class="glyphicon glyphicon-user"></span>
			<h3>Admin Login</h3>
			<button class="glyphicon glyphicon-log-out" onclick="location.href='logout_admin.php'">Logout</button>
		</div>
		<div class="content">
			<?php include('leftbar.php');?>
			<div class="sample">
				<div class="container">
					<div class="top">Manage Students</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Students / Add students</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Fill students information</span>
							<form method="POST" class="fill">
								<div class="usndiv filldiv">
									USN &nbsp;&nbsp;&nbsp;<input type="text" name="usn" size="80%">
								</div>
								<div class="namediv filldiv">
									Name &nbsp;&nbsp;&nbsp;<input type="text" name="name" size="80%">
								</div>
								<div class="emaildiv filldiv">
									Email &nbsp;&nbsp;&nbsp;<input type="text" name="email" size="80%">
								</div>
								<div class="genderdiv">
									Gender &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="M" checked="checked"> Male <input type="radio" name="gender" value="F"> Female 
								</div>
								<div class="classiddiv filldiv">
									Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%">
								</div>
								<div class="addstud">
									<input type="submit" id="addstud" name="submit" value="Add">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>