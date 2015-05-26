<?php
session_start();
include 'execute/auth.php';
include '../student/execute/connect.php';

// include '../../users/student/execute/functions.php';
$my_id = $_SESSION['user_id']; 
$user_query=mysql_query("SELECT * FROM users WHERE u_id=$my_id");
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']." ".$run_user['lastname']; 
$user_level=$run_user['type'];
$query=mysql_query("SELECT * FROM course");


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

    <title>TechKids</title>

    <!-- Bootstrap Core CSS -->
    <link href="../student/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../student/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../student/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   

</head>

<body>

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
                <a class="navbar-brand" href="index.php">TechKids</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="execute/profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../student/execute/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="execute/profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>

                    <li>
                        <a href="execute/course.php"><i class="fa fa-book"></i> Course</a>
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
                            <?php echo $username; ?>
                            <small>Dashboard</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>  Dear <b> <?php echo $username; ?></b>, Welcome to your Dashboard!
                            </li>

                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <script src="../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../student/assets/js/jquery-1.11.2.min.js"></script>

</body>

</html>
