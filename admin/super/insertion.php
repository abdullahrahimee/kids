<?php
include '../../users/student/execute/connect.php';
$images_sequence = array();
  if(is_array($_FILES)) {
    foreach ($_FILES['pic']['name'] as $name => $value){
        if(is_uploaded_file($_FILES['pic']['tmp_name'][$name])) 
        {
            $sourcePath = $_FILES['pic']['tmp_name'][$name];
            $random_digit=rand(0000000,99999999);
            $image_name = $random_digit.$_FILES['pic']['name'][$name];
            $targetPath = "../../gallery/".$image_name;
            $images_sequence[] = $image_name . "|";

            if(move_uploaded_file($sourcePath,$targetPath)) 
            { 
            }
        }
    }
  }
  $sample_picture ="";
  for($i=0;$i<count($images_sequence);$i++)
  {
      $sample_picture .= $images_sequence[$i];
  }
  $name = $_POST['name'];
  $date = $_POST['date'];

  if(mysql_query("INSERT INTO `newkids`.`gallery` (`id`, `name`, `images`, `date`) VALUES (NULL, '$name', '$sample_picture','$date');"))
 
  {
     header("location:gallery.php?insert=done"); 
  }
  else
  {
     header("location:gallery.php?insert=no");
  }
?>
