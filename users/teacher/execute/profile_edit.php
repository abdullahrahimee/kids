<?php 
   include '../../student/execute/connect.php';
   include 'auth.php';
    // include '../../student/execute/functions.php';

        $selectuser = mysql_query("SELECT * FROM users WHERE u_id = '".$_SESSION['user_id']."'");
        $userrow = mysql_fetch_array($selectuser);
        $user_level=$userrow['type'];

        $sql=mysql_query("select * from users where email = '".$userrow['email']."'");
        $row=mysql_fetch_array($sql);
        
        $query_level = mysql_query("SELECT firstname FROM users where type='$user_level'");
        $run_level=mysql_fetch_array($query_level) or die(mysql_error());
        $level_name=$run_level['firstname']; 
    


//Read and Store teachers informations

$tea_id=$row['u_id'];
$user_id=$userrow['u_id'];

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

     <link href="../../student/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../student/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../student/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../student/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

  </style>



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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$userrow['firstname']." ".$userrow['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
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
                             <?php echo ucwords($userrow['firstname']); ?>
                            <small>Profile</small>
                           
                        </h1>


                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Profile Page
                            </li>
                        </ol>

                        <div class="text-right"> <p> You are logged in as <b> <?php echo ucwords($userrow['firstname']); ?> </b> [<?php echo $userrow['type']; ?>]</p></div>
                    </div>

<!--  //start All the text for body -->
<?php 

// echo "user id: ".$user_id ."<br />";

// echo "Teacher id: ".$tea_id;


?>

     <!-- start  -->
        <!-- Small modal -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Upload</button> -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <!-- ...  --><!-- <h4 class="modal-title"> Upload Your Image</h4> -->
      <br /> <br />
            <div class="profile1" align="center">
     <?php
      if(!empty($profile)){
            echo '<img src="',$profile,'" alt="',$firstname,'\'s profile image">';
        }

        
        function change_profile_image($my_id, $file_temp,$file_extn){
        

        global $tea_id;
        global $profile;
         // echo "welcome dear ". $tea_id;


        $file_path='../images/profile/' .substr(md5(time()), 0, 10).'.'.$file_extn;
        // echo $file_path;
        move_uploaded_file($file_temp, $file_path);

        mysql_query("UPDATE `teachers` SET `profile` = '" .mysql_real_escape_string($file_path) . "' WHERE `t_id` = " . $tea_id); //int: prvent sql injunction //$tea_id should be int
        }

        if(isset($_FILES['profile']) === true){

            if(empty($_FILES['profile']['name']) === true){
                echo "<br />  <p style='color:red'> please choose an Image! </p>";
            }
            else{
                    @unlink($profile);
                    $allowed=array('jpg','jpeg','png','gif');
                    $file_name=$_FILES['profile']['name']; //a.png
                    $file_extn=strtolower(end(explode('.', $file_name))); //extract the extension // Note: end function take the last element of the array
                  
                    $file_temp=$_FILES['profile']['tmp_name']; 

                
                    if(in_array($file_extn, $allowed) === true){
                        //upload file
                        change_profile_image($my_id, $file_temp,$file_extn);
                        //header('location: profile_edit.php');
                        ?>
                            <script type="text/javascript">
                            window.location.href="http://localhost/kids/users/teacher/execute/profile_edit.php";

                            </script>
                        <?php
                    }
                    else{
                        echo "<br /> <br />";
                        echo "<p style='color:red'> Error! Incorrect file type. <br /> Allowed: </p>" .implode(', ', $allowed);
                       
                            
                            


                    }
            }
        }
     ?>  
     <br /> <br />
     <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="profile" class="btn btn-danger"> 
        <input type="submit" value="Ok" class="btn btn-success pull-right">
 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        <br /> <br />       
     
     </form>

     </div>

      <!-- .... -->
    </div>
  </div>
</div>

     <!-- end -->
    <!-- start Profile Picture -->

    <div class="col-md-12">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
            

              <h3 class="panel-title"><?php echo ucwords($firstname)." ".ucwords($lastname); ?></h3>
            </div>


                <!-- start -->

                <!-- end -->
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 


            <div class="card wizard-card ct-wizard-orange" id="wizard">
                <div class="picture-container">
                    <div class="picture">

                          <a data-toggle="modal" data-target=".bs-example-modal-sm" href=""> 
                    <img alt="User Pic"  src="<?php 

                        if($profile == ''){echo "../../../images/default-avatar.png";}
                        else{echo $profile;}


                    ?>" class="img-responsive"> </a>
                     </div>
                    
                </div>
                    <h6>Profile Picture</h6>
            </div>
               
                </div>


                <div class=" col-md-9 col-lg-9 "> 

        <!-- //start Form -->
        
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>FirstName:</td>
                        <td>

                       <?php echo ucwords($firstname);?>

                        </td>
                      </tr>

                      <tr>
                        <td>LastName:</td>
                        <td>
                        <?php echo ucwords($lastname);?> </td>
                      </tr>

                      <tr>
                        <td>Address:</td>
                        <td><?php echo ucwords($address); ?></td>
                      </tr>

                      <tr>
                        <td>Province:</td>
                        <td><?php echo ucwords($province);?></td>
                      </tr>
                      

                        <tr>
                        <td>Gender:</td>
                        <td><?php echo ucwords($gender); ?></td>
                      </tr>

                      <tr>
                        <td>Date of Birth:</td>
                        <td><?php echo ucwords($birth_date); ?></td>
                      </tr>
                      <tr>
                        <td>Password:  </td>
                        <td>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                          <i class="fa fa-square" style="font-size:5px;color:#909090 "></i>
                        </td>
                      </tr>
                         <tr>
    
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $email; ?></td>
                      </tr>
                        <td>Phone Number:</td>
                        <td><?php echo $phone; ?>
                        
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
                                       <a href="profile_pass.php" class="btn btn-sm btn-success" > <b> Chanage Password </b></a>

                            <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-warning"><i class="fa fa-edit" style=""></i></button>
                            <a href="../index.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                        
                        </span>
                    </div>

                   
            
          </div>
        </div>
      </div>
    </div>
                    
    </div>
<!--  //End All the text for body -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <!--  start pass Modal -->
<!-- Button trigger modal -->

   <!-- end pass -->

    <script type="text/javascript">
    function update(){
        
        var x=confirm("Do you realy wana update");
        if(x==true){
            // alert(<?php echo $tea_id; ?>);

            var tid=document.getElementById('tid').value;
            var uid=document.getElementById('uid').value;
           
            var firstname=document.getElementById('firstname').value;
            var lastname=document.getElementById('lastname').value;
            var address=document.getElementById('address').value;
            var province=document.getElementById('province').value;
            var gender=document.getElementById('gender').value;
            var birth=document.getElementById('birth').value;
            var email=document.getElementById('email').value;
            var phone=document.getElementById('phone').value;
       
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('mess').innerHTML=xmlhttp.responseText;
//               window.location.href ="http://localhost/kids/users/student/execute/profile_edit.php";
            }
        }
        xmlhttp.open("GET","update.php?tid="+tid+"&uid="+uid+"&firstname="+firstname+"&lastname="+lastname+"&address="+address+
            "&province="+province+"&gender="+gender+"&birth="+birth+"&email="+email+"&phone="+phone,true);
          xmlhttp.send();
         
           

    }

    }
    </script>
    <!-- jQuery -->
