<?php
include 'connect.php';

//student id
$id= $_POST['sid'];
$uid = $_POST['uid'];
$email=$_POST['email'];

$cpass= md5($_POST['cpass']);
$pass= md5($_POST['pass']);
$confpass= md5($_POST['confpass']);

// echo  "User id: " .$uid."<br />";
// echo  "student id: " .$id."<br />";

// echo  $cpass."<br />";
// echo  $pass."<br />";
// echo  $confpass."<br />";



     $sql=mysql_num_rows(mysql_query("SELECT * FROM students where password = '".$cpass."' AND email='".$email."'"));

if($sql==1){
        if(mysql_query("UPDATE students SET password='".$pass."' WHERE s_id=".$id) && mysql_query("UPDATE users SET password='".$pass."' WHERE id=".$uid)){
        header("location: profile_pass.php?pass=update_done");   
              }

        else{
            header("location: profile_pass.php?pass=update_faild");    
        }
        //header("location: profile_pass.php?cpass=correct");
         
}       
else{
        header("location: profile_pass.php?cpass=fail");
} 


?>

