<!-- create 2nd -->
<?php
	
	$link = mysql_connect('localhost','root','');
	$db= mysql_select_db('techkids');

	if (!$link) {
	die ('Failed to connect to server: ' . mysql_error () );
	}
// Select database

	if (!$db) {
	die ("Unable to select database" );
	}

?>