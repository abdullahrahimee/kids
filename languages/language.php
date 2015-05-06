<?php
  session_start();
 if(!isset($_GET['lang']))
 {
     $_SESSION['lang'] ="en"; 
     include("languages/en.php");
 }
else{
		if($_GET['lang']=='da')
		{
		    $_SESSION['lang']=='da'; 
			include("languages/da.php");
		}elseif($_GET['lang']=='en'){
			$_SESSION['lang']='en';
			include('languages/en.php');
		}
		elseif($_GET['lang']=='ps'){
			   $_SESSION['lang']='ps';
               include("languages/ps.php");
	}	
	else
	{
		
	}
}
?>
 