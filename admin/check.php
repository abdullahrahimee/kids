<?php
include 'auth.php';
 // echo$uid; 
include '../users/student/execute/connect.php';


		@$u_id=$_GET['u_id']; 
		@$type=$_GET['type'];
		@$level=$_GET['level'];

		

		if($type=='a'){

			mysql_query("Update `users` SET `type`='d' WHERE `id`='$u_id'");
			header('location: user.php');
			

		}
		else if($type=='d'){
			mysql_query("Update `users` SET `type`='a' WHERE `id`='$u_id'");
			header('location: user.php');
			

		}

		

?>
