<?php
include 'auth.php';
include '../users/student/execute/connect.php';

@$show=$_GET['show'];


// check for show Data
if($show!=''){
	$result=mysql_query("SELECT * FROM course WHERE c_id=".$_GET['id']);
	$row=mysql_fetch_array($result);

?>

<div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Course And Categories</h3>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>Course_Name</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Fee</th>
                         <th>Start_Date</th>
                        <th>End_Date</th>
                        <th>Start_Time</th>
                        <th>End_Time</th>
                    </tr>
                </thead>
                <tbody>
                   

            <tr>

     <td><?php echo $row['name'] ?></td>

      <td><?php $course_name=mysql_fetch_array(mysql_query("SELECT * FROM course_category WHERE id=".$row['category_id']));
     echo $course_name['name']; ?></td>

     <td><?php echo $row['des'] ?></td>
     <td><?php echo $row['fee'] ?></td>
     <td><?php echo $row['start_date'] ?></td>
     <td><?php echo $row['end_date'] ?></td>
     <td><?php echo $row['start_time'] ?></td>
     <td><?php echo $row['end_time'] ?></td>
    </tr>
    
    
                </tbody>
            </table>
        </div>
    </div>
</div>


<br />

<?php } // End for show Data

// check for Edit Data

else if(@$_GET['edit'] != ''){
    $course=mysql_query("SELECT * FROM course WHERE c_id=".$_GET['id']);
    $result=mysql_fetch_array($course);
    

     $course_cat=mysql_fetch_array(mysql_query("SELECT * FROM course_category WHERE id=".$result['category_id']));
     $cat= $course_cat['name'];

    echo '<div class="col-md-7 col-md-offset-3">
    <label> Cours name:</label> 
    <input id="name" type="text" value="'.$result['name'].'" class="form-control"><br />

    <label> Cours Categorie:</label> 
    <input id="cat" type="text" value="'.$cat.'" class="form-control"><br />

    <label> Cours Description:</label>
    <input id="des" type="text" value="'.$result['des'].'" class="form-control"><br />

    <label> Cours Fee:</label>
    <input id="fee" type="text" value="'.$result['fee'].'" class="form-control"><br />

    <label> Cours Start_Date:</label>
    <input id="sdate" type="text" value="'.$result['start_date'].'" class="form-control"><br />

    <label> Cours End_Date:</label>
    <input id="edate" type="text" value="'.$result['end_date'].'" class="form-control"><br />

    <label> Cours Start_Time:</label>
    <input id="stime" type="text" value="'.$result['start_time'].'" class="form-control"><br />

    <label> Cours End_Time:</label>
    <input id="etime" type="text" value="'.$result['end_time'].'" class="form-control"><br />

    <br><button class="btn btn-success pull-right" data-dismiss="modal" onclick="update('.$result['c_id'].')">Update</button><br /><br /></div> ';
}else if(@$_GET['update'] != ''){

    $mcourse=mysql_query("SELECT * FROM course WHERE c_id=".$_GET['id']);
    $result=mysql_fetch_array($mcourse);
    @$category_id=$result['category_id'];

if($_GET['name'] != '' && $_GET['cat'] != '' && $_GET['des'] != '' && $_GET['fee'] != '' && $_GET['start_date'] != '' && $_GET['end_date'] != '' && $_GET['start_time'] != '' && $_GET['end_time'] != ''){
        if(mysql_query("UPDATE course SET name='".$_GET['name']."',des='". $_GET['des'] ."',fee=".$_GET['fee'].",start_date='".$_GET['start_date']."',end_date='".$_GET['end_date']."',start_time='".$_GET['start_time']."',end_time='".$_GET['end_time']."' WHERE c_id=".$_GET['id']) && mysql_query("UPDATE course_category SET name='".$_GET['cat']."' WHERE id=".$category_id)){
            echo "<p class='alert text-center alert-success'>You have <b> Successfully </b> Update! </p>";
            ?>

                <meta http-equiv="refresh" content="0.5">

            <?php
        }}
             else{
                    echo "<p class='alert text-center alert-danger'>You have  <b> Faild </b> To  Update </p>";
                    ?>
                <meta http-equiv="refresh" content="1">

                    <?php
            }
}


else if(@$_GET['delete'] != ''){

    if(mysql_query("DELETE FROM course WHERE c_id=".$_GET['id'])){
        echo "<p class='alert text-center alert-success'>You have <b> Successfully </b> Delete the Row! </p>";
    }
    else{
        echo "<p class='alert text-center alert-danger'>You have  <b> Faild </b> To  Delete the Row! </p>";
    }

}
// End for Edit Data

else if(@$_GET['insert'] != ''){

    echo '<div class="col-md-7 col-md-offset-3">
    <label> Cours name:</label> 
    <input id="name" type="text" class="form-control"><br />

    <label> Cours Description:</label>
    <input id="des" type="text" class="form-control"><br />

    <label> Cours Fee:</label>
    <input id="fee" type="text"  class="form-control"><br />

    <label> Cours Start_Date:</label>
    <input id="sdate" type="text"  class="form-control"><br />

    <label> Cours End_Date:</label>
    <input id="edate" type="text" class="form-control"><br />

    <label> Cours Start_Time:</label>
    <input id="stime" type="text"  class="form-control"><br />

    <label> Cours End_Time:</label>
    <input id="etime" type="text"  class="form-control"><br />

    <label> Cours Categorie:</label> ';
echo '<select id="cat" class="form-control">';
$sql=mysql_query("SELECT * FROM course_category");
   while ($row=mysql_fetch_array($sql)) {
     echo   '<option value="'.$row['id'].'">'.$row['name'].'</option>';
   }
echo '</select>';

    echo '<label> Cours Teacher ID:</label>'; 
    echo '<select id="tea_id" class="form-control">';
$sql=mysql_query("SELECT * FROM teachers");
   while ($row=mysql_fetch_array($sql)) {
     echo   '<option value="'.$row['t_id'].'">'.$row['firstname'].'</option>';
   }
echo '</select>';

   echo ' <br><button class="btn btn-success pull-right" data-dismiss="modal" onclick="add()">Insert</button><br /><br /></div> ';

} 

else if(@$_GET['add'] != ''){

    if(mysql_query("INSERT INTO `techkids`.`course` (`c_id`, `name`, `des`, `fee`, `start_date`, `end_date`, `start_time`, `end_time`, `category_id`) VALUES (NULL,'".$_GET['name']."','".$_GET['des']."', '".$_GET['fee']."', '".$_GET['start_date']."', '".$_GET['end_date']."', '".$_GET['start_time']."', '".$_GET['end_time']."', '".$_GET['cat']."')")){
        echo "<p class='alert text-center alert-success'>You have <b> Successfully </b> Insert A One Course! </p>";
        ?>
<meta http-equiv="refresh" content="1">
        <?php
    }
    else{
        echo "<p class='alert text-center alert-danger'>You have <b> Faild </b>to  Insert A Course! </p>".mysql_error();
    ?>
<meta http-equiv="refresh" content="1">
        <?php
    }

}



?>














