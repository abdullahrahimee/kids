<?php

include '../../student/execute/connect.php';

if(@$_GET['join']!=''){

$tid=$_GET['t_id'];
$cid=$_GET['c_id'];

// echo $tid;
// echo $cid;
	$query ="INSERT INTO join_course VALUES($cid,$tid)";
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


$tid=$_GET['t_id'];
$cid=$_GET['c_id'];

// echo $tid;
// echo $cid;

	$query ="DELETE FROM join_course WHERE c_id=$cid AND t_id=$tid";
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
