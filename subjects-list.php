<?php 
	require('db.php');
    session_start();
	$query = "SELECT c.course_id, c.course_name from course as c";
	$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Students List</title>
	<link rel="stylesheet" type="text/css" href="subjects-list.css">
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
					<div class="top">Manage Courses</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Course</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Viewing Course information</span>
							<input type="button" class="removesubject" value="Remove course" onclick="location.href='remove-course.php'">
							<input type="button" class="addsubject" value="Add course" onclick="location.href='add-course.php'">
							<input type="button" class="editsubject" value="Edit course" onclick="location.href='edit-course.php'">

							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-hover table-bordered" id="students-table" cellspacing="0" width="100%">
									<tr height="35px">
										<th>Course ID</th>
										<th>Course Name</th>
									</tr>
									<tbody>
										<?php 
											while($row=mysqli_fetch_assoc($result))
											{
										?>
										<tr height="35px">
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