<script src="../../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../../student/assets/js/jquery-1.11.2.min.js"></script>


<!-- start model -->
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Your Profile Page</h4>
      </div>
      <div class="modal-body">
        <!-- New form -->
            <div>

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
                        else{echo "". $profile;}


                    ?>" class="img-responsive">
                     </div>
                    
                </div>
                    <h6>Profile Picture</h6>
            </div>
               
                </div>
                
                
                <div class=" col-md-9 col-lg-9 "> 
                <div  id='mess'></div>
                  <table class="table table-user-information">
                    <tbody>
                   
                      <br />
                        <input id="uid" type="hidden" value="<?php echo $user_id; ?>">
                      <tr>
                        <td>FirstName:</td>
                        <td>
                            <input type="hidden" id="tid" value="<?php echo $tea_id;?>">
                        <input id="firstname" value="<?php echo $firstname;?>" class="border" placeholder="Enter Your Name">
                       
                        </td>
                      </tr>

                      <tr>
                        <td>LastName:</td>
                        <td>
                        <input type="text" name="Nlastname" id="lastname" class="border" placeholder="Enter Your LastName" value="<?php echo ucwords($lastname);?>"> </td>
                      </tr>  

                      <tr>
                        <td>Address:</td>
                        <td><input type="text" name="Naddress" id="address" class="border" placeholder="Enter Your Address" value="<?php echo ucwords($address); ?>"></td>
                      </tr>

                       <tr>
                        <td>Province:</td>
                        <td><input type="text" name="Nprovince" id="province" class="border" placeholder="Enter Your province" value="<?php echo ucwords($province); ?>"></td>
                      </tr>

                        <tr>
                        <td>Gender:</td>
                        <td><input type="text" name="Ngender" id="gender" class="border" placeholder="Enter Your Gender" value="<?php echo ucwords($gender); ?>"></td>
                      </tr>

                      <tr>
                        <td>Date of Birth:</td>
                        <td><input type="text" name="Nbirth" id="birth" class="border" placeholder="Enter Your DateOfBirth" value="<?php echo ucwords($birth_date); ?>"></td>
                      </tr>
                   
                         <tr>
    
                   

                      <tr>
                        <td>Email:</td>
                        <td><input type="text" name="Nemail" id="email" class="border" placeholder="Enter New Email" value="<?php echo "$email"; ?>"></td>
                      </tr>
                        <td>Phone Number:</td>
                        <td>    <input type="text" id="phone" name="Nphone" class="border" placeholder="Enter Your Phone" value="<?php echo "$phone"; ?>">
                        
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

                        

                            <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-warning" name="submit" onclick="update();"><i class="fa fa-save" style=""></i></button>
                            <a href="profile_edit.php" data-toggle="tooltip"  type="button" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                       

                        </span>
                    </div>
                <!-- </form> -->
            
          </div>               
    </div>
        <!-- End Form -->
      </div>
    </div>
  </div>
</div>
<!-- end model -->
</body>

 
    
        
    <!--   plugins   -->
    <script src="../assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../assets/js/wizard.js"></script>

</html>
