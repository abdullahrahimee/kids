<?php 	
        session_start();
        include("../login/header.php");
        //include("../language.php");
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

<body dir="<?php echo $_SESSION['dir']?>">
	<br /><br /><br />
<!-- end -->
	<!-- container -->
<div class="row">
				<div class="content_1">
				<div class="wrap">
					<div class="about">
					<div class="photo">
					<h3 class="heading"><?= $index_register_h3 ?></h3>
					
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
						<h3 class="thin text-center"><?= $index_register_0_h3 ?></h3>
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
			$lastname=$_POST['lastname'];
			$password=md5($_POST['pass']); 
			$email=$_POST['email'];

				if(empty($username) || empty($password) || empty($email) || empty($lastname)){ 
					echo "<p style='color:red'><?= $index_register_1_h3 ?></p>"; 
				}
				else{ 	
																	// id firstname lastname phone address email gender password, rooll	
						//store the Records
						if(isset($_GET['role']) && $_GET['role']=='teacher'){
						mysql_query("INSERT INTO users(u_id, firstname,lastname, email, password,type,status) VALUES ('', '$username','$lastname', '$email', '$password','teacher','none')");
						// echo "<p>Succssfully Registered!</p>";
						header('location:../login/form.php?reg=done');
						}
						else if(isset($_GET['role']) && $_GET['role']=='student'){ 
						mysql_query("INSERT INTO users(u_id, firstname,lastname, email, password,type,status) VALUES('', '$username','$lastname', '$email', '$password','student','none')");
						// echo "<p>Succssfully Registered!</p>";
						header('location: ../login/form.php?reg=done');
						}
						else if(isset($_GET['role']) && $_GET['role']=='parent'){ 
						mysql_query("INSERT INTO users(u_id, firstname,lastname, email, password,type,status) VALUES('', '$username','$lastname', '$email', '$password','parent','none')");
						// echo "<p>Succssfully Registered!</p>";
						header('location: ../login/form.php?reg=done');
						}

						else { echo "<p style='color:red'> <?= $index_register_msg ?></p>"; 
								header('location: ../login/form.php?reg=fail');
							}
				}
			}
	?>
								<div class="top-margin">
									<label><?= $index_register_username ?></label>
									<input type="text" class="form-control" name="username" data-parsley-required="true" />
								</div>
									<div class="top-margin">
									<label>Lastname</label>
									<input type="text" name="lastname" class="form-control" data-parsley-required="true" />
								</div>
								
								<div class="top-margin">
									<label><?= $index_register_email ?></label>
									<input type="text" name="email" class="form-control" data-parsley-required="true" />
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label><?= $index_register_0_msg ?><span class="text-danger"/>*</span></label>
										<input type="password" name="pass"  class="form-control" id="anotherfield" data-parsley-required="true" data-parsley-length="[6, 14]"> 
									</div>
									<div class="col-sm-6">
										<label><?= $index_register_confrim_password ?><span class="text-danger"/>*</span></label>
										<input type="password" name="confpass" class="form-control"   data-parsley-equalto="#anotherfield" 
										data-parsley-required="true" data-parsley-equalto-message="<?= $index_register_not_match_p ?>">
									</div>
								</div>

										<div class="col-md-6">
										<br /> <button type="submit" class="btn btn-action pull-right" name="submit"><?= $index_register_btn ?></button>
										</div>
								  	</div> 
						</form>
				
			</article>
			<!-- /Article -->

		</div>
	</div></div></div></div></div></div></div></div>	<!-- /container -->
<?php include '../footer.php'; ?>