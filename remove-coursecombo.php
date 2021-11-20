<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $courseid = $_POST['courseid'];
        $classid = $_POST['classid'];
        $query = "SELECT * FROM coursecombo WHERE course_id ='$courseid' AND class_id='$classid'";
        $rem = mysqli_query($con, $query);
        if(!$rem){
            echo mysqli_error();
        }
        else{
            if(mysqli_num_rows($rem) == 0){
                echo "<script>
                    alert('No such combination exists');
                    window.location.href = 'coursecombo-list.php';
                  </script>";
            }
            else{
                $query1 = "DELETE FROM coursecombo WHERE course_id='$courseid' AND class_id='$classid'";
                $update = mysqli_query($con, $query1);
                if(!$update)
                {
                    echo mysqli_error();
                }
                else
                {
                    echo "<script>
                            alert('Combination removed successfully!!');
                            window.location.href = 'coursecombo-list.php';
                          </script>";
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
    <link rel="stylesheet" type="text/css" href="remove-coursecombo.css">
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
                        <span class="pathsytle"> / Course Combination / Remove Course Combination</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill Course and class information</span>
                            <form method="POST" class="fill">
                                <div class="usndiv filldiv">
                                    Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%">
                                </div>
                                <div class="namediv filldiv">
                                    Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%">
                                </div>
                                <div class="remcourse">
                                    <input type="submit" id="remcourse" name="submit" value="Remove">
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