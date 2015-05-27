<?php

include 'auth.php';
 // echo$uid; 
include '../../users/student/execute/connect.php';
 
  $q_st=mysql_query("SELECT * FROM users WHERE type!='super' AND type='student'");
  $q_te=mysql_query("SELECT * FROM users WHERE type!='super' AND type='teacher'");
  $q_ad=mysql_query("SELECT * FROM users WHERE type!='super' AND type='admin'");
  $q_pa=mysql_query("SELECT * FROM users WHERE type!='super' AND type='parent'");
   if(isset($_SESSION['del-done'])){
             echo $_SESSION['del-done'];
             $_SESSION['del-done']='';
              echo "<meta http-equiv='refresh' content='1'>";


      }
      
      else if(isset($_SESSION['del-done'])){
             echo $_SESSION['del-done'];
             $_SESSION['del-done']='';
             echo "<meta http-equiv='refresh' content='1'>";

      }
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

    <title>TechKids | Admin</title>

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
                <a class="navbar-brand" href="index.php">TechKids Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
               
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
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
                    <h1 class="page-header">Manage Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
              
                <!-- /.col-lg-8 -->
                <div class="col-lg-11">


    <!--  start body -->







               
    <h3>You Can "Add, Delete, Active, Deactive" The Accounts</h3>
    <hr>
   
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Students</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="UserName" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                        <th> Activation </th>
                        <th> &nbsp;</th>
                        
                        <th> Delete </th>

                    </tr>
                </thead>
                <tbody>
				
                <?php
                $count=1;
				 while($result=mysql_fetch_assoc($q_st)){ ?>
                    <tr> 
                      
                      <td> <?php echo $count; $count++; ?> </td>
                      <td><?php echo $result['firstname'] ?></td>
                      <td><?php echo $result['email'] ?></td>
                      <td><?php echo $result['type'] ?></td> 
                       

                       <!-- buttons -->


                    <td> <?php 
                        if($result['status'] == 'active'){ 
                            echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:red'>  Disable </b> </a>"; //pass tow parameter
                        }
                        else{echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:green;width:74px;'> Enable </b> </a>";
                        }
                    ?>
                     </td>

                     

                    <td>
                            

                    </td>

                        
      <td> <a href="del_user.php?uid=<?php echo $result['u_id'];?>" class="btn btn-danger fa fa-remove" onclick="return confirm('do you realy want to delete this record?');"> </a></td>



                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Teachers</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="UserName" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                        <th> Activation </th>
                        <th> &nbsp;</th>
                        
                        <th> Delete </th>

                    </tr>
                </thead>
                <tbody>

                <?php
                $count=1;
                 while($result=mysql_fetch_assoc($q_te)){ ?>
                    <tr> 
                      
                      <td> <?php echo $count; $count++; ?></td>
                      <td><?php echo $result['firstname'] ?></td>
                      <td><?php echo $result['email'] ?></td>
                      <td><?php echo $result['type'] ?></td> 
                       

                       <!-- buttons -->


                    <td> <?php 
                        if($result['status'] == 'active'){ 
                            echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:red'>  Disable </b> </a>"; //pass tow parameter
                        }
                        else{echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:green;width:74px;'> Enable </b> </a>";
                        }
                    ?>
                     </td>

                     

                    <td>
                            

                    </td>

                        
      <td> <a href="del_user.php?uid=<?php echo $result['u_id'];?>" class="btn btn-danger fa fa-remove" onclick="return confirm('do you realy want to delete this record?');"> </a></td>



                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
	<div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Admins</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="UserName" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                        <th> Activation </th>
                        <th> &nbsp;</th>
                        
                        <th> Delete </th>

                    </tr>
                </thead>
                <tbody>

                <?php
                $count=1;
                 while($result=mysql_fetch_assoc($q_ad)){ ?>
                    <tr> 
                      
                      <td> <?php echo $count; $count++; ?> </td>
                      <td><?php echo $result['firstname'] ?></td>
                      <td><?php echo $result['email'] ?></td>
                      <td><?php echo $result['type'] ?></td> 
                       

                       <!-- buttons -->


                    <td> <?php 
                        if($result['status'] == 'active'){ 
                            echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:red'>  Disable </b> </a>"; //pass tow parameter
                        }
                        else{echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:green;width:74px;'> Enable </b> </a>";
                        }
                    ?>
                     </td>

                     

                    <td>
                            

                    </td>

                        
      <td> <a href="del_user.php?uid=<?php echo $result['u_id'];?>" class="btn btn-danger fa fa-remove" onclick="return confirm('do you realy want to delete this record?');"> </a></td>



                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
	<div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Parents</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="UserName" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                        <th> Activation </th>
                        <th> &nbsp;</th>
                        
                        <th> Delete </th>

                    </tr>
                </thead>
                <tbody>

                <?php
                $count=1;
                 while($result=mysql_fetch_assoc($q_pa)){ ?>
                    <tr> 
                      
                      <td> <?php echo $count; $count++; ?> </td>
                      <td><?php echo $result['firstname'] ?></td>
                      <td><?php echo $result['email'] ?></td>
                      <td><?php echo $result['type'] ?></td> 
                       

                       <!-- buttons -->


                    <td> <?php 
                        if($result['status'] == 'active'){ 
                            echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:red'>  Disable </b> </a>"; //pass tow parameter
                        }
                        else{echo "<a href='check.php?u_id=".$result['u_id']."&status=".$result['status']."'> <b class='btn btn-default' style='color:green;width:74px;'> Enable </b> </a>";
                        }
                    ?>
                     </td>

                     

                    <td>
                            

                    </td>

                        
      <td> <a href="del_user.php?uid=<?php echo $result['u_id'];?>" class="btn btn-danger fa fa-remove" onclick="return confirm('do you realy want to delete this record?');"> </a></td>



                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>

    <!-- end body -->


 
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
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

</body>

</html>
