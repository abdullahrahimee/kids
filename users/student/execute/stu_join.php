<?php

include 'connect.php';

if(@$_GET['join']!=''){

$sid=$_GET['s_id'];
$cid=$_GET['c_id'];

// echo $sid;
// echo $cid;



	$query ="INSERT INTO stu_join VALUES($cid,$sid)";
	$run_query = mysql_query($query);
	if($run_query)
	{
		// header('location:course.php');
		// echo "<div class='alert alert-success'> join success </div>";
		?>
		  <meta http-equiv="refresh" content="0.5">

		<?php
	}
	else
	{
		// echo "Error".mysql_error();
		echo "faild to join".mysql_error();
		?>
		  <meta http-equiv="refresh" content="0.5">

		<?php
	}
}

	else if($_GET['unjoin']!=''){


$sid=$_GET['s_id'];
$cid=$_GET['c_id'];

// echo $sid;
// echo $cid;

	$query ="DELETE FROM stu_join WHERE c_id=$cid AND s_id=$sid";
	$run_query = mysql_query($query);
	if($run_query)
	{
		// header('location:course.php');
		echo "unjoin success";
		?>
		  <meta http-equiv="refresh" content="0.5">

		<?php
		  
	}
	else
	{
		// echo "Error".mysql_error();
		echo "faild to unjoin".mysql_error();
		?>
		  <meta http-equiv="refresh" content="0.5">

		<?php
	}

	}
		else{

		}


?>
