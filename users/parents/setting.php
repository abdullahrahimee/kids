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

}
?>