<?php 
	include 'header.php'; 
	@$action=$_GET['action'];
	@$login=$_GET['login']; //passed from auth.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<title>Login - Admin Panel</title>
	
    <style type="text/css">
	.parsley-required{color:red;}
	.parsley-equalto{color:red;}
	.parsley-length{color:red;}
	.parsley-type{color:red;}
	</style>

	<script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/parsley.js"></script>
</head>

<body>

	<br /><br /><br />

<div class="row">
	<div class="content_1">
					<div class="wrap">
						<div class="about">
							<div class="photo">
								<h3 class="heading">Login OR Register Here!</h3>
					
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
								<h3 class="thin text-center">Login With  Your Own Account</h3>
								<p class="text-center text-muted"> <i class="text-primary"> Please Login! </i> </p>
							<hr> 

						<?php if(isset($_GET['reset']) && $_GET['reset']=='success') { ?><div
						class="alert alert-success">
						<strong>SUCCESS: </strong> Password Reset Successful. <br>A new
						password has been sent to your email.
					    </div> <?php } ?>

								<?php
								if(isset($_GET['action']) && $_GET['action']=='d'){
								echo "<div class='alert alert-danger'> Your account is deactivated by the site Admin! </div>";}

								if(isset($_GET['login']) && $_GET['login']=='fail'){
								echo "<div class='alert alert-danger'> Wrong combination of Password or Email <br /> Please Try Again!</div>";}

								if(isset($_GET['login']) && $_GET['login']=='invalid'){
								echo "<p style='color:red'> Access Denied <br /> Please Login First! </p>";}

								// if(isset($_GET['login']) && $_GET['login']=='fail'){
								// echo "<p style='color:red'>Wrong combination of Password/Email... <br /> PleaseTry Again!</p> <br />";}
								
								?>

						


							<form action="login.php" method="POST" data-parsley-validate>	
								<?php include 'login.php';   ?>
								<div class="top-margin">	

								<div class="top-margin">
									<label>Email</label>
									<input type="email" name="email"class="form-control" data-parsley-type="email" data-parsley-type-message="This value should be a valid email." data-parsley-required="true" />
								</div>

								<div class="top-margin">
									<label>Password</label>
									<input type="password" name="pass"  class="form-control" id="anotherfield" data-parsley-required="true" data-parsley-length="[6, 14]" />
								</div>
								&nbsp;
								<div class="col-md-offset-6">
									<button type="submit" class="btn btn-action pull-right" name="submit">Login </button>										
								</div> </div> <br />


								<br /> 
								</form>

								<a href="control/forget.php" class="green">Forget your Password?</a> <br />
								
								Register as a <i class="text-primary"><a href="../execute/register.php?role=teacher"> Teacher </a></i>, <i class="text-primary"><a href="../execute/register.php?role=student">Student</a></i> or <i class="text-primary"><a href="../execute/register.php?role=parents">Parents</a></i>
								 
				</div>
						
						</div> <!-- /<div class="panel-body"> -->


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>	<!-- /row -->
<br /><br /><br /><br /><br /><br />
<script type="text/javascript">
	
$(function () {
var $validator = $("#forgotForm").validate({
                      rules: {
                        emailid: {
                          required: true,
                          email: true,
                          minlength: 8,
                        },
                                
                      }
                });

        });

</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

  function render() {
    gapi.signin.render('customBtn', {
      //'callback': 'signinCallback',
      'clientid': '849998433321-45gc17nhjg49cakuoa6cvjqet0o1g47n.apps.googleusercontent.com',
      'cookiepolicy': 'single_host_origin',
      'requestvisibleactions': 'http://schemas.google.com/AddActivity',
      'scope': 'https://www.googleapis.com/auth/plus.login'
    });
  }
  </script>

<?php require '../footer.php'; ?>


