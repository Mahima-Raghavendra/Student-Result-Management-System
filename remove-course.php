<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $courseid = $_POST['courseid'];
        $coursename = $_POST['coursename'];
        $query = "SELECT * FROM course where course_id='$courseid' and course_name = '$coursename'";
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
                    alert('No such course exists');
                    window.location.href = 'remove-course.php';
                  </script>";
            }
            else{
                $query1 = "DELETE FROM course where course_id='$courseid' and course_name = '$coursename'";
                $sql = mysqli_query($con, $query1);
                echo "<script>
                        alert('Subject removed successfully!!');
                        window.location.href = 'subjects-list.php';
                      </script>";
              }
        }
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remove subject</title>
    <link rel="stylesheet" type="text/css" href="remove-course.css">
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
                    <div class="top">Manage Course</div>
                    <hr>
                    <div class="paths">
                        <a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
                        <span class="pathsytle"> / Course / Remove Course</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill Course information</span>
                            <form method="POST" class="fill">
                                <div class="usndiv filldiv">
                                    Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%">
                                </div>
                                <div class="namediv filldiv">
                                    Course Name &nbsp;&nbsp;&nbsp;<input type="text" name="coursename" size="80%">
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