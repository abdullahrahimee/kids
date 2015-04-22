<?php
 if(!isset($_GET['lang']))
 {

 include("lang/en.php");

}else{
		if($_GET['lang']=='da')
		{
		     
			include("lang/da.php");
		}elseif($_GET['lang']=='en'){
			include('lang/en.php');
		}
		elseif($_GET['lang']=='ps'){
               include("lang/ps.php");
	}	
	else
	{
		
	}
}
?>
 