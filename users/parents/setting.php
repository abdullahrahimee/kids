<?php 
$link = mysql_connect('localhost','root','root');
	$db= mysql_select_db('newkids');
if(isset($_GET['kid'])){
	$count=mysql_num_rows(mysql_query("SELECT * FROM st_pa WHERE p_id=".$_GET['id']." AND rel='yes'"));
	if($count<1){
		echo "0";
	}else{
		echo $count;
	}
}elseif (isset($_GET['course'])) {
$st="";
$query=mysql_query("SELECT * FROM st_pa WHERE p_id=".$_GET['id']);
while($pa=mysql_fetch_array($query)){
$st.=$pa['s_id'].",";
}
$st.=substr($st,0, strlen($st)-1);
$co=mysql_num_rows(mysql_query("SELECT * FROM stu_join WHERE u_id IN (".$st.")"));
if($co<1){
		echo "0";
	}else{
		echo $co;
	}

}elseif (isset($_GET['ass'])) {
	$st="";
$query=mysql_query("SELECT * FROM st_pa WHERE p_id=".$_GET['id']);
while($pa=mysql_fetch_array($query)){
$st.=$pa['s_id'].",";
}
$st.=substr($st,0, strlen($st)-1);
$ca="";
$query=mysql_query("SELECT * FROM stu_join WHERE u_id IN(".$st.")");
while($da=mysql_fetch_array($query)){
$ca.=$da['c_id'].",";
}
$ca.=substr($ca,0, strlen($ca)-1);
$ass=mysql_num_rows(mysql_query("SELECT * FROM assignment WHERE c_id IN (".$ca.")"));
if($ass<1){
		echo "0";
	}else{
		echo $ass;
	}
}elseif (isset($_GET['com'])) {
$st="";
$query=mysql_query("SELECT * FROM st_pa WHERE p_id=".$_GET['id']);
while($pa=mysql_fetch_array($query)){
$st.=$pa['s_id'].",";
}
$st.=substr($st,0, strlen($st)-1);
$co=mysql_num_rows(mysql_query("SELECT * FROM comment WHERE u_id IN (".$st.")"));
if($co<1){
		echo "0";
	}else{
		echo $co;
	}

}elseif (isset($_GET['ac_kid'])) {
	$sql=mysql_query("SELECT * FROM users WHERE u_id IN (SELECT s_id FROM st_pa WHERE p_id=".$_GET['id']." AND rel='yes')");
	echo "<div class='page-header'><h1>Accepted Kids</h1></div>";
	echo "<table class='table table-striped custab'>";
	echo "<thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Province</th>
            <th class='text-center'>Action</th>
        </tr>
    </thead>";
    $nu=1;
	while ($count=mysql_fetch_array($sql)) {
		echo "<tr>
				<td>".$nu."</td>
                <td>".$count['firstname']." ".$count['lastname']."</td>
                <td>".$count['email']."</td>
                <td>".$count['phone']."</td>
                <td>".$count['address']."</td>
                <td>".$count['province']."</td>
                <td class='text-center'><a class='btn btn-warning btn-xs' onclick='rej(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Rej</a>	<a class='btn btn-info btn-xs' data-toggle='modal' data-target='#model' onclick='show_kid(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Show</a> <a onclick='del_kid(".$count['u_id'].");' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
            </tr>";
			$nu++;
	}
	echo "</table>";
}elseif (isset($_GET['no_kid'])) {
	$sql=mysql_query("SELECT * FROM users WHERE u_id IN (SELECT s_id FROM st_pa WHERE p_id=".$_GET['id']." AND rel='no')");
	echo "<div class='page-header'><h1>Requested Kids</h1></div>";
	echo "<table class='table table-striped custab'>";
	echo "<thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Province</th>
            <th class='text-center'>Action</th>
        </tr>
    </thead>";
    $nu=1;
	while ($count=mysql_fetch_array($sql)) {
		echo "<tr>
				<td>".$nu."</td>
                <td>".$count['firstname']." ".$count['lastname']."</td>
                <td>".$count['email']."</td>
                <td>".$count['phone']."</td>
                <td>".$count['address']."</td>
                <td>".$count['province']."</td>
                <td class='text-center'><a class='btn btn-success btn-xs' onclick='acc(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Acc</a>	<a class='btn btn-info btn-xs' data-toggle='modal' data-target='#model' onclick='show_kid(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Show</a> <a onclick='del_kid(".$count['u_id'].");' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
            </tr>";
			$nu++;
	}
	echo "</table>";
}elseif (isset($_GET['acc'])) {
	if(mysql_query("UPDATE st_pa SET rel='yes' WHERE s_id=".$_GET['id'])){
		echo "<div class='alert alert-success'>You have successefully accepted this kid</div>";
	}else{
		echo "<div class='alert alert-warning'>Failed to accept this kid</div>";
	}
}
elseif (isset($_GET['rej'])) {
	if(mysql_query("UPDATE st_pa SET rel='no' WHERE s_id=".$_GET['id'])){
		echo "<div class='alert alert-danger'>You have successefully rejected this kid</div>";
	}else{
		echo "<div class='alert alert-success'>Failed to rejected this kid</div>";
	}
}elseif (isset($_GET['show_kid'])) {
	$sql = mysql_query("SELECT * FROM users WHERE u_id=" . $_GET['id']);
	while ($row = mysql_fetch_array($sql)) {
		echo '<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Full Name</label>
                <input type="text" id="title" class="form-control" value="' . $row['firstname'] ." ". $row['lastname'] . '">
									</div>
									<div class="form-group">
										<label>Father\'s Name</label>
				<input type="text" id="detail" class="form-control" value="' . $row['fname'] . '">
									</div>
									<div class="form-group">
										<label>Email</label>
				<input type="text" id="author"  class="form-control" value="' . $row['email'] . '">
									</div>
									
								</div>
								<div class="col-md-6"><img src="../' . $row['profile'] . '" class="img-thumbnail" width="100%" />
								<div class="form-group">
										<label>Address</label>
				<input type="text" id="catagory"  class="form-control" value="' . $row['address'] . '" >
									</div>
								</div> 
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="from-group"><label>Phone</label>
				<input type="text" id="date"  class="form-control" value="' . $row['phone'] . '" ></div>
								</div>
								<div class="col-md-6">
									<div class="form-group"><label>Birth Date</label>
				<input type="text" id="pic"  class="form-control" value="' . $row['b_date'] . '" ></div>
								</div>
							</div>
							<div class="row">
								<input type="button" data-dismiss="modal" onclick="update_temp(' . $row['id'] . ',' . "'" . "pub_news" . "'" . ',' . "'" . $row['author'] . "'" . ');" value="Update" class="btn btn-primary ">&nbsp;<input data-dismiss="modal" type="button" value="Close" class="btn btn-danger ">
							</div>';
	}
}elseif (isset($_GET['del_kid'])) {
	if(mysql_query("DELETE FROM st_pa WHERE s_id=" . $_GET['id'])){
	echo "<div class='alert alert-success'>You have successefully delete this request</div>";
	}else{
		echo "<div class='alert alert-warning'>Failed to delete this request</div>";
	}
}elseif (isset($_GET['cou'])) {
			echo '<table class="table table-hover">
                <thead>
                    <tr class="filters" align="center">
                         <th> <input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Course Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Categorie" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                         <th><input type="text" class="form-control" placeholder="Fee" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Start Date" disabled></th>
                        <th><input type="text" class="form-control" placeholder="End Date" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Start Time" disabled></th>
                        <th><input type="text" class="form-control" placeholder="End Time" disabled></th>
                        <th> + Join </th>
 </tr>
                   
                </thead>
                <tbody>';
	$query=mysql_query("SELECT * FROM course WHERE c_id IN (SELECT c_id FROM stu_join WHERE u_id IN (SELECT s_id FROM st_pa WHERE p_id=".$_GET['id']." AND rel='yes' ))");
	while($result=mysql_fetch_array($query)){
echo '<tr>
     <td>'. $result['c_id'].'</td>
     <td>'. $result['name'].'</td>
     
     <td>'.$result['catagory'].'</td>

     <td>'.$result['des'].' </td>
     <td>'.$result['fee'] .'</td>
     <td>'.$result['start_date'].'</td>
     <td>'.$result['end_date'].'</td>
     <td>'. $result['start_time'] .'</td>
     <td>'.$result['end_time'].' </td>
     <td></td>
     </tr>
    <input type="hidden" id="c_id" value="'.$result['c_id'].'">';
	}
echo '</tbody>
            </table>';
}elseif ($_GET['assign']!='') {
	$query=mysql_query("SELECT * FROM assignment WHERE c_id IN (SELECT c_id FROM join_course WHERE u_id=".$_GET['id'].")");
	echo "<table class='table table-striped custab'>";
	echo "<thead>
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Description</th>
            <th>File Name</th>
            <th>Course Name</th>
            <th>Download</th>
        </tr>
    </thead>";
    $nu=1;
	while ($count=mysql_fetch_array($query)) {
		$cor=mysql_fetch_array(mysql_query("SELECT * FROM course WHERE c_id=".$count['c_id']));
		echo "<tr>
				<td>".$nu."</td>
                <td>".$count['subject']."</td>
                <td>".$count['des']."</td>
                <td>".$count['file_name']."</td>
                <td>".$cor['name']."</td>
                <td><a href='".$count['path']."' class='btn btn-success'><i class='fa fa-download'></i></a></td>
            </tr>";
			$nu++;
	}
	echo "</table>";
}else{
	echo "noo";
}
?>