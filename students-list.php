<?php 
	require('db.php');
    session_start();
	$query = "SELECT s.student_id,s.student_name,s.class_id,s.student_email,s.student_gender, s.student_total from student as s";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Students List</title>
	<link rel="stylesheet" type="text/css" href="common_css.css">
	<link rel="stylesheet" type="text/css" href="subjects-list.css">
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
						<span class="pathsytle"> / Students</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Viewing students information</span>
							<input type="button" class="removestudent" value="Remove Student" onclick="location.href='remove-student.php'">
							<input type="button" class="addstudent" value="Add student" onclick="location.href='add-student.php'">
							<input type="button" class="editstudent" value="Edit student" onclick="location.href='edit-student.php'">

							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-hover table-bordered" id="students-table" cellspacing="0" width="100%">
									<tr height="35px">
										<th>USN</th>
										<th>Name</th>
										<th>Class</th>
										<th>Mail</th>
										<th>Gender</th>
										<th>Total</th>
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
	                                        <td><?php echo $row["student_email"];?></td>
	                                        <td><?php echo $row["student_gender"];?></td>
	                                        <td>
	                                        <?php
	                                        	$idstud = $row['student_id'];
	                                        	$query1 = "SELECT sum(r.marks) as stud_marks from student as s, result as r where r.student_id=s.student_id and r.class_id=s.class_id and r.student_id='$idstud' group by r.student_id";
	                                        	$studtotal = mysqli_query($con, $query1);
	                                        	$count = mysqli_num_rows($studtotal);
	                                        	$outof = "SELECT * FROM result as r where r.student_id='$idstud'";
	                                        	$outsql = mysqli_query($con, $outof);
	           									$total_out = mysqli_num_rows($outsql);
	                                        	if($count==0){
	                                        		echo "No results added";
	                                        	}
	                                        	else{
	                                        	while($ans = mysqli_fetch_assoc($studtotal)){
	                                        	echo $ans['stud_marks'] ." out of " .($total_out*40);
	                                        	$x = $ans['stud_marks'];
	                                        	$query2 = "UPDATE student SET student_total = '$x' where student_id = '$idstud'";
	                                        	$sql2 = mysqli_query($con, $query2);
	                                        	}}
	                                        ?>
	                                        </td>
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