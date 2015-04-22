<?php session_start();
include '../../users/student/execute/connect.php';
if(isset($_GET['email']) && isset($_GET['activate'])){
$num = mysql_num_rows(mysql_query("SELECT * FROM forgot WHERE email='" . $_GET['email'] . "' AND activate='" . $_GET['activate'] . "'"));
if ($num == 1) {
	$nom = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='" . $_GET['email'] . "'"));
	if ($nom == 1) {
		$_SESSION['email'] = $_GET['email'];
		$_SESSION['activate'] = $_GET['activate'];
		header("location:change.php?success=yes");
	}else{
		$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2><?= $index_chang_h2 ?></h2>
				<p><?= $index_chang_msg ?><a href"register/"><?= $index_chang_0_msg ?></a></p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
	}
}else{
	$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2>Expired!!</h2>
				<p><?= $index_chang_1_msg ?></p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
}
} elseif (isset($_GET['success'])) {
	$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
		<form role="form" method="post" action="change.php" onsubmit="return check();">
			<fieldset>
				<h2><?= $index_chang_2_msg ?></h2>
				<p><?= $index_chang_3_msg ?></p>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control input-lg" placeholder="<?= $index_chang_placeholder ?>">
				</div>
				<div class="form-group">
                    <input type="password"  onkeyup="same();" name="re_pass" id="re_pass" class="form-control input-lg" placeholder="<?= $index_chang_0_placeholder ?>">
                    <span id="err"></span>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<input type="hidden" name="email" value="' . $_SESSION['email'] . '">
						<input type="hidden" name="activate" value="' . $_SESSION['activate'] . '">
                        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="<?= $index_chang_btn ?>">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>';
} elseif (isset($_POST['email']) && isset($_POST['activate']) && isset($_POST['submit'])) {
	$num = mysql_num_rows(mysql_query("SELECT * FROM forgot WHERE email='" . $_POST['email'] . "' AND activate='" . $_POST['activate'] . "'"));
	if ($num == 1) {
		$nom = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='" . $_POST['email'] . "'"));
		if ($nom == 1) {
			if (mysql_query("DELETE FROM forgot WHERE email='" . $_POST['email'] . "' AND activate='" . $_POST['activate'] . "'")) {
				

				$user_q= mysql_query("UPDATE users SET password='" .md5( $_POST['pass']) . "' WHERE email='" . $_POST['email'] . "'");
				if ($user_q){

						$tea_q= mysql_query("UPDATE teachers SET password='" .md5( $_POST['pass']) . "' WHERE email='" . $_POST['email'] . "'");
						if($tea_q){header("location:change.php?changed=yes");}
						$stu_q= mysql_query("UPDATE students SET password='" .md5( $_POST['pass']) . "' WHERE email='" . $_POST['email'] . "'");
						if($stu_q){header("location:change.php?changed=yes");}
						

				}else{
							$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2>Failed to Change password!!</h2>
				<p>Please try again later</p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
				}
			}else{
				$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2>Failed to Change password!!</h2>
				<p>Please try again later</p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
			}
		}else{
			$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2><?= $index_chang_0_h2 ?></h2>
				<p><?= $index_chang_4_msg ?> <a href"register/">Register</a></p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
		}
	}else{
		$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2><?= $index_chang_5_msg ?></h2>
				<p><?= $index_chang_6_msg ?></p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
	}
}elseif (isset($_GET['changed'])) {
	$change = '<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="alert"></div>
			<fieldset>
			<hr class="colorgraph">
				<h2><?=$index_chang_1_h2 ?></h2>
				<p><?= $index_chang_7_msg ?><a href="../../login/form.php">Login</a></p>
				<hr class="colorgraph">
				</div>
			</fieldset>
	</div>
</div>';
session_destroy();
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
			.container {
				margin-top: 100px;
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
			<?php echo @$err; ?>
			<?php
				if (isset($change)) {echo $change;
				}
 ?>
		</div>
			<script src="../../admin/assets/js/bootsrtap.min.js"></script>
			<script src="../../admin/assets/js/jquery.js"></script>
		<script>
			function check() {
				var pass = document.getElementById("pass").value;
				var re_pass = document.getElementById("re_pass").value;
				if (pass != '' && pass == re_pass) {
					return true;
				} else if (pass != re_pass) {
					document.getElementById("alert").innerHTML = "<div class='alert alert-danger'>your password dosen't match</div>";
					return false;
				} else {
					document.getElementById("alert").innerHTML = "<div class='alert alert-danger'>You have to fill the blanks</div>";
					return false;
				}
			}
		</script>
		<script>
			function same() {
				var pass = document.getElementById("pass").value;
				var re_pass = document.getElementById("re_pass").value;
				if (pass == re_pass) {
					document.getElementById("err").innerHTML = "<p style='color:green'><?= $index_chang_passoword_match ?></p>";
				} else {
					document.getElementById("err").innerHTML = "<p style='color:red'><?= $index_chang_password_not_match ?></p>";
				}
			}
		</script>
	</body>
</html>