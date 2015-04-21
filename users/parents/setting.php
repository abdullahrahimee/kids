<?php 
$link = mysql_connect('localhost','root','root');
	$db= mysql_select_db('newkids');
if($_GET['kid']!=''){
	$count=mysql_num_rows(mysql_query("SELECT * FROM st_pa WHERE p_id=".$_GET['id']));
	if($count<1){
		echo "0";
	}else{
		echo $count;
	}
}elseif ($_GET['course']!='') {
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

}elseif ($_GET['ass']!='') {
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
}elseif ($_GET['com']!='') {
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

}elseif ($_GET['ac_kid']!="") {
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
                <td class='text-center'><a class='btn btn-warning btn-xs' href='' onclick='rej(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Rej</a>	<a class='btn btn-info btn-xs' href='#'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='#' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
            </tr>";
			$nu++;
	}
	echo "</table>";
}elseif ($_GET['no_kid']!="") {
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
                <td class='text-center'><a class='btn btn-success btn-xs' href='' onclick='acc(".$count['u_id'].");'><span class='glyphicon glyphicon-edit'></span> Acc</a>	<a class='btn btn-info btn-xs' href='#'><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='#' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
            </tr>";
			$nu++;
	}
	echo "</table>";
}elseif ($_GET['acc']!='') {
	if(mysql_query("UPDATE st_pa SET rel='yes' WHERE s_id=".$_GET['id'])){
		echo "yes";
	}else{
		echo "no";
	}
}
elseif ($_GET['rej']!='') {
	if(mysql_query("UPDATE st_pa SET rel='no' WHERE s_id=".$_GET['id'])){
		echo "yes";
	}else{
		echo "no";
	}
}
?>