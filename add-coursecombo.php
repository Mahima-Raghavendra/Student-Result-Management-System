<?php
	session_start();
	error_reporting(0);
	include('db.php');
	if(isset($_POST['submit']))
	{
    	$courseid = $_POST['courseid'];
    	$classid = $_POST['classid'];
    	$check1 = "SELECT * from course where course_id='$courseid'";
    	$succheck1 = mysqli_query($con, $check1);
    	if(!$succheck1)
    	{
    		echo mysqli_error();
    	}
    	else{
    		$count = mysqli_num_rows($succheck1);
    		if($count==0){
    			echo "<script>
            		alert('Course does not exist. Create the course');
            		window.location.href = 'subjects-list.php';
            	  </script>";
    		}
    		else{
    			$check2 = "SELECT * from class where class_id='$classid'";
    			$succheck2 = mysqli_query($con, $check2);
    			if(!$succheck2){
    				echo mysqli_error();
    			}
    			else{
    				$cnt = mysqli_num_rows($succheck2);
    				if($cnt == 0){
    					echo "<script>
            		alert('Class does not exist. Create the Class');
            		window.location.href = 'classes-list.php';
            	  </script>";
    				}
    				else{
    					$query = "INSERT INTO coursecombo(class_id, course_id) VALUES('$classid', '$courseid')";
    					$insert = mysqli_query($con, $query);
				    	if(!$insert)
				    	{
				        	echo mysqli_error();
				    	}
				    	else
				    	{
				        	echo "<script>
				            		alert('Course and class assigned successfully!!');
				            		window.location.href = 'coursecombo-list.php';
				            	  </script>";
				    	}
    				}
    			}
    		}
    	}
	}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add student</title>
	<link rel="stylesheet" type="text/css" href="add-coursecombo.css">
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
					<div class="top">Manage Course Combination</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Course Combination / Add Course Combination</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Fill Course and class information</span>
							<form method="POST" class="fill">
								<div class="filldiv">
									Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%" required>
								</div>
								<div class="filldiv">
									Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%" required>
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