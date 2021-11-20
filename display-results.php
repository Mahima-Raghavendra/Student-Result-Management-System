<?php
session_start();
error_reporting(0);
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">Result Management System</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section" id="exampl">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h3 align="center">Student Result Details</h3>
                                                    <hr />
		<p><b>Student Name :</b> Mahima R</p>
		<p><b>Student Roll Id :</b> 1BG18CS062</p>
		<p><b>Student Class:</b> CSE5A</p>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">#</th>
                                                            <th style="text-align: center"> Subject</th>    
                                                            <th style="text-align: center">Marks</th>
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
                                                		<tr>
<th scope="row" style="text-align: center">1</th>
<td style="text-align: center">ME</td>
<td style="text-align: center">40</td>
                                                		</tr>
                                                        <tr>
<th scope="row" style="text-align: center">2</th>
<td style="text-align: center">CN</td>
<td style="text-align: center">38</td>
                                                        </tr>
                                                        <tr>
<th scope="row" style="text-align: center">3</th>
<td style="text-align: center">DBMS</td>
<td style="text-align: center">37</td>
                                                        </tr>
                                                        <tr>
<th scope="row" style="text-align: center">4</th>
<td style="text-align: center">ATC</td>
<td style="text-align: center">39</td>
                                                        </tr>
                                                        <tr>
<th scope="row" style="text-align: center">5</th>
<td style="text-align: center">ADP</td>
<td style="text-align: center">40</td>
                                                        </tr>
                                                        <tr>
<th scope="row" style="text-align: center">6</th>
<td style="text-align: center">UP</td>
<td style="text-align: center">35</td>
                                                        </tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Total Marks</th>
<td style="text-align: center"><b>229</b> out of <b>240</b></td>
                                                        </tr>
<tr>
<th scope="row" colspan="2" style="text-align: center">Percentage</th>           
<td style="text-align: center"><b>95.42 %</b></td>
</tr>

                                                	</tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                   

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
