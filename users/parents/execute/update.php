<?php
include "connect.php";

//student id
$id= $_GET['sid'];
$uid = $_GET['uid'];
$firstname = $_GET['firstname'];
$lastname= $_GET['lastname'];
$fname= $_GET['fname'];
$address= $_GET['address'];
$province= $_GET['province'];
$gender= $_GET['gender'];
$birth=$_GET['birth'];
$email= $_GET['email'];
$phone= $_GET['phone'];

if($id != '' && $firstname != '' && $email != ''){
	if(mysql_query("UPDATE users SET firstname='".$firstname."',lastname='".$lastname."',fname='".$fname."',address='".$address."',province='".$province."',gender='".$gender."',b_date='".$birth."',email='".$email."',phone='".$phone."' WHERE u_id=".$id) ){	
		
		
		 echo '<div class="alert alert-success"> You have successfully update </div>';
		 ?>
                <meta http-equiv="refresh" content="1">

                    <?php
	}
	else
	{
		echo '<div class="alert alert-danger"> Faild to update! </div>';
		 ?>
                <meta http-equiv="refresh" content="1">

                    <?php
	}
}


?>