<?php

include 'auth.php';
include '../users/student/execute/connect.php';


$uid = $_GET['uid'];
$select_query = mysql_query("select * from users where id=$uid");
$fetch = ($row = mysql_fetch_array($select_query));
if($fetch)
{
	$email = $row['email']; 
	if($row['user_level'] == 2)
	{
		$del_teacher = mysql_query("DELETE FROM teachers where email= '".$email."'");
		if($del_teacher)
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

		if($row['user_level'] == 3)
		{  
			
			$del_user = mysql_query("DELETE FROM students where email = '".$email."'");
			if($del_user)
			{
				$del_student = mysql_query("DELETE from users where email='".$email."'");
				if($del_student)
				{
					header('location:user.php');
				} 
				else
				{
					echo "Error".mysql_error();
				}
			}

		}
	
	
}

?>