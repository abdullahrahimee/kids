<?php
include '../../student/execute/connect.php';

//student id
$tid= $_POST['tid'];
$uid = $_POST['uid'];
$email=$_POST['email'];

$cpass= md5($_POST['cpass']);
$pass= md5($_POST['pass']);
$confpass= md5($_POST['confpass']);

// echo  "User id: " .$uid."<br />";
// echo  "teacher id: " .$tid."<br />";

// echo  $cpass."<br />";
// echo  $pass."<br />";
// echo  $confpass."<br />";





    $sql=mysql_num_rows(mysql_query("SELECT * FROM teachers where password = '".$cpass."' AND email='".$email."'"));
    $tsql=mysql_query("UPDATE teachers SET password='".$pass."' WHERE t_id=".$tid);

if($sql==1){


        if($tsql){
        	if(mysql_query("UPDATE users SET password='".$pass."' WHERE id=".$uid)){
        		header("location: profile_pass.php?pass=update_done"); }
          
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

