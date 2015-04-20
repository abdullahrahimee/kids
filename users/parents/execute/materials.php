<?php 
    include 'connect.php';
    include 'functions.php';
        if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
        header('location: ../../../login/form.php?login=invalid');
        session_destroy();
        }

        $selectuser = mysql_query("SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'");
        $userrow = mysql_fetch_array($selectuser);
        $users_id=$userrow['id']; //id no of users in users table

        $sql=mysql_query("select * from students where email = '".$userrow['email']."'");
        $row=mysql_fetch_array($sql);
        $stu_id=$row['s_id'];

        $query=mysql_query("SELECT * FROM materials");



//Read and Store students informations

$firstname=$row['firstname'];  
$lastname=$row['lastname'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/parsley.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" 
      type="image/png" 
      href="../../../images/tkfav.png">

    

    <title>TechKids | Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->

     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$userrow['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#..//execute/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                        <a href="execute/profile_edit.php"><i class="fa fa-fw fa-users"></i> Kids</a>
                    </li>
				    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-book"></i> Courses <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Joined Courses</a>
                            </li>
                            <li>
                                <a href="#">Other Courses</a>
                            </li>
                        </ul>
                    </li>

                     <li> 
                        <a href="execute/course.php"><i class="fa fa-user"></i> Profile</a>
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
                            Materials
                            <small> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Materials
                            </li>
                        </ol>

                    </div>

                </div>

                <!-- /.row -->
<!-- Start The Main Body -->
                    <div class="col-md-12">
    <h3>You Can download Your  Course Materials Here!</h3>
    <hr>
    <div class="row">
	
	
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Course And Categories</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <!-- <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Username" disabled></th> -->
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>File_Name</th>
                    <th>Course_ID</th>
					<th>Downloads</th>
                    </tr>
                </thead>
                <tbody>
                   
    <?php while($result=mysql_fetch_assoc($query)){ ?>
            <tr>
     <td><?php echo $result['id'] ?></td>
     <td><?php echo $result['subject'] ?></td> 
     <td><?php echo $result['desc'] ?></td>
     <td><?php echo $result['file_name'] ?></td>
     <td><?php echo $result['course_id'] ?></td>
	 <td><a href="<?php echo $result['path'];?>/<?php echo $result['file_name']; ?>"><p data-placement="top" data-toggle="tooltip" title="Download Matarial"><button  class="btn btn-warning btn-sm"><span class="fa fa-download fa-lg" ></span></button></p></a></td>
	 </tr>
        
        <?php } ?>
    
    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

                    /*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});

                </script>
                <!-- End The Main Body -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	
    <!-- jQuery -->
	<script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->

</body>
</html>
