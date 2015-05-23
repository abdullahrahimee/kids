<?php

include 'auth.php';
include '../../users/student/execute/connect.php';


$uid = $_GET['uid'];
$select_query = mysql_query("select * from users where u_id=$uid");
$fetch = ($row = mysql_fetch_array($select_query));
if($fetch)
{
	$email = $row['email']; 
	if($row['type'] != 'super')
	{
			$del_user = mysql_query("DELETE from users where email='".$email."'");
			if($del_user)
			{
				header('location:user.php');
			}
			else
			{
				echo "Error".mysql_error();
			}

	}


	
	
}

?>