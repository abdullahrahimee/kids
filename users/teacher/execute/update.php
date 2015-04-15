<?php
include '../../student/execute/connect.php';

//student id
$id= $_GET['tid'];
$uid = $_GET['uid'];
$firstname = $_GET['firstname'];
$lastname= $_GET['lastname'];
$address= $_GET['address'];
$province= $_GET['province'];
$gender= $_GET['gender'];
$birth=$_GET['birth'];
$email= $_GET['email'];
$phone= $_GET['phone'];


//  echo $uid."<br />";
//  echo $id."<br />";
// echo $firstname ."<br />";
// echo $lastname ."<br />";
// echo  $address."<br />";
// echo  $province."<br />";
// echo $birth;
// echo  $gender."<br />";
// echo  $pass."<br />";
// echo  $confpass."<br />";
// echo  $email."<br />";
// echo  $phone."<br />";

if($id != '' && $firstname != '' && $email != ''){
	if(mysql_query("UPDATE teachers SET firstname='".$firstname."',lastname='".$lastname."',email='".$email."',gender='".$gender."',address='".$address."',phone='".$phone."',province='".$province."',birth_date='".$birth."' WHERE t_id=".$id) 
		&& mysql_query("UPDATE users SET username='".$firstname."',email='".$email."' WHERE id=".$uid)){	
		
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


//check password 
// $selectuser = mysql_query("SELECT * FROM users WHERE id =".$uid);
//         $userrow = mysql_fetch_array($selectuser);
//         $users_id=$userrow['id']; //id no of users in users table

//         $sql=mysql_query("select * from teachers where email = '".$userrow['email']."'");
//         $row=mysql_fetch_array($sql);
//         $tea_pass=$row['password'];

// if(isset($cpass)){
// 	     if(strcmp($pass, $cpass))
// 	     {
// 	     	mysql_query("UPDATE teachers SET password='".$pass."' WHERE t_id=".$id);
// 	     	mysql_query("UPDATE users SET password='".$pass."' WHERE id=".$uid);		
// 	     }
// 	     else
// 	     {
// 	     	echo '<div class="alert alert-danger">Your Current password doese not match! </div>';
// 	     }
//      }

//      else{
//      	echo '<div class="alert alert-danger">	 Faild to update Password!
//      	 </div>';
//      }

?>

