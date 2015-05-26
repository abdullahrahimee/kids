<?php
session_start();

	if (isset($_SESSION['auth']) && $_SESSION['auth']=='teacher') {
		$uid=$_SESSION['user_id'];   
	}else {
		header('location: ../../login/form.php?login=invalid');
		session_destroy();
	}
?>