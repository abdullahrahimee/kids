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
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	ul{

	}
	ul li
	{
		display: inline;padding-right: 20px;
	}
</style>
<title>this is page is a simple page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
<section style="height="50%;background-color:lightblue">
<form method="post" action="#">
<label class="form-control" style="background-color:blue">
<ul style="list-style-type:none; float:right;">
<li><a href="language.php?lang=en" name="btn">English</a></li>
<li><a href="language.php?lang=da" name="btn2">Dari</a></li>
<li>Pashto</li>
</ul>
</label>
<input type="text" name="name" placeholder="<?= $lan_en ?>"><br>
<input type="submit" name="send" value="<?= $btn_value ?>">
</form>
<section>
</div>
</body>
</html>
<?php

 ?>