<?php
 include '../../student/execute/connect.php';

 @$show=$_GET['show'];

 if(isset($show)) {
    $cid=$_GET['id']; 

    // echo "my id: ".$_GET['id'];

    $query=mysql_query("SELECT * FROM users WHERE u_id IN(SELECT u_id FROM stu_join WHERE c_id=$cid)");
    while($result=mysql_fetch_assoc($query)) {
        echo "<tr>";
            echo "<td>".$result['u_id']."</td>";
            echo "<td>".$result['firstname']."</td>";
            echo "<td>".$result['email']."</td>";
        echo "</tr>"; 
                   
    }
}

?>