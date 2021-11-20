<?php
    session_start();
    error_reporting(0);
    include('db.php');
    if(isset($_POST['submit']))
    {
        $classid = $_POST['classid'];
        $classname = $_POST['classname'];
        $query ="SELECT * from class where class_id='$classid' and class_name = '$classname'";
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
                    alert('No such class exists');
                    window.location.href = 'remove-class.php';
                  </script>";
            }
            else{
                $query1 = "DELETE FROM class WHERE class_id='$classid' AND class_name='$classname'";
                $sql = mysqli_query($con, $query1);
            echo "<script>
                    alert('Class removed successfully!!');
                    window.location.href = 'classes-list.php';
                  </script>";}
        }
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add student</title>
    <link rel="stylesheet" type="text/css" href="remove-class.css">
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
                        <span class="pathsytle"> / Class / Remove Class</span>
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
                                <div class="remclass">
                                    <input type="submit" id="remclass" name="submit" value="Remove">
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