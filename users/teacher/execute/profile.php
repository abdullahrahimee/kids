<!-- create 8th -->
<html>
<head>
<title>profile - Admin Panel</title>
</head>
<body>
	<?php include 'connect.php';?>
	<?php include 'functions.php'; ?>
	<?php include 'title_bar.php'; ?>

	<?php
	if(!loggedin()){ //if the user does not loggedin
			header('location: ../login/form.php?login=invalid');
		}
	?>	

	<h3>Profile- Admin pannel System</h3>
	<p> You are loged in as <b> <?php echo $username; ?> </b> [<?php echo $level_name; ?>]</p>

	<!-- if your roll is admin then show you the Link of Admin Controll page -->
	<p>

	<?php if($user_level == 1){
		echo "<a href='admin.php'>Admin Controll page</a>"; 
		} 
	?>
	 </p>
</body>
</html>

