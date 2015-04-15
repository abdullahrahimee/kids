<?php 	require '../login/header.php';
 	 	include '../users/student/execute/connect.php';
 		include '../users/student/execute/functions.php'; 

			// if(!loggedin()){ //if the user does not loggedin
			// header('location: ../login/form.php?login=invalid');
			// 	}
	  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">

<head>
	<script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/parsley.js"></script>
</head>

<body>
	<br /><br /><br />
<!-- end -->
	<!-- container -->
<div class="row">
				<div class="content_1">
				<div class="wrap">
					<div class="about">
					<div class="photo">
					<h3 class="heading">Registeration</h3>
					
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
						<h3 class="thin text-center">Register a new account</h3>
						<hr> 
<style type="text/css">
	.parsley-required{color:red;}
	.parsley-equalto{color:red;}
	.parsley-length{color:red;}
</style>
		
		<form method="POST" data-parsley-validate>
	<?php 

		@$role=$_GET['role'];
		if(isset($_POST['submit'])){ 
			$username=$_POST['username']; 
			$password=md5($_POST['pass']); 
			$email=$_POST['email'];

				if(empty($username) || empty($password) || empty($email)){ 
					echo "<p style='color:red'>Error: Feild Empty!</p>"; 
				}
				else{ 	
																	// id firstname lastname phone address email gender password, rooll	
						//store the Records
						if(isset($_GET['role']) && $_GET['role']=='teacher'){
						mysql_query("INSERT INTO users VALUES('', '$username','$password','$email','2','a')");
						mysql_query("INSERT INTO teachers(t_id, firstname, email, password) VALUES ('', '$username', '$email', '$password')");
						// echo "<p>Succssfully Registered!</p>";
						header('location: ../login/form.php?reg=done');
						}
						else if(isset($_GET['role']) && $_GET['role']=='student'){ 
						mysql_query("INSERT INTO users VALUES('','$username','$password','$email','3','a')");
						mysql_query("INSERT INTO students(s_id, firstname, email, password) VALUES('', '$username', '$email', '$password')");
						 if($_POST['parent']=='yes'){
						 	header('location:register.php?role=parents');
						 }else{
						header('location: ../login/form.php?reg=done'); 	
						 }
						// echo "<p>Succssfully Registered!</p>";
						
						}else if(isset($_GET['role']) && $_GET['role']=='parents'){ 
						mysql_query("INSERT INTO users VALUES('','$username','$password','$email','4','a')");
						mysql_query("INSERT INTO parent(p_id, firstname, email, password) VALUES('', '$username', '$email', '$password')");
						 
						// echo "<p>Succssfully Registered!</p>";
						header('location: ../login/form.php?reg=done');
						}

						else { echo "<p style='color:red'> Registeration Faild!, Try Again Later!!!</p>"; 
								header('location: ../login/form.php?reg=fail');
							}
				}
			}
	?>
								<div class="top-margin">
									<label>username</label>
									<input type="text" class="form-control" name="username" data-parsley-required="true" />
								</div>
								
								<div class="top-margin">
									<label>Email</label>
									<input type="text" name="email" class="form-control" data-parsley-required="true" />
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger"/>*</span></label>
										<input type="password" name="pass"  class="form-control" id="anotherfield" data-parsley-required="true" data-parsley-length="[6, 14]"> 
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger"/>*</span></label>
										<input type="password" name="confpass" class="form-control"   data-parsley-equalto="#anotherfield" 
										data-parsley-required="true" data-parsley-equalto-message="Password does not match">
									</div>
								</div>
								<br />
								<?php
								if ($_GET['role']=='student') {
									echo '<div class="row"><div class="col-md-6">have your parent registed yet?</div>
								<div class="col-md-3"><input type="radio" value="yes" name="parent"/>Yes</div>
								<div class="col-md-3"><input type="radio" value="no" name="parent"/>No</div>
								</div>';
								}
								?>
								<div class="row">

										<div class="col-md-6 pull-left">
										<br /> <button type="submit" class="btn btn-action pull-right" name="submit">Register</button>
										</div>
								</div> 
						</form>
				
			</article>
			<!-- /Article -->

		</div>
	</div></div></div></div></div></div></div></div>	<!-- /container -->
<?php include '../footer.php'; ?>