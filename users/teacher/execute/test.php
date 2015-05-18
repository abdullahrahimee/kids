<?php
include '../../student/execute/connect.php';
include 'auth.php';

// include '../../users/student/execute/functions.php';
 $my_id = $_SESSION['user_id']; 
$user_query1=mysql_query("SELECT * FROM users WHERE u_id='$my_id'");
$run_user1 = mysql_fetch_array($user_query1) or die(mysql_error());

$uname=$run_user1['firstname']; 
$uid=$run_user1['u_id'];
$upass=$run_user1['password'];
$uemail=$run_user1['email'];
$user_level=$run_user1['type'];



$user_query=mysql_query("SELECT * FROM users WHERE type='teacher' AND email='".$uemail."'");
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']; 
$t_id=$run_user['u_id'];


$user_query2=mysql_query("SELECT * FROM join_course WHERE u_id=$t_id");

$co="0";
while($run_user2= mysql_fetch_array($user_query2)){
$co.=$run_user2['c_id'].",";
}

$co.=substr($co,0, strlen($co)-1);

$query=mysql_query("SELECT * FROM course WHERE c_id IN (".$co.")");
// echo $co.' this is the error';

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
    <link rel="stylesheet" type="text/css" href="../../../assets/css/parsley.css">
  <script type="text/javascript">
     function assinment(id)
     {
        $("#assinment_modal").modal('show');
         // $("#view_action_div").html("lodading....").load('assinment.php','&id='+id);
     }
  </script>
  <!-- // <script type="text/javascript" src="../../../assets/js/validation.js"></script> -->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navar-header">
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

                


    <div class="row">
        
        
        <div class="col-md-12">
        
        <div class="table-responsive">

<?php 
if(!isset($_SESSION['user_id'])){
  header("location: ../../../login/form.php?log=fail");
  session_destroy();
}


?>
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                  <th>ID</th>
                    
                        <th>Assignment</th>
                   </thead>
    <tbody>
        <?php while($result=mysql_fetch_assoc($query)){ ?>
            <tr>
      
     <td><button class="btn btn-primary"  onclick="assign(<?php echo $result['c_id']; ?>)" data-title="Edit" data-toggle="modal" data-target="#assinment">Assignment</button></td>
    </tr>
        
        <?php } ?>
    
    </tbody>
        
</table>
 

 
                
            </div>
            
        </div>
    </div>
</div>

<!-- modal section -->
 
    
    
       <!-- start of Assigment model -->
                
<div class="modal fade" id="assinment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" id="demo">
      <div class="modal-dialog" style="width:800px" >
    <div class="modal-content" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Asignment in here</h4>
      </div>
          <div class="modal-body">
            <!-- modal Table -->
            
             <div id="ass"></div>
            
            <!-- end of table -->
 

            <!-- End of modal Table -->
      </div>
          <div class="modal-footer ">
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
   
             <!-- end of Assignment model -->
  
<script src="../../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../../student/assets/js/jquery-1.11.2.min.js"></script> 
<script type="text/javascript" src="../../../assets/js/parsley.js"></script>
<script>
    function assign(id){
      var xmlhttp;
      if(window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
      }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
         document.getElementById("ass").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "setting.php?id="+id, true);
          xmlhttp.send();
    }
  </script>
<script type="text/javascript">
        function show(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('content').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","tab2.php?show=yes&id="+id+"&name="+name,true);
              xmlhttp.send();
        }
        </script>

               <script type="text/javascript">
  $('#demo').parsley();
</scri

          
</body>
</html>
