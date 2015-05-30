<?php
include 'auth.php';
 // echo$uid; 
include '../../users/student/execute/connect.php';
 
  $query=mysql_query("SELECT * FROM users where type='super'");
 
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
      href="../images/tkfav.png">

    <title>TechKids | Super Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css" >


    <style type="text/css">

        .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TechKids Super Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../form.php?logout=out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Super</a>
                        </li>
                        <li class="active">
                            <a href="gallery.php"><i class="fa fa-image fa-fw"></i> Gallery</a>
                        </li>
                        <li>
                            <a href="user.php"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Course</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To Super Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
              <?php
              if (isset($_GET['insert']) && $_GET['insert']=='done') {
                  echo '<div class="alert alert-success">Gallery has been created Successfully</div>';
              }elseif(isset($_GET['insert']) && $_GET['insert']=='done'){
              	  echo '<div class="alert alert-success">Failed to Creat Gallery</div>';
              }
              ?>
                <!-- /.col-lg-8 -->
                <div class="col-lg-11">
                	<div class="col-md-12 panel panel-default">
  <div class="col-md-12 custom">
    <form class = "form_custom" id="equipment_form" action="insertion.php" method="POST" enctype="multipart/form-data">
      	<fieldset>
			<div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-10">
                	<label for="date" class="control-label">Album Name:</label>
                    <input type="text" class="form-control" name="name" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-10">
                    	<label for="status" class="control-label">Date:</label>
                        <input type="text" type="text" data-provide="datepicker" class="form-control datepicker" name="date">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-12">
                    <div class="col-sm-6 form-group pull-left" id="FileUploadContainer">
                        <label for="width" class="control-label">Pictures:</label>
                        <input type="file" class="form-control" id="file" name="pic[]"><a href="javascript:;" onclick ="AddFileUpload()">+ Add More</a>
                    </div>&nbsp;
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary pull-right preview-add-button" value="Submit">
                </div>
            </div>
	   </fieldset>
	</form>   
</div>         
</div> <!-- / panel preview -->


 
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script>
    var counter = 0;
    	function AddFileUpload()
    {
         var div = document.createElement('DIV');
         div.innerHTML = '<input id="file' + counter + '" name = "pic[]" type="file" class="form-control" />' +
                         '<a id="Button' + counter + '" ' +
                         ' onclick = "RemoveFileUpload(this)" />-Remove</a>';
         document.getElementById("FileUploadContainer").appendChild(div);
         counter++;
    }
    </script>
    <script>
    
    	function RemoveFileUpload(div)
    {
         document.getElementById("FileUploadContainer").removeChild(div.parentNode);
    }
    </script>
    <script src="../assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		$(function () {
            $('.datepicker').datetimepicker({
                daysOfWeekDisabled: [0, 6]
            });
    });
	</script>
</body>
</html>
