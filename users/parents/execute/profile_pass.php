<?php 
    include 'connect.php';
    include 'functions.php';
        
        if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
        header('location: ../../../login/form.php?login=invalid');
        session_destroy();
        }

        $selectuser = mysql_query("SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'");
        $userrow = mysql_fetch_array($selectuser);
        $uid=$userrow['id']; //id no of users in users table

        $sql=mysql_query("select * from students where email = '".$userrow['email']."'");
        $row=mysql_fetch_array($sql);
        $sid=$row['s_id'];


//Read and Store teachers informations


$firstname=$row['firstname'];  
$lastname=$row['lastname'];
$phone=$row['phone'];
$address=$row['address'];
$email=$row['email'];
$password=$row['password'];
$gender=$row['gender'];
$province=$row['province'];
$birth_date=$row['birth_date'];
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

<body>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$userrow['username']; ?> <b class="caret"></b></a>
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
                        <a href="course.php"><i class="fa fa-book"></i> Course</a>
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
                        </ol>
                        <div class="text-right"> <p> You are logged in as <b> <?php echo ucwords($userrow['username']); ?> </b> [<?php echo $level_name; ?>]</p></div> <br />

                    </div>


                    <!--  start body -->
<?php 

// echo "user id: ".$uid ."<br />";

// echo "student id: ".$sid."<br />";



?>
  <!-- New form -->
  <div class="container col-md-10" style="align:center">
   <form action="update_pass.php" method="POST" data-parsley-validate> 
            <div class="col-md-8">

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo ucwords($firstname)." ".ucwords($lastname); ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 

            <div class="card wizard-card ct-wizard-orange" id="wizard">
                <div class="picture-container">
                    <div class="picture">

                         
                    <img alt="User Pic"  src="<?php 

                        if($profile == ''){echo "../../../images/default-avatar.png";}
                        else{echo $profile;}


                    ?>" class="img-responsive">
                     </div>
                    
                </div>
                    <h6>Profile Picture</h6>

            </div>
               
                </div>
                
            
                <div class=" col-md-9 col-lg-9 "> 
                <?php    
                    
                // if(isset($_GET['cpass']) && $_GET['cpass'] != '' && $_GET['cpass']=='correct'){
                //     echo '<div class="alert alert-success"><b> Success! </b> Recognize current password!</div>';

                // }
                
                if(isset($_GET['cpass']) && $_GET['cpass'] != '' && $_GET['cpass']=='fail'){
                echo '<div class="alert alert-danger"><b> Faild </b> Can`t recognize your current password!</div>';

                }

                if(isset($_GET['pass']) && $_GET['pass'] != '' && $_GET['pass']=='update_done'){
                    echo '<div class="alert alert-success"><b> Success! </b>Successfully Update your password!</div>';

                }

                if(isset($_GET['pass']) && $_GET['pass'] != '' && $_GET['pass']=='update_faild'){
                    echo '<div class="alert alert-danger"><b> Faild! </b>Cant  Update your password!</div>';

                }




                ?>

                <div  id='mess'></div>
                  <table class="table table-user-information">

                    <tbody>
                 
                      <br />
                        <input name="uid" type="hidden" value="<?php echo $uid; ?>">
                         <input name="sid" type="hidden" value="<?php echo $sid; ?>">
                         <input name="email" type="hidden" value="<?php echo $email; ?>">
                      <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" class="form-control border" name="cpass" placeholder="Current password" data-parsley-required="true" data-parsley-length="[6, 14]">
                       
                        </td>
                      </tr>

                      <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" class="form-control border" name="pass" placeholder="New password" data-parsley-required="true" id="anotherfield" data-parsley-length="[6, 14]">
                       
                        </td>
                      </tr>

                      <tr>
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" class="form-control border" name="confpass" placeholder="Confirm Password" data-parsley-required="true" data-parsley-equalto="#anotherfield" 
                                        data-parsley-required="true" data-parsley-equalto-message="Password Not match!">
                       
                        </td>
                      </tr>

                      
                    </tbody>
                  </table>
                
                </div>
                
              </div>
            </div>
                     <div class="panel-footer">
                        <a href="../../../contact.php" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="fa fa-envelope-o"></i></a>
                        <span class="pull-right">

                            <button type="submit" class="btn btn-sm btn-success" name="submit" value="submit">Submit</button>
                 
                       

                        </span>
                    </div>
                <!-- </form> -->
            
          </div>               
    </div>
    </form>
    </div>
        <!-- End Form -->
<!-- ENd body -->

                </div>

                <!-- /.row -->



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


</body>

</html>
