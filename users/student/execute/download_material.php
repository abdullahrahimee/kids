<?php
include 'connect.php';

	if($_GET['download']!=''){
		$c_id=$_GET['c_id'];
		$s_id=$_GET['s_id'];

		// echo "course id: ".$c_id;
		// echo "student id: ".$s_id;


		if($_GET['c_id']!=''){

    $result=mysql_query("SELECT * FROM materials WHERE course_id=".$_GET['c_id']);
    
if(mysql_num_rows($result)<1){echo "<div class='alert alert-danger text-center'><b> Sorry! </b> <br /> No Materials Found </div>";}
else{ while ($rows = mysql_fetch_assoc($result)) {   
    	  

    	  echo '
    	  
    	  <div class="col-md-10" style="padding:10px"><input id="file_name" type="text" value="'.$rows['file_name'].'" class="form-control"></div>

		  <div class="col-md-2" style="padding:10px"> <a href="../../teacher/execute/uploades/'.$rows['path'].'"> <i class="btn btn-success fa fa-download"> </i> </a> </div>


    	    	  		
';
// teacher/execute/uploades/

    }}
   
  		
	}
	}



?>
<!-- 
<input id="file_name" type="text" value="'.$rows['file_name'].'" class="form-control"> -->