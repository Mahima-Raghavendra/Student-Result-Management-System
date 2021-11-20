<?php
	session_start();
	error_reporting(0);
	include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
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
		<div class="contents">
			<div class="topic">
				<span class="subtopic">Dashboard</span>
			</div>
			<div id="extras">
				<h3>Welcome to the admin section of the student result management system<h3>
			</div>
			<div class="container">
				<div class="row">
					<div class="students">
						<a class="dashboard-stat" href="students-list.php" style="text-decoration: none;">
							<div>
								<div class="number counter">
<?php
	$query = "SELECT * FROM student";
	$sql = mysqli_query($con, $query);
	if(!$sql)
	{
		echo mysqli_error();
	}
	else{
		$count = mysqli_num_rows($sql);
		echo $count;
	}
?>
								</div>
								<div class="name">Students</div>
							</div>
							<div class="bg-icon"><i class="fa fa-users"></i></div>
						</a>
					</div>
					<div class="subjects">
						<a class="dashboard-stat" href="subjects-list.php" style="text-decoration: none;">
							<div>
								<div class="number counter">
<?php
	$query = "SELECT * FROM course";
	$sql = mysqli_query($con, $query);
	if(!$sql)
	{
		echo mysqli_error();
	}
	else{
		$count = mysqli_num_rows($sql);
		echo $count;
	}
?>
								</div>
								<div class="name">Subjects</div>
							</div>
							<div class="bg-icon"><i class="fa fa-ticket"></i></div>
						</a>
					</div>
					<div class="classes">
						<a class="dashboard-stat" href="classes-list.php" style="text-decoration: none;">
							<div>
								<div class="number counter">
<?php
	$query = "SELECT * FROM class";
	$sql = mysqli_query($con, $query);
	if(!$sql)
	{
		echo mysqli_error();
	}
	else{
		$count = mysqli_num_rows($sql);
		echo $count;
	}
?>
								</div>
								<div class="name">Class</div>
							</div>
							<div class="bg-icon"><i class="fa fa-bank"></i></div>
						</a>
					</div>
					<div class="results">
						<a class="dashboard-stat" href="results-list.php" style="text-decoration: none;">
							<div>
								<div class="number counter">
<?php
	$query = "SELECT * FROM result";
	$sql = mysqli_query($con, $query);
	if(!$sql)
	{
		echo mysqli_error();
	}
	else{
		$count = mysqli_num_rows($sql);
		echo $count;
	}
?>
								</div>
								<div class="name">Results</div>
							</div>
							<div class="bg-icon"><i class="fa fa-file-text"></i></div>
						</a>
					</div>
				</div>
			</div>
			<div class="notes">
				<ul>
					<li>Click on Students tab to add or remove students</li>
					<li>Click on Subjects tab to add or remove subjects</li>
					<li>Click on Classes to include classes of the students</li>
					<li>Click on Results to update the student's result</li>
				</ul>
			</div>
			<br><br><br>
		</div>
	</div>
</body>
</html>
<?php
	mysqli_close($con);
?>