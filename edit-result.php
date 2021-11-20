<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $usn = $_POST['usn'];
        $courseid = $_POST['courseid'];
        $marks = $_POST['marks'];
        $query = "SELECT * FROM result where student_id = '$usn' and course_id = '$courseid'";
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
                    alert('No such result exists');
                    window.location.href = 'edit-result.php';
                  </script>";
            }
            else{
                $query = "UPDATE RESULT SET marks='$marks' WHERE student_id='$usn' and course_id='$courseid'";
                $sql = mysqli_query($con, $query);
            echo "<script>
                    alert('Result updated successfully!!');
                    window.location.href = 'results-list.php';
                  </script>";
              }
        }
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Result</title>
    <link rel="stylesheet" type="text/css" href="edit-result.css">
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
                        <span class="pathsytle"> / Result / Edit Result</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill students information</span>
                            <form method="POST" class="fill">
                                <div class="usndiv filldiv">
                                    USN &nbsp;&nbsp;&nbsp;<input type="text" name="usn" size="80%">
                                </div>
                                <div class="namediv filldiv">
                                    Course ID &nbsp;&nbsp;&nbsp;<input type="text" name="courseid" size="80%">
                                </div>
                                <div class="classiddiv filldiv">
                                    Marks &nbsp;&nbsp;&nbsp;<input type="text" name="marks" size="80%">
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