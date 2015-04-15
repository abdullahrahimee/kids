 <?php
 include '../../student/execute/connect.php';

      @$show=$_GET['show'];

    // check for show Data
if($show!=''){
    $qry="SELECT * FROM course WHERE c_id=".$_GET['id'];
$result=mysql_query($qry);
    $row=mysql_fetch_array($result);
    @$cid=$row['c_id'];
    $name=$row['name'];
    echo '<button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit" onclick="fupld('."'file'".','.$cid.');">Upload files</button>';
     
 }

 if(isset($_GET['tid'])) {
    $id1 = $_GET['tid'];
    
 }


if(isset($_GET['fid'])) {
    $id1 = $_GET['fid'];
    $id=$_GET['tid'];
    $tdesc=$_GET['tdesc'];
    $subject=$_GET['subject'];

    if(isset($_FILES["js-upload-files"]["name"])) {
    $target_dir="uploades/";
    $fileName = $_FILES["js-upload-files"]["name"];
    $fileTmpLoc = $_FILES["js-upload-files"]["tmp_name"];
    $fileSize = $_FILES["js-upload-files"]["size"];
    $fileErrorMsg = $_FILES["js-upload-files"]["error"];
    $target_file =$target_dir . basename($_FILES['js-upload-files']['name']);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $uploadOk = 1;
    $filetypecorrect = 0;
    switch ($fileType) {
        case 'doc':
            $filetypecorrect = 1;
            break;
        case 'docx':
            $filetypecorrect = 1;
            break;
       case 'pdf':
            $filetypecorrect = 1;
            break;
        default:
            $filetypecorrect = 0;
            break;
    }
    if($filetypecorrect==0) {
        echo "<span style='color:red;'>$fileType</span>";
        $uploadOk = 0;
    }
    if(file_exists($target_file)) {
        echo "<sapn style='color:red'>This File Already Exist</span>";
        $uploadOk = 0;
    }
    if($fileSize > 2097152) {
        echo "<span style='color:red'>Your file is too large</span>";
    }
    if ($uploadOk == 0) {
    echo "<span style='color:red;'> Sorry, your file was not uploaded.</span>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["js-upload-files"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["js-upload-files"]["name"]). " has been uploaded.";
            @$courseid=$row['c_id'];

            $addqry="INSERT INTO `techkids`.`materials` (`id`, `subject`, `desc`, `file_name`, `course_id`, `path`) VALUES ('', '$subject', '$tdesc', '$fileName', '$id', '$fileName')";
            $add= mysql_query($addqry);
            if($add){
                echo "success";
               

            }
            else{echo "faild";
           
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

    }else {
        echo "<span style='color:red;'>Please Brows for a file first</span>";
    }
 }




 
 ?>
