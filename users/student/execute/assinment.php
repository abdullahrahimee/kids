<?php 
    include 'connect.php';
    include 'functions.php';
        
        if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
        header('location: ../../../login/form.php?login=invalid');
        session_destroy();
        }

        $selectuser = mysql_query("SELECT * FROM users WHERE u_id = '".$_SESSION['user_id']."'");
        $userrow = mysql_fetch_array($selectuser);
        $users_id=$userrow['u_id']; //id no of users in users table
        $uname=$userrow['firstname'];
        $uemail=$userrow['email'];

        $user_query=mysql_query("SELECT * FROM users WHERE firstname='".$uname."' AND email='".$uemail."'");
        $run_user = mysql_fetch_array($user_query);
        $username=$run_user['firstname']; 
        $s_id=$run_user['u_id'];

        $query=mysql_query("SELECT * FROM assignment");

//Read and Store students informations

$firstname=$run_user['firstname'];  
$lastname=$run_user['lastname'];

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

    

    <title>TechKids | Course</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userrow['firstname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                    <li>
                        <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                     <li>
                        <a href="profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>

                    <li> 
                        <a href="course.php"><i class="fa fa-book"></i> Courses</a>
                    </li>
                   
                    <li>
                        <a href="mycourse.php"><i class="fa fa-book"></i> Joined Course</a>
                    </li>
                       <li>
                        <a href="assinment.php"><i class="fa fa-book"></i> Assignment</a>
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
                            Courses
                            <small> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Assignments
                            </li>
                        </ol>

                    </div>

                </div>

<?php

// echo "users id: ".$users_id."<br />";
// echo "stu id: ".$s_id;



?>
                <!-- /.row -->
<!-- Start The Main Body -->
                    <div class="col-md-12">
    <h3>You Can See Your Assignment Here!</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">See Assignments</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                </div>
            </div>
            
            <div id="mess"> </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters" align="center">
                         <th> <input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="File Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                        <th>Download</th>

                </tr>
                </thead>
                <tbody>
                   
    <?php while($result=mysql_fetch_array($query)){ ?>
            <tr>
     <td><?php echo $result['a_id'] ?></td>
     <td><?php echo $result['file_name'] ?></td>

     
     <td><?php $course_name=mysql_fetch_array(mysql_query("SELECT * FROM course WHERE c_id=".$result['c_id']));
     echo $course_name['name']; ?></td>

     <td><?php echo $result['des'] ?></td>
     <td><button class="btn btn-success"><a href="<?php echo $result['path']?>">Download</a></button></td>
      
        
 
        </tr>
             <input type="hidden" id="c_id" value="<?php echo $result['c_id']; ?>">
        <?php } ?>
    
    
                </tbody>
            </table>

             <!-- Start- ajax for join course -->
        <script type="text/javascript">
        function join(c_id){
          var s_id=<?php echo $s_id; ?>;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
           

            xmlhttp.open("GET","stu_join.php?join=yes&s_id="+s_id+"&c_id="+c_id,true);
              xmlhttp.send();
        }
        </script>

             <script type="text/javascript">
        function unjoin(c_id){
          var s_id=<?php echo $s_id; ?>;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }


             //<!-- Start- ajax for download materials -->
        <script type="text/javascript">
        function download(a_id){

          var s_id=<?php echo $u_id; ?>;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
           

            xmlhttp.open("GET","stu_join.php?unjoin=yes&s_id="+s_id+"&c_id="+c_id,true);
              xmlhttp.send();
        }
        </script>
    <!-- End - ajax for join course -->

        </div>
    </div>
</div>
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

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









                <!-- End The Main Body -->
                


            </div>
            <!-- /.container-fluid -->
            

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
