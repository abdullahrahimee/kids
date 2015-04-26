<?php 
session_start();
    include 'connect.php';
    include 'functions.php';
        
        if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
        header('location: ../../../login/form.php?login=invalid');
        session_destroy();
        }

        $selectuser = mysql_query("SELECT * FROM users WHERE u_id = '".$_SESSION['user_id']."'");
        $userrow = mysql_fetch_array($selectuser);
        $uid=$userrow['u_id']; //id no of users in users table

        $sql=mysql_query("select * from users where email = '".$userrow['email']."'");
        $row=mysql_fetch_array($sql);
        $sid=$row['u_id'];


//Read and Store teachers informations


$firstname=$row['firstname'];  
$lastname=$row['lastname'];
$phone=$row['phone'];
$address=$row['address'];
$email=$row['email'];
$password=$row['password'];
$gender=$row['gender'];
$province=$row['province'];
$birth_date=$row['b_date'];
$profile=$row['profile'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
    
.card{
    background-color: #FFFFFF;
    padding: 10px 0 20px;
    width: 100%;
}



.wizard-card .picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.wizard-card .picture{
    width: 103px;
    height: 103px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 5px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}

.wizard-card.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}

.wizard-card .picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.wizard-card .picture-src{
    width: 100%;
    
}

.wizard-card {
min-height: 100px;
min-width: 85px;
width: 135px;
background-color: #FFFFFF;
/*box-shadow: 0 0 15px rgba(0, 0, 0, 0.15), 0 0 1px 1px rgba(0, 0, 0, 0.1);*/
border-radius: 10px;
padding: 10px 0;
transition: all 0.2s;
-webkit-transition: all 0.2s;
}

  .border{border:0px; border-radius: 3px;}
  

  .profile1 img{
min-height: 90px;
min-width: 85px;
width: 135px;
height: 135px;
background-color: #FFFFFF;
box-shadow: 0 0 15px rgba(0, 0, 0, 0.15), 0 0 1px 1px rgba(0, 0, 0, 0.1);
border-radius: 10px;
padding: 10px 0;
transition: all 0.2s;
-webkit-transition: all 0.2s;
    width:20%;
    height: 20%;

  }
  .custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }

  .parsley-required{color:red;}
    .parsley-equalto{color:red;}
    .parsley-length{color:red;}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <link rel="icon" 
      type="image/png" 
      href="../../../images/tkfav.png">

    

    <title>TechKids | Dashboard</title>

     <link href="../../student/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../student/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../student/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../student/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../../../assets/js/jquery.js"></script>
    <script src="../../../assets/js/parsley.js"></script>
</head>

<body onload="allof();">

    <div id="wrapper">

       <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.html">TechKids</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$userrow['firstname']." ".$userrow['lastname']; ?> <b class="caret"></b></a>
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
                        <a href="../"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-users"></i> Kids</a>
                    </li>
				    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-book"></i> Courses <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="course.php">Joined Courses</a>
                            </li>
                            <li>
                                <a href="mycourse.php">Other Courses</a>
                            </li>
                            <li>
                                <a href="assign.php">Kids' Assignments</a>
                            </li>
                        </ul>
                    </li>

                     <li> 
                        <a href="profile_edit.php"><i class="fa fa-user"></i> Profile</a>
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
                            Change Your Password 
                            <small>Here!</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Change Password
                            </li>
                            <div class="pull-right"> <p> You are logged in as <b> <?php echo ucwords($userrow['firstname']." ".$userrow['firstname']); ?> </b> [<?php echo $userrow['type']; ?>]</p></div>
                        </ol>
                        

                    </div>


                    <!--  start body -->
<?php 

				

// echo "user id: ".$uid ."<br />";

// echo "student id: ".$sid."<br />";



?>
  <!-- New form -->
  
        <!-- End Form -->
<!-- ENd body -->

                </div>
                <div class="row" id="acc"></div>
                <div class="row">
                	<div class="col-md-12 custyle" id="ac_kid"></div>
                </div>
                <div class="row">
                	<div class="col-md-12 custyle" id="no_kid"></div>
                </div>

                <!-- /.row -->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    
<div class="modal fade bs-example-modal-lg" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title text-center" id="myModalLabel"><b id="hea">
</b></h2>
        
      </div>
      <div class="modal-body">
      	<div class="col-md-12" style="margin: 10px;">
      		<div class="row" id="show_k"></div>
      	</div>
        
        </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fa fa-angle-left"></i>		Back </button> -->
        
      </div>
      
    </div>
  </div>
 </div>
<!-- /model-->
    
    
    
    
    
    
    <script>
    	function allof (){
    		ac_kid();
    		no_kid();
    	}
    </script>
    <script>
		function ac_kid(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("ac_kid").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "../setting.php?ac_kid=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
	<script>
		function no_kid(){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("no_kid").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "../setting.php?no_kid=yes&id="+<?php echo $_SESSION['user_id']; ?>, true);
        	xmlhttp.send();
		}
	</script>
	<script>
		function acc(id){
			var x=confirm("do you really wana accept this kid");
			if(x==true){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("acc").innerHTML = xmlhttp.responseText;
					allof();
				}
			}
			xmlhttp.open("GET", "../setting.php?acc=yes&id="+id, true);
        	xmlhttp.send();
        }
		}
	</script>
    <script>
		function rej(id){
			var x=confirm("do you really wana reject this kid");
			if(x==true){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("acc").innerHTML = xmlhttp.responseText;
					allof();
				}
			}
			xmlhttp.open("GET", "../setting.php?rej=yes&id="+id, true);
        	xmlhttp.send();
        }
		}
	</script>
	<script>
		function show_kid(id){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("show_k").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "../setting.php?show_kid=yes&id="+id, true);
        	xmlhttp.send();
        }
	</script>
	<script>
		function del_kid(id){
			var x=confirm("do you really wana delete this kid");
			if(x==true){
			var xmlhttp;
			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById("acc").innerHTML = xmlhttp.responseText;
					allof();
				}
			}
			xmlhttp.open("GET", "../setting.php?del_kid=yes&id="+id, true);
        	xmlhttp.send();
        }
		}
	</script>
    <!-- /#wrapper -->
<script src="../../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../../student/assets/js/jquery-1.11.2.min.js"></script>


</body>

</html>
