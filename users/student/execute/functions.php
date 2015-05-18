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
$user_query=mysql_query("SELECT firstname, type FROM users WHERE u_id='$my_id'");
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']; 
$user_level=$run_user['type'];


//get/show user Level

$query_level = mysql_query("SELECT firstname FROM users where u_id='$user_level'") or die(mysql_error());
$run_level=mysql_fetch_array($query_level);
$level_name=$run_level['firstname']; 

} 

?>