<?php
include 'auth.php';
include '../users/student/execute/connect.php';
 

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
      href="../images/tkfav.png">

    <title>TechKids | Admin</title>
  
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css" >


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
                        <li><a href="form.php?logout=out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        

                        <li>
                            <a href="user.php"><i class="fa fa-edit fa-fw"></i> Users</a>
                        </li>

                        <li>
                            <a href="course.php"><i class="fa fa-table fa-fw"></i> Course</a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- Start body -->
        <div id="page-wrapper">
            <div class="row">
            
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Courses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
              
                <!-- /.col-lg-8 -->
                <div class="col-lg-12">
    <h3>You Can Manage Your Courses Here!</h3>
    <hr>
    <div class="row">
    <div id="alert1"> </div>
    
    <?php


      if(isset($_SESSION['done'])){
             echo $_SESSION['done'];
             $_SESSION['done']='';
              // echo "<meta http-equiv='refresh' content='1'>";


      }
      
      else if(isset($_SESSION['faild'])){
             echo $_SESSION['faild'];
             $_SESSION['faild']='';
             // echo "<meta http-equiv='refresh' content='1'>";

      }

    ?>

    <button class="btn btn-default pull-right" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="insert(<?php $cat_id=mysql_fetch_array(mysql_query("SELECT * FROM course_category"));echo $cat_id['id'];?>)">
     + Add New Course </button> <br />

        <div class="panel panel-primary filterable">
            
            <div class="panel-heading">

                <h3 class="panel-title">Course And Categories</h3>
                <div class="pull-right">
                    <!-- <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button> -->
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="filters">
                        <th>ID</th>
                        <th>Course_Name</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Fee</th>

                        <th> show </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>
                   
    <?php while($result=mysql_fetch_assoc($query)){ ?>
            <tr>
     <td><?php echo $result['c_id'] ?></td>
     <td><?php echo $result['name'] ?></td>

     <!-- view the course categories -->
     <!-- <td><?php //echo $result['category_id'] ?></td> -->

      <td><?php $course_name=mysql_fetch_array(mysql_query("SELECT * FROM course_category WHERE id=".$result['category_id']));
     echo $course_name['name']; ?></td> 

      

     <td><?php echo @$result['des'] ?></td>
     <td><?php echo $result['fee'] ?></td>

      <td> <a class="btn btn-success fa fa-eye" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="show(<?php echo $result['c_id']; ?>)"> </a></td>
     <td> <a class="btn btn-primary fa fa-edit" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="edit(<?php echo $result['c_id']; ?>)"> </a></td>
      <td> <a href="del_course.php?id=<?php echo $result['c_id'];  ?>" class="btn btn-danger fa fa-remove" onclick="return confirm('do you realy want to delete this record?');"> </a></td>


    </tr>
        
        <?php } ?>
    
    
                </tbody>
            </table>
        </div>
    </div>
</div>


    

<!--start - Modal for Show Data -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:1200px;">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Course Information</h4>
      </div>
      <div class="container">

        <div id="mess"></div>
        

      </div>
      
    </div>
  </div>
</div>

<!--start - Modal for Show Data -->


    <!-- Start- ajax for show data -->
        <script type="text/javascript">
        function show(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","setting.php?show=yes&id="+id,true);
              xmlhttp.send();
        }
        </script>
    <!-- End - ajax for show data -->


    <!-- Start- ajax for edit data -->
        <script type="text/javascript">
        function edit(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","setting.php?edit=yes&id="+id,true);
              xmlhttp.send();
        }
        </script>

    <!-- End- ajax for edit data -->

    <!-- Start- ajax for update data -->
        <script type="text/javascript">
        function update(id){
            var name=document.getElementById("name").value;
            var cat=document.getElementById("cat").value;
            var des=document.getElementById("des").value;
            var fee=document.getElementById("fee").value;
            var start_date=document.getElementById("sdate").value;
            var end_date=document.getElementById("edate").value;
            var start_time=document.getElementById("stime").value;
            var end_time=document.getElementById("etime").value;
          
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('alert1').innerHTML=xmlhttp.responseText;
                    // window.location.href = "http://localhost/kids/admin/course.php";
                }
            }
            xmlhttp.open("GET","setting.php?update=yes&id="+id+"&name="+name+"&cat="+cat+"&des="+des+"&fee="+fee+"&start_date="+start_date+"&end_date="+end_date+"&start_time="+start_time+"&end_time="+end_time, true);
              xmlhttp.send();
        }
        </script>
    <!-- End - ajax for update data -->


<!-- Start- ajax for insert data -->
        <script type="text/javascript">
        function insert(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                    // window.location.href = "http://localhost/kids/admin/course.php";
                }
            }
            xmlhttp.open("GET","setting.php?insert=yes&id="+id, true);
              xmlhttp.send();
        }
        </script>
        
           <script type="text/javascript">
        function add(){
            var name=document.getElementById("name").value;
            var cat=document.getElementById("cat").value;
            var des=document.getElementById("des").value;
            var fee=document.getElementById("fee").value;
            var start_date=document.getElementById("sdate").value;
            var end_date=document.getElementById("edate").value;
            var start_time=document.getElementById("stime").value;
            var end_time=document.getElementById("etime").value;
            var t_id=document.getElementById("tea_id").value;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('alert1').innerHTML=xmlhttp.responseText;
                    // window.location.href = "http://localhost/kids/admin/course.php";
                }
            }
            xmlhttp.open("GET","setting.php?add=yes&name="+name+"&cat="+cat+"&des="+des+"&fee="+fee+"&start_date="+start_date+"&end_date="+end_date+"&start_time="+start_time+"&end_time="+end_time+"&t_id="+t_id, true);
              xmlhttp.send();
        }
        </script>
    <!-- End - ajax for insert data -->

<!--End - Modal for Show Data -->


  

  <!-- end body -->


 
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    

</body>

</html>
