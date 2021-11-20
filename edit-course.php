<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $course_id = $_POST['courseid'];
        $course_name = $_POST['coursename'];
        $query1 = "SELECT * FROM course where course_id='$course_id'";
        $update1 = mysqli_query($con, $query1);
        if(mysqli_num_rows($update1)==0)
        {
            echo "<script>
                    alert('No such course exists');
                    window.location.ref='edit-course.php';
                  </script>";
        }
        else
        {
            $query = "UPDATE course SET course_id='$course_id', course_name='$course_name' WHERE course_id='$course_id'";
            $update = mysqli_query($con, $query);
            if(!$update)
            {
                echo mysqli_error();
            }
            else
            {
                echo "<script>
                        alert('Course info updated successfully!!');
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
    <title>Add student</title>
    <link rel="stylesheet" type="text/css" href="edit-course.css">
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
                        <span class="pathsytle"> / Course / Edit Course</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill Course information</span>
                            <form method="POST" class="fill">
                                <div class="filldiv">
                                    Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%">
                                </div>
                                <div class="filldiv">
                                    Course Name &nbsp;&nbsp;&nbsp;<input type="text" name="coursename" size="80%">
                                </div>
                                <div class="editcourse">
                                    <input type="submit" id="editcourse" name="submit" value="Edit">
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