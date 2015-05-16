<?php
include '../../student/execute/connect.php';
include 'auth.php';

// include '../../users/student/execute/functions.php';
 $my_id = $_SESSION['user_id']; 
$user_query1=mysql_query("SELECT * FROM users WHERE u_id=$my_id") or die(mysql_error());
$run_user1 = mysql_fetch_array($user_query1) or die(mysql_error());

$uname=$run_user1['firstname']; 
$uid=$run_user1['u_id'];
$upass=$run_user1['password'];
$uemail=$run_user1['email'];
$user_level=$run_user1['type'];
$query=mysql_query("SELECT * FROM course");


$user_query=mysql_query("SELECT * FROM users WHERE firstname='".$uname."' AND email='".$uemail."'") or die(mysql_error());
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']; 
$t_id=$run_user['u_id'];





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
      href="../../../images/tkfav.png">

    <title>TechKids</title>

     <link href="../../student/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../student/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../student/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../student/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                
                

        <!-- //Edit Profile Options -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../../student/execute/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                        <a href="course.php"><i class="fa fa-book"></i> Course</a>
                    </li>

                      <li>
                        <a href="mycourse.php"><i class="fa fa-book"></i> Joined Course</a>
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
                           Join<small> Your Favorite Course</small>
                       
                              
                              </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Join Our Course
                            </li>
                        </ol>   
                        

                    </div>


    <div class="row">
        
    <?php 
      // echo " &nbsp;&nbsp;&nbsp;&nbsp;teacher id: ".$t_id."<br />";
      //  echo "&nbsp;&nbsp;&nbsp;&nbsp;teacher Name: ".$uname;


       ?> 


        <div class="col-md-12">
        <h4 class="col-md-offset-0.1 alert alert-success text-center">All Available Course In Here!</h4>
        <div class="table-responsive">

<?php 
if(!isset($_SESSION['user_id'])){
  header("location: ../../../login/form.php?log=fail");
  session_destroy();
}


?>
                <div id="mess"> </div>
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                  <th>ID</th>
                      <th>Class Name</th>
                     <th>Start_Date</th>
                     <th>End_Date</th>
                     <th>Start_Time</th>
                     <th>End_Time</th>
                     
                      
                       <th>Join Class</th>
                   </thead>
    <tbody>
        <?php while($result=mysql_fetch_assoc($query)){ ?>
            <tr>
     <td><?php echo $result['c_id'] ?></td>
     <td><?php echo $result['name'] ?></td>
     <td><?php echo $result['start_date'] ?></td>
     <td><?php echo $result['end_date'] ?></td>
     <td><?php echo $result['start_time'] ?></td>
     <td><?php echo $result['end_time'] ?></td>
     <td><p data-placement="top" data-toggle="tooltip" title="Upload Matarial"><?php
     $que=mysql_query("SELECT * FROM join_course WHERE c_id=".$result['c_id']." AND u_id=".$t_id) or die(mysql_error());
     $num=mysql_num_rows($que);
if ($num!=1) {
  echo '<button onclick="join('.$result['c_id'].')"  class="btn btn-success btn-sm" style="width:75px"><span>  <b> + Join </b></span></button>';
}else{
  echo '<button onclick="unjoin('.$result['c_id'].')"  class="btn btn-danger btn-sm"><span>  <b> + Un Join </b></span></button>';
}
     ?></p></td>
    </tr>

        <input type="hidden" id="c_id" value="<?php echo $result['c_id']; ?>">

      
        
        <?php } ?>
    
    </tbody>
        
</table>

 <!-- Start- ajax for join course -->
        <script type="text/javascript">
        function join(c_id){
          var t_id=<?php echo $t_id; ?>;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
           

            xmlhttp.open("GET","tea_join.php?join=yes&t_id="+t_id+"&c_id="+c_id,true);
              xmlhttp.send();
        }
        </script>

             <script type="text/javascript">
        function unjoin(c_id){
          var t_id=<?php echo $t_id; ?>;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
           

            xmlhttp.open("GET","tea_join.php?unjoin=yes&t_id="+t_id+"&c_id="+c_id,true);
              xmlhttp.send();
        }
        </script>
    <!-- End - ajax for join course -->



                
            </div>
            
        </div>
    </div>
</div>

<!-- modal section -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="width:1200px;">
    <div class="modal-content"  >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Student in <?php echo $result['name']; ?> Class</h4>
      </div>
          <div class="modal-body">
            <!-- modal Table -->
                <div class="container">
    <h3>You Can search in this table by click on the Filter</h3>
    <hr>

    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Students <button class="btn btn-default btn-xs btn-filter pull-right"><span class="fa fa-filter"></span> Filter</button></h3>
                
                    
               
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Father Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Address" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email Adress" disabled></th>
                    </tr>
                </thead>
                <tbody id="content">
                    

                </tbody>
            </table>
        </div>
    </div>
</div>

            <!-- End of modal Table -->
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
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
<script src="../../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../../student/assets/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$.noConflict();
jQuery(document).ready(function(){
    jQuery('.filterable .btn-filter').click(function(){
        var jQuerypanel = jQuery(this).parents('.filterable'),
        jQueryfilters = jQuerypanel.find('.filters input'),
        jQuerytbody = jQuerypanel.find('.table tbody');
        if (jQueryfilters.prop('disabled') == true) {
            jQueryfilters.prop('disabled', false);
            jQueryfilters.first().focus();
        } else {
            jQueryfilters.val('').prop('disabled', true);
            jQuerytbody.find('.no-result').remove();
            jQuerytbody.find('tr').show();
        }
    });

    jQuery('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var jQueryinput = jQuery(this),
        inputContent = jQueryinput.val().toLowerCase(),
        jQuerypanel = jQueryinput.parents('.filterable'),
        column = jQuerypanel.find('.filters th').index(jQueryinput.parents('th')),
        jQuerytable = jQuerypanel.find('.table'),
        jQueryrows = jQuerytable.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var jQueryfilteredRows = jQueryrows.filter(function(){
            var value = jQuery(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        jQuerytable.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        jQueryrows.show();
        jQueryfilteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if (jQueryfilteredRows.length === jQueryrows.length) {
            jQuerytable.find('tbody').prepend(jQuery('<tr class="no-result text-center"><td colspan="'+ jQuerytable.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>



</body>
</html>
