<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $classid = $_POST['classid'];
        $classname = $_POST['classname'];
        $query1 = "SELECT * from class WHERE class_id='$classid'";
        $update1 = mysqli_query($con, $query1);
        if(mysqli_num_rows($update1)!=0)
        {
            $query = "UPDATE class SET class_id='$classid', class_name='$classname' WHERE class_id='$classid'";
            $update = mysqli_query($con, $query);
            if(!$update)
            {
                echo mysqli_error();
            }
            else
            {
                echo "<script>
                        alert('Class info updated successfully!!');
                        window.location.href = 'classes-list.php';
                      </script>";
            }
        }
        else{
            echo "<script>
                    alert('No such class exists');
                    window.location.href = 'classes-list.php'
                </script>";
        }
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add student</title>
    <link rel="stylesheet" type="text/css" href="edit-class.css">
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
                    <div class="top">Manage Classes</div>
                    <hr>
                    <div class="paths">
                        <a href="dashboard.php"><span class="fa fa-home fahome"><span class="pathsytle"> Home</span></span></a>
                        <span class="pathsytle"> / Class / Edit Class</span>
                    </div>
                    <div>
                        <div class="main">
                            <span class="view">Fill Class information</span>
                            <form method="POST" class="fill">
                                <div class="filldiv">
                                    Class ID &nbsp;&nbsp;&nbsp;<input type="text" name="classid" size="80%">
                                </div>
                                <div class="filldiv">
                                    Class Name &nbsp;&nbsp;&nbsp;<input type="text" name="classname" size="80%">
                                </div>
                                <div class="editclass">
                                    <input type="submit" id="editclass" name="submit" value="Edit">
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