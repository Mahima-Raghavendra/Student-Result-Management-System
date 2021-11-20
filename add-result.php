<?php
	session_start();
	error_reporting(0);
	include('db.php');
	if(isset($_POST['submit']))
	{	
		$studentid = $_POST['studentid'];
		$classid = $_POST['classid'];
    	$courseid = $_POST['courseid'];
    	$mark = $_POST['marks'];
    	$marks = number_format($mark);
    	$query3 = "SELECT * FROM coursecombo as cc where cc.course_id='$courseid' AND cc.class_id = '$classid'";
    	$sql3 = mysqli_query($con, $query3);
    	$count3 = mysqli_num_rows($sql3);
    	if ($count3 != 0){
    		$query4 = "SELECT * FROM student as s where s.student_id='$studentid' and s.class_id='$classid'";
    		$sql4 = mysqli_query($con, $query4);
    		$count4 = mysqli_num_rows($sql4);
    		if($count4 != 0){
    			$query5 = "SELECT * FROM result where student_id='$studentid' and class_id='$classid' and course_id= '$courseid'";
    			$sql5 = mysqli_query($con, $query5);
    			$count = mysqli_num_rows($sql5);
    			if(!$sql5)
		    	{
		        	echo mysqli_error();
		    	}
		    	else
		    	{
		    		if($count!=0){
		    			echo "<script>
		            		alert('Result already exists for the given details');
		            		window.location.href = 'results-list.php';
		            	  </script>"; 
		    		}
		    		else{
		    			$query6 = "INSERT INTO result(marks, student_id, class_id, course_id) VALUES('$marks', '$studentid', '$classid','$courseid')";
		    			$sql = mysqli_query($con,$query6);
		    			/*$query1 = "SELECT sum(r.marks) as stud_marks from student as s, result as r where r.student_id=s.student_id and r.class_id=s.class_id and r.student_id='$studentid' group by r.student_id";
	                    $studtotal = mysqli_query($con, $query1);
	                    $ans = mysqli_fetch_assoc($studtotal);
		    			$x = $ans['stud_marks'];
	                    $query2 = "UPDATE student SET student_total = '$x' where student_id = '$studentid'";*/
	                    $query2 = "CALL `calc_total`($student_id);";
	                    $sql2 = mysqli_query($con, $query2);
	                    $query = "CALL `auto_result_id`();";
	                    $sql6 = mysqli_query($con, $query);
			        	echo "<script>
			            		alert('Result added successfully!!');
			            		window.location.href = 'results-list.php';
			            	  </script>";
			            	}
		    	}
    		}
    		else{
    			echo "<script>
		            	alert('There is no student with mentioned class');
		            	window.location.href = 'add-result.php';
		            </script>";
    		}
    	}
    	else{
    		echo "<script>
		            alert('No such combination of course and class exists.');
		            window.location.href = 'add-result.php';
		        </script>";
    	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add student</title>
	<link rel="stylesheet" type="text/css" href="add-result.css">
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
					<div class="top">Manage Result</div>
					<hr>
					<div class="paths">
						<a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
						<span class="pathsytle"> / Result / Add Result</span>
					</div>
					<div>
						<div class="main">
							<span class="view">Fill students information</span>
							<form method="POST" class="fill">
								<!--<div class="filldiv">
									Result ID &nbsp;&nbsp;&nbsp;<select name="resultid" onchage="">
								<option value="">Select Result ID</option>
<?php
	/*$sql2 = "SELECT DISTINCT r.result_id from result as r";
	$query2 = mysqli_query($con, $sql2);
		while($row = mysqli_fetch_assoc($query2)){?>
								<option value='<?php echo $row["result_id"]; ?>'><?php echo $row["result_id"]; ?></option>
<?php }*/?>
</select>							
								</div>-->
								<div class="filldiv">
									Student ID &nbsp;&nbsp;&nbsp;<select name="studentid">
								<option value="">Select Student ID</option>
<?php
	$sql1 = "SELECT s.student_id from student as s;";
	$query1 =  mysqli_query($con, $sql1);
	if(mysqli_num_rows($query1) == 0){
		echo "<script>
            	alert('No students to display.');
            	window.location.href = 'add-result.php';
            </script>";
	}
	else{
		while($row = mysqli_fetch_assoc($query1)){?>
								<option value='<?php echo $row["student_id"]; ?>'><?php echo $row["student_id"]; ?></option>

<?php }} ?>
</select>
								</div>
								<div class="classiddiv filldiv">
									Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%" required>
								</div>
								<div class="classiddiv filldiv">
									Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%" required>
								</div>
								<div class="classiddiv filldiv">
									Marks &nbsp;&nbsp;&nbsp;<input type="text" name="marks" size="80%" required>
								</div>
								<div class="addcourse">
									<input type="submit" id="addstud" name="submit" value="Add" required>
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
<?php
	mysqli_close($con);
?>