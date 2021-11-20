<?php 
	require('db.php');
    session_start();
	$query = "SELECT DISTINCT s.student_id, s.student_name, c.class_id from student as s, result as r, class as c where r.student_id=s.student_id AND r.class_id = c.class_id AND r.class_id=s.class_id";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result List</title>
	<link rel="stylesheet" type="text/css" href="results-list.css">
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
					<div class="top">Manage Results</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Results</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Viewing Result information</span>
							<!--<input type="button" class="removeresult" value="Edit Result" onclick="location.href='edit-result.php'">-->
							<input type="button" class="addresult" value="Add Result" onclick="location.href='add-result.php'">
							<input type="button" class="editresult" value="Edit result" onclick="location.href='edit-result.php'">
							<input type="button" class="removeresult" value="Remove result" onclick="location.href='remove-result.php'">

							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-hover table-bordered" id="students-table" cellspacing="0" width="100%">
									<tr height="35px">
										<th>Student ID</th>
										<th>Student Name</th>
										<th>Class ID</th>
										<th>No of subject's results declared</th>
									</tr>
									<tbody>
										<?php 
											while($row=mysqli_fetch_assoc($result))
											{
										?>
										<tr height="35px">
	                                        <td><?php echo $row["student_id"];?></td>
	                                        <td><?php echo $row["student_name"];?></td>
	                                        <td><?php echo $row["class_id"];?></td>
	                                        <td><?php
	                                        	$idstud = $row['student_id'];
	                                        	$outof = "SELECT * FROM result as r where r.student_id='$idstud'";
	                                        	$outsql = mysqli_query($con, $outof);
	           									$total_out = mysqli_num_rows($outsql);
	           									echo $total_out.' subject(s)';?>
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