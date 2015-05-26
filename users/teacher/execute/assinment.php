d <?php
      include('../../../conf/conn.inc');
     if(isset($_POST['assinment']))
     {
     	echo $id =$_POST['id'];
     	echo $subject=$_POST['subject'];
     	echo $file=$_FILES['file']['name'];
     	echo $desc =$_POST['area'];
     	$folder="../../uploades/";
     	$path=$folder.$file;
     
     if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
     {
     $query=mysql_query("insert into assignment(subject,des,file_name,c_id,path) values('$subject','$desc','$file','$id','$path')");
     if($query)
     {
     	header("location:mycourse.php");
     }

}}


  
?>
