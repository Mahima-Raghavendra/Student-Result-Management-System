<?php
	session_start();
	error_reporting(0);
	include('db.php');
	if(isset($_POST['submit']))
	{
    	$courseid = $_POST['courseid'];
    	$coursename = $_POST['coursename'];
    	$query = "SELECT * FROM COURSE WHERE course_id = '$courseid'";
    	$insert = mysqli_query($con, $query);
    	$count = mysqli_num_rows($insert);
    	if(!$insert)
    	{
        	echo mysqli_error();
    	}
    	else
    	{
    		if($count!=0){
    			echo "<script>
            		alert('Course ID already exists.');
            		window.location.href = 'add-course.php';
            	  </script>";

    		}
    		else{
    			$query1 = "INSERT INTO course(course_id, course_name) VALUES('$courseid', '$coursename')";
    			$sql = mysqli_query($con, $query1);
        		echo "<script>
            		alert('Subject added successfully!!');
            		window.location.href = 'subjects-list.php';
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
	<link rel="stylesheet" type="text/css" href="add-course.css">
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
					<div class="top">Manage Course</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Course / Add Course</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Fill students information</span>
							<form method="POST" class="fill">
								<div class="filldiv">
									Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%">
								</div>
								<div class="filldiv">
									Course Name &nbsp;&nbsp;&nbsp;<input type="text" name="coursename" size="80%">
								</div>
								<div class="addcourse">
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