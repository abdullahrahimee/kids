<?php
include '../../users/student/execute/connect.php';
@$email=$_POST['email'];
$num=mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='".$email."'"));
if($num==1){
$nu=mysql_num_rows(mysql_query("SELECT * FROM forgot WHERE email='".$email."'"));
	if($nu!=1){
$em=$email.rand();
$key=md5($em);
$link="<a href='http://localhost/kids/admin/control/change.php?activate=".$key."&email=".$email."'>Yes I want to change my password!!</a>";
define('line', '\n\t');
$subject="Password recovery-change";
$message="dear sir".line."You can change your TechKids account password by clickin the bellow link:".line.$link;
if(mysql_query("INSERT INTO forgot VALUES(NULL,'".$email."','".$key."')")){

	if(mail($email, $subject, $message,"From:Kids@Technation.af")){
	$err='<div class="alert alert-success">An email hass been sent to " '.$email.' " please check your email and confirm it.</div>';	
	}else{
		$err='<div class="alert alert-warning">Failed to sent email Please try again</div>';
	}
	
}else{
	$err='<div class="alert alert-danger">Failed to change your password please try again later.</div>';
}
	}else{
		$err='<div class="alert alert-danger">We have sent an email to '.$email.' please check your email .</div>';
	}
}else{
	$err='<div class="alert alert-danger">there is no account with this email please <a href="../../login/form.php">Register</a> Your self.</div>';
}
 ?>
<!DOCTYPE >
<html>
	<head>
	<link rel="icon" 
      type="image/png" 
      href="../../images/tkfav.png">
		<link href="../../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../../admin/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

	<style>
	.container{
			margin-top:100px;
		}
		/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
	</style>
	</head>
	<body>
<div class="container">
	<hr class="colorgraph"/>
<?php echo $err; ?>
	<hr class="colorgraph"/>
</div>
<script src="../../admin/assets/js/bootsrtap.min.js"></script>
<script src="../../admin/assets/js/jquery.js"></script>

	</body>
</html>