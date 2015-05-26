<?php
session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (isset($_SESSION['auth']) && $_SESSION['auth']=='student') {
		$uid=$_SESSION['user_id']; 
	}else {
		header('location: ../../login/form.php?login=invalid');
		session_destroy();
	}
?>

