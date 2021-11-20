<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $classid = $_POST['classid'];
        $query = "SELECT * FROM student where student_id = '$usn'";
        $update = mysqli_query($con, $query);
        $count = mysqli_num_rows($update);
        if(!$update)
        {
            echo mysqli_error();
        }
        else
        {
            if($count==0){
                echo "<script>
                        alert('No such student found!!');
                        window.location.href = 'edit-student.php';
                      </script>";
            }
            else{
                $query1 = "UPDATE STUDENT SET student_name='$name', student_email='$email', student_gender='$gender', class_id = '$classid' WHERE student_id='$usn'";
                $update2 = mysqli_query($con, $query1);
                echo "<script>
                        alert('Student info updated successfully!!');
                        window.location.href = 'students-list.php';
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
    <link rel="stylesheet" type="text/css" href="edit-student.css">
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
                    <div class="top">Manage Students</div>
                    <hr>
                    <div class="paths">
                        <a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
                        <span class="pathsytle"> / Students / Add students</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill students information</span>
                            <form method="POST" class="fill">
                                <div class="usndiv filldiv">
                                    USN &nbsp;&nbsp;&nbsp;<input type="text" name="usn" size="80%">
                                </div>
                                <div class="namediv filldiv">
                                    Name &nbsp;&nbsp;&nbsp;<input type="text" name="name" size="80%">
                                </div>
                                <div class="emaildiv filldiv">
                                    Email &nbsp;&nbsp;&nbsp;<input type="text" name="email" size="80%">
                                </div>
                                <div class="genderdiv">
                                    Gender &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="M" checked="checked"> Male <input type="radio" name="gender" value="F"> Female 
                                </div>
                                <div class="classiddiv filldiv">
                                    Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%">
                                </div>
                                <div class="addstud">
                                    <input type="submit" id="addstud" name="submit" value="Edit">
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