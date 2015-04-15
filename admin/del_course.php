<?php
session_start();
include 'auth.php';
include '../users/student/execute/connect.php';


$id = $_GET['id'];
$query = mysql_query("DELETE from course where c_id = $id");
if($query)

{
	header('location:course.php');
	$_SESSION['done']="<p class='alert text-center alert-success'>You have <b> Successfully </b> Delete A One Course! </p>";

}
else
{
	
	header('location:course.php?');
	$_SESSION['faild']="<p class='alert text-center alert-danger'>You have <b> Faild </b> to Delete the Course! </p>";
}


?>