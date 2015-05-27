<?php 
//session_start();
	include 'header.php'; 
	//include("../language.php");
	@$action=$_GET['action'];
	@$login=$_GET['login']; //passed from auth.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<title><?= $index_form_title ?></title>
	
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
								<h3 class="heading"><?= $index_form_1_title ?></h3>
					
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
								<h3 class="thin text-center"><?= $index_form_2_title ?></h3>
								<p class="text-center text-muted"> <i class="text-primary"><?= $index_form_3_title ?></i> </p>
							<hr> 

						<?php if(isset($_GET['reset']) && $_GET['reset']=='success') { ?><div
						class="alert alert-success">
						<strong>SUCCESS: </strong><?= $index_form_4_title ?><br><?= $index_form_5_title ?>
					    </div> <?php } ?>

								<?php
								if(isset($_GET['action']) && $_GET['action']=='d'){
								echo "<div class='alert alert-danger'><?= $index_form_1_message ?></div>";}

								if(isset($_GET['login']) && $_GET['login']=='fail'){
								echo "<div class='alert alert-danger'><?php echo $index_form_2_message ?><br /><?= $index_form_3_message ?></div>";}

								if(isset($_GET['login']) && $_GET['login']=='invalid'){
								echo "<p style='color:red'> Access Denied <br /> <?= $index_form_4_message ?></p>";}

								// if(isset($_GET['login']) && $_GET['login']=='fail'){
								// echo "<p style='color:red'>Wrong combination of Password/Email... <br /> PleaseTry Again!</p> <br />";}
								
								?>

						


							<form action="login.php" method="POST" data-parsley-validate>	
								<?php include 'login.php';   ?>
								<div class="top-margin">	

								<div class="top-margin">
									<label><?= $form_email ?></label>
									<input type="email" name="email"class="form-control" data-parsley-type="email" data-parsley-type-message="<?= $form_type_message ?>" data-parsley-required="true" />
								</div>

								<div class="top-margin">
									<label><?= $form_password ?></label>
									<input type="password" name="pass"  class="form-control" id="anotherfield" data-parsley-required="true" data-parsley-length="[6, 14]" />
								</div>
								&nbsp;
								<div class="col-md-offset-6">
									<button type="submit" class="btn btn-action pull-right" name="submit"><?= $index_form_5_message ?></button>										
								</div> </div> <br />


								<br /> 
								</form>

								<a href="control/forget.php" class="green"><?= $index_form_6_message ?></a> <br />
								
								<i class="text-primary"><?= $index_form_7_message ?></i><?= $index_form_8_message ?><i class="text-primary"><a href="../execute/register.php?role=teacher&lang=<?=$_SESSION['lang']?>"><?= $index_form_9_message ?></a></i>, <i class="text-primary"><a href="../execute/register.php?role=student&lang=<?= $_SESSION['lang']?>"><?= $index_form_10_message ?></a></i> or <i class="text-primary"><a href="../execute/register.php?role=parent&lang=<?= $_SESSION['lang']?>"><?= $index_form_11_message ?></a></i>
								 
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


