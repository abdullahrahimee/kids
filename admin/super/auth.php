<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth']=='super'){
	$uid=$_SESSION['id'];   
}else{
	header('location: form.php?login=faild'); 
}

// echo$uid; 
 ?>