<?php 
	require('db.php');
    session_start();
	$query = "SELECT cc.class_id, cc.course_id, c.course_name from coursecombo as cc, course as c where c.course_id=cc.course_id";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Course Combination List</title>
	<link rel="stylesheet" type="text/css" href="coursecombo-list.css">
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
						<span class="pathsytle"> / Course Combination</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Viewing Course Combination information</span>
							<input type="button" class="removecoursecombo" value="Remove Course Combination" onclick="location.href='remove-coursecombo.php'">
							<input type="button" class="addcoursecombo" value="Add Course Combination" onclick="location.href='add-coursecombo.php'">
							

							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-hover table-bordered" id="students-table" cellspacing="0" width="100%">
									<tr height="35px">
										<th>Class ID</th>
										<th>Course ID</th>
										<th>Course Name</th>
									</tr>
									<tbody>
										<?php 
											while($row=mysqli_fetch_assoc($result))
											{
										?>
										<tr height="35px">
	                                        <td><?php echo $row["class_id"];?></td>
	                                        <td><?php echo $row["course_id"];?></td>
	                                        <td><?php echo $row["course_name"];?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>        
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>