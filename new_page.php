<?php
	include('db.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result page</title>
	<link rel="stylesheet" type="text/css" href="new_page.css">
	<link rel="stylesheet" href="bootstrap original/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="print.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="heading">
			<span class="glyphicon glyphicon-user"></span>
			<h3>Student Login</h3>
			<button class="glyphicon glyphicon-log-out" onclick="location.href='logout_student.php'">Logout</button>
		</div>
		<div id="main">
			<div class="result">
				<div class="header">Student Result Details</div>
				<hr>
				<div class="studname">
					<b>Student Name:</b>		
<?php
	$usn = $_SESSION['usn'];
	$password = $_SESSION['password'];
	$query1 = "SELECT s.* from student as s, result as r where s.student_id='$usn'";
	$sql1 = mysqli_query($con, $query1);
	if(!$sql1)
	{
		echo mysqli_error();
	}
	else{
			$row = mysqli_fetch_assoc($sql1);
				echo $row['student_name'];?>
				</div>
				<div class="studusn">
					<b>Student USN:</b> <?php echo $row['student_id']; ?>
				</div>
				<div class="studclass">
					<b>Student Class:</b> <?php echo $row['class_id']; ?>
				</div>
<?php } ?>								
				<div class="resulttable">
					 <table class="table table-hover table-bordered" border="1" style="width: 90%; margin: auto; margin-top:50px;">
	                    <thead>
	                        <tr style="text-align: center">
	                            <th style="text-align: center">Sl. No.</th>
	                            <th style="text-align: center">Course ID</th>    
	                            <th style="text-align: center">Course Name</th>
	                            <th style="text-align: center">Marks</th>
	                        </tr>
	                    </thead>
	                    <tbody>
<?php 
	$query2 = "SELECT * FROM result as r where r.student_id='$usn' order by r.course_id";
	$sql2 = mysqli_query($con, $query2);
	$count = 1;
	$totalmarks = 0;
	while($stmt = mysqli_fetch_assoc($sql2))
	{
		$cid = $stmt['course_id'];
		$query3 = "SELECT DISTINCT c.course_name FROM course as c where c.course_id='$cid'";
		$sql3 = mysqli_query($con, $query3);
		$res = mysqli_fetch_assoc($sql3);
?>
							<tr>
								<td style="text-align: center;"><?php echo $count ?></td>
								<td style="text-align: center;"><?php echo $stmt['course_id'];?></td>
								<td style="text-align: center;"><?php echo $res['course_name'];?></td>
								<td style="text-align: center;"><?php echo $stmt['marks'];?></td>
							</tr>
<?php $count++;
$totalmarks = $totalmarks + $stmt['marks'];}?>
							<tr style="background-color: #f2f2f2;">
								<th scope="row" colspan="3" style="text-align: center">Total Marks</th>
								<td style="text-align: center"><b><?php echo htmlentities($totalmarks); ?></b> out of <b><?php echo htmlentities($outof=($count-1)*40); ?></b></td>
                            </tr>
                            <tr style="background-color: #f2f2f2;">
								<th scope="row" colspan="3" style="text-align: center">Percentage</th>
								<td style="text-align: center"><b><?php echo htmlentities(round(($totalmarks/$outof*100),2)); ?> %</td>
                            </tr>
                            <tr>
                              	<td colspan="4" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" onclick="printDiv()"></i></td>
                            </tr>
                    	</tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	mysqli_close($con);
?>
