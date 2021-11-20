<?php
	require('db.php');
	session_start();
	if(isset($_POST['submit'])){
    	$old_password =  $_POST['old_password'];
    	$new_password =  $_POST['new_password'];
    	$confirm_password =  $_POST['confirm_password'];
    	$usn=$_SESSION['usn'];
    	if($_SESSION['password']==$old_password)
    	{
    		if($new_password!=$confirm_password){
    			echo "<script>
    					alert('Passwords should match');
    			  	  </script>";
    		}
    		else{
    			$query = "UPDATE student set student_password='$new_password' where student_id='$usn'";
    			$update = mysqli_query($con, $query);
    			if(!$update)
    			{
    				echo mysqli_error();
    			}
    			else{
    				echo "<script>
    						alert('Password changed successfully');
    						window.location.href = 'logout_student.php';
    			  		  </script>";
    			}
    		}
    	}
    	else{
    		echo "<script>
    				alert('Incorrect current password');
    				window.location.href = 'logout_student.php';
    			  </script>";
    	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<div class="classiddiv filldiv">
		Enter old password: &nbsp;&nbsp;&nbsp;<input type="password" name="old_password" size="80%" required>
	</div>
	<div class="classiddiv filldiv">
		Enter new password: &nbsp;&nbsp;&nbsp;<input type="password" name="new_password" size="80%" required>
	</div>
	<div class="classiddiv filldiv">
		Confirm new password: &nbsp;&nbsp;&nbsp;<input type="password" name="confirm_password" size="80%" required>
	</div>
	<div class="changepassword">
		<input type="submit" id="change" name="submit" value="Change Password" required>
	</div>
</body>
</html>