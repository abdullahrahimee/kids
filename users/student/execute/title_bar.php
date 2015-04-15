
<!-- create 4th -->
<div>
<?php 
if(loggedin()){ 
?>
	<a href="index.php"> Home </a>|
	<a href="execute/profile.php"> Profile </a>|
	<a href="execute/logout.php"> Logout </a>

<?php
} else { 
?>
<!-- <a href="index.php"> Home </a>| 
 <a href="form.php"> Login </a>|
<a href="register.php"> Register </a> -->
<?php
}
?>
</div>

