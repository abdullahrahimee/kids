<?php

include 'execute/connect.php';
include 'execute/functions.php';
include 'execute/auth.php';

mysql_connect('localhost', 'root', 'root');
mysql_select_db('newkids');

//echo $_SESSION['user_id']; //show the user which currently login

$userselect = mysql_query("SELECT * FROM users WHERE u_id = '" . $_SESSION['user_id'] . "'");
$userrow = mysql_fetch_array($userselect);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" 
      type="image/png" 
      href="../../images/tkfav.png">

    <title>Parents | Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body onload="all();">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TechKids</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                

        <!-- //Edit Profile Options -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userrow['firstname']." ".$userrow['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="execute/profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="execute/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="execute/kid.php"><i class="fa fa-fw fa-users"></i> Kids</a>
                    </li>
				    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-book"></i> Courses <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="execute/course.php">Joined Courses</a>
                            </li>
                            <li>
                                <a href="execute/mycourse.php">Other Courses</a>
                            </li>
                            <li>
                                <a href="execute/assing.php">Kids' Assignments</a>
                            </li>
                        </ul>
                    </li>

                     <li> 
                        <a href="execute/profile_edit.php"><i class="fa fa-user"></i> Profile</a>
                    </li>
                  
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo ucwords($userrow['firstname']." ".$userrow['lastname']); ?> <small>Dashboard</small>
                       
                                 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>  Dear <b> <?php echo $userrow['firstname']." ".$userrow['lastname']; ?></b>, Welcome to your Dashboard!
                            </li>

                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="kid_count"></div>
                                        <div>Your Kids!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="course_count"></div>
                                        <div>Courses!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-newspaper-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="ass_count"></div>
                                        <div>Assignment!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" id="com_count"></div>
                                        <div>Teachers Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

<!--  //start All the text for body -->
    <div>
                    
    </div>
<!--  //End All the text for body -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<script>
		function all(){
			count_kid();
			count_course();
			count_ass();
			count_com();
		}
	</script>
	
	<script>
		function count_kid(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("kid_count").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "setting.php?kid=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
	<script>
		function count_course(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("course_count").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "setting.php?course=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
	<script>
		function count_ass(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("ass_count").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "setting.php?ass=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
	<script>
		function count_com(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("com_count").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "setting.php?com=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="assets/js/plugins/morris/raphael.min.js"></script>
    <script src="assets/js/plugins/morris/morris.min.js"></script>
    <script src="assets/js/plugins/morris/morris-data.js"></script>

</body>

</html>
