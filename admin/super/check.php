<?php
include 'auth.php';
 // echo$uid; 
include '../../users/student/execute/connect.php';


		echo @$u_id=$_GET['u_id']; 
		echo @$type=$_GET['status'];
		echo @$level=$_GET['level'];

		

		if($type=='active'){

			mysql_query("Update `users` SET `status`='none' WHERE `u_id`='$u_id'");
			header('location: user.php');
			

		}
		else if($type=='none'){
			mysql_query("Update `users` SET `status`='active' WHERE `u_id`='$u_id'");
			header('location: user.php');
			

		}

		

?>
