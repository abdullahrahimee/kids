<?php
 //session_start();
 if(!isset($_GET['lang']))
 {
 	$_SESSION['lang'] = 'en';
     include("languages/en.php");
 	$_SESSION['dir']='ltr';
 	echo "<link rel='stylesheet' href='languages/ltr.css'/>";
 	
 	 
}else{
		if($_GET['lang']=='da')
		{
			$_SESSION['lang']='da';
			include("languages/da.php");
			echo "<link rel='stylesheet' href='languages/rtl.css'/>";
			$_SESSION['dir']='rtl';

			
		}elseif($_GET['lang']=='en'){
			$_SESSION['lang'] = 'en';
			include("languages/en.php");
			echo "<link rel='stylesheet' href='languages/ltr.css'/>";
		 $_SESSION['dir']='ltr';
		}
		elseif($_GET['lang']=='ps'){

               $_SESSION['lang'] = 'ps';
               include("languages/ps.php");
               echo "<link rel='stylesheet' href='languages/rtl.css'/>";
            $_SESSION['dir']='rtl';
	
	}	
	
}
?>
 