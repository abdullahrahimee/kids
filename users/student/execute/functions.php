<!-- create 3th -->
<?php
@session_start();

function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ 
		return true;
	}
	else
		{return false;}
} //close function


if(loggedin()){ 
$my_id = $_SESSION['user_id']; 
$user_query=mysql_query("SELECT * FROM users WHERE id='$my_id'");
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']." ".$run_user['lastname']; 
$user_level=$run_user['type'];


//get/show user Level

$level_name=$run_user['type'];

} 

?>