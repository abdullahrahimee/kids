<?php require 'header.php';?>
<br><br><br>

<head>
	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/parsley.js"></script>
</head>
	<!-- container -->
	<div class="content_1">
				<div class="wrap">
					<div class="about">
					<div class="photo">
					<h3 class="heading">Contact us</h3>
				<br>
<style type="text/css">
	.parsley-required{color:red;}
	.parsley-equalto{color:red;}
	.parsley-length{color:red;}
</style>


<?php if(isset($_GET['done'])){ echo "<div class='alert alert-success'>Your message has been sent, Thanks for contacting us.</div>"; } ?>
<?php if(isset($_GET['no'])){ echo "<div class='alert alert-danger'>Faild to sent message</div>"; } ?>
					<form action="sent.php" method="POST" data-parsley-validate>
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" type="text" name="name" placeholder="Name" data-parsley-required="true" >
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="email" data-parsley-type="email" name="email" placeholder="Email" data-parsley-required="true" >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." class="form-control" rows="9" name="text" data-parsley-required="true"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" value="Send" name="send">
							</div>
						</div>
					</form>
					</div></div></div></div>
<div class="clear"> </div>
<br><br><br>

<?php require 'footer.php';?>		
</body>
</html>