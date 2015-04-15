<?php

	$name=$_POST['name'];
	$email=$_POST['email'];
	$text=$_POST['text'];
	$to="attiqullaha@gmail.com";
	$subject="Techkids";
	$from="From:"." ".$email;
	$body="If you have some questions please let us know. \n\n $text";
	
	
	$sent=mail($to,$subject,$body,$from);
if($sent){
header("location:contact.php?done=yes");
 }
 else
 {
 header("location:contact.php?no=yes");
 }
?>