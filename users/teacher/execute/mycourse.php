<?php
include '../../student/execute/connect.php';
include 'auth.php';

// include '../../users/student/execute/functions.php';
 $my_id = $_SESSION['user_id']; 
$user_query1=mysql_query("SELECT * FROM users WHERE u_id='$my_id'");
$run_user1 = mysql_fetch_array($user_query1) or die(mysql_error());

$uname=$run_user1['firstname']; 
$uid=$run_user1['u_id'];
$upass=$run_user1['password'];
$uemail=$run_user1['email'];
$user_level=$run_user1['type'];



$user_query=mysql_query("SELECT * FROM users WHERE type='teacher' AND email='".$uemail."'");
$run_user = mysql_fetch_array($user_query);
$username=$run_user['firstname']; 
$t_id=$run_user['u_id'];


$user_query2=mysql_query("SELECT * FROM join_course WHERE u_id=$t_id");

$co="0";
while($run_user2= mysql_fetch_array($user_query2)){
$co.=$run_user2['c_id'].",";
}

$co.=substr($co,0, strlen($co)-1);

$query=mysql_query("SELECT * FROM course WHERE c_id IN (".$co.")");
// echo $co.' this is the error';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" 
      type="image/png" 
      href="../../../images/tkfav.png">

    <title>TechKids</title>

     <link href="../../student/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../student/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../student/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../student/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
     function assinment(id)
     {
        $("#assinment_modal").modal('show');
         // $("#view_action_div").html("lodading....").load('assinment.php','&id='+id);
     }
  </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TechKids</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                

        <!-- //Edit Profile Options -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../../student/execute/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li>
                        <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="profile_edit.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>

                    <li>
                        <a href="course.php"><i class="fa fa-book"></i> Course</a>
                    </li>

                      <li>
                        <a href="mycourse.php"><i class="fa fa-book"></i> Joined Course</a>
                    </li>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Upload <small> Your Course Materials </small>
                       
                              
                              </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Your Joined Course
                            </li>
                        </ol>   
                        

                    </div>


    <div class="row">
        
        
        <div class="col-md-12">
        <h4 class="col-md-offset-0.1 alert alert-success text-center">You Attend At The Following Course!</h4>
        <div class="table-responsive">

<?php 
if(!isset($_SESSION['user_id'])){
  header("location: ../../../login/form.php?log=fail");
  session_destroy();
}


?>
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                  <th>ID</th>
                      <th>Class Name</th>
                     <th>Start_Date</th>
                     <th>End_Date</th>
                     <th>Start_Time</th>
                     <th>End_Time</th>
                      <th>Students</th>
                       <th>Material</th>
                        <th>Assignment</th>
                   </thead>
    <tbody>
        <?php while($result=mysql_fetch_assoc($query)){ ?>
            <tr>
     <td><?php echo $result['c_id'] ?></td>
     <td><?php echo $result['name'] ?></td>
     <td><?php echo $result['start_date'] ?></td>
     <td><?php echo $result['end_date'] ?></td>
     <td><?php echo $result['start_time'] ?></td>
     <td><?php echo $result['end_time'] ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Student in this Class"><button onclick="show(<?php echo $result['c_id']; ?>)" class="btn"  class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-eye fa-lg"></span></button></p></td>
     <td><p data-placement="top" data-toggle="tooltip" title="Upload Matarial"><button onclick="upload(<?php echo $result['c_id']; ?>)"  class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-upload fa-lg"></span></button></p></td>
     <td><button class="btn btn-primary"  onclick="show(<?php echo $result['c_id']; ?>)" data-title="Edit" data-toggle="modal" data-target="#assinment">Assignment</button></td>
    </tr>
        
        <?php } ?>
    
    </tbody>
        
</table>
 <!-- Start- ajax for upload data -->
        <script type="text/javascript">
        function upload(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('mess').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","tab.php?show=yes&id="+id,true);
              xmlhttp.send();
        }
        </script>



    <!-- End - ajax for show data -->
         <script>
        // function check() {
        // var sub=document.getElementById("subject").value;
        // var des=document.getElementById("description").value;

        // if(sub==''){
        //   document.getElementById("sp1").innerHTML="Faild: dont empty subject";
        // }
        // else if(des==''){
        //   document.getElementById("sp2").innerHTML="Faild: dont empty description!";
        // }
        // }
        // </script>

                
            </div>
            
        </div>
    </div>
</div>

<!-- modal section -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="width:800px" >
    <div class="modal-content" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Student In This Class</h4>
      </div>
          <div class="modal-body">
            <!-- modal Table -->
                <div class="container">
    <h3>You Can search or Filter</h3>
    <hr>

    <div class="row col-md-8">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Students <button class="btn btn-default btn-xs btn-filter pull-right"><span class="fa fa-filter"></span> Filter</button></h3>
                
                    
               
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email Adress" disabled></th>
                    </tr>
                </thead>
                <tbody id="content">
                   

                </tbody>
            </table>
        </div>
    </div>
</div>

            <!-- End of modal Table -->
      </div>
          <div class="modal-footer ">
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
   
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="width:1200px;">

        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Upload your file</h4>
          </div>
          <div class="modal-body">
                <div class="container">
                
          <div class="panel panel-default">
            <div class="panel-heading"><strong>Upload Files</strong> <small>For Students</small></div>
           <div class="panel-body">
               
                 <!-- Standar Form -->
                      <h4>Select files from your computer</h4>
                      <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                        <div class="form-inline">
                          <div class="form-group">
                            <input type="file" name="files" id="js-upload-files" multiple>
                          </div>
                          <span id="mess"></span>
                        </div>
                      </form>
                      <br />
                      <!-- Drop Zone -->
                      <label> Subject</label>
                      <textarea class="form-control" required cols="180" rows="1" id="subject"> </textarea>
                      <span id="sp1"></span>
                      <label> Description</label>
                      <textarea class="form-control" cols="180" rows="7" id="description"> </textarea>
                     <span id="sp2"></span>
                      <br />
                      <!-- Progress Bar -->
                      <!-- <div class="progress"> -->
                       <!--  <div class="progress-bar" id="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                          <span class="sr-only">60% Complete</span> -->
                          <progress id="progressBar" value="0" max="100" style="width:100%"></progress>
                        <!-- </div>
                      </div> -->

                      <!-- Upload Finished -->
                      <div class="js-upload-finished">
                        <h3 id="status">Processed files</h3>
                        <p id="loaded_n_total"><p>
                        <div class="list-group">
                          <a href="#" class="list-group-item list-group-item-danger"><span class="badge alert-success pull-right">Wating</span><span id="fil">Uploade your file</span></a>
                         
                         <!--  <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a> --> 
                     </div>
                      </div>

        </div>
      </div>
    </div> <!-- /container --> 
      </div>
       
        </div>
        
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
       <!-- start of Assigment model -->
                
<div class="modal fade" id="assinment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="width:800px" >
    <div class="modal-content" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Student In This Class</h4>
      </div>
          <div class="modal-body">
            <!-- modal Table -->
                <div class="container">
    <h3>You Can search or Filter</h3>
    <hr>

    <div class="row col-md-8">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Students <button class="btn btn-default btn-xs btn-filter pull-right"><span class="fa fa-filter"></span> Filter</button></h3>
                
                    
               
            </div>
            
        </div>
    </div>
</div>

            <!-- End of modal Table -->
      </div>
          <div class="modal-footer ">
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
   
             <!-- end of Assignment model -->
               
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog" style="width:800px" >
    <div class="modal-content" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Student In This Class</h4>
      </div>
          <div class="modal-body">
            <!-- modal Table -->
                <div class="container">
    <h3>You Can search or Filter</h3>
    <hr>

    <div class="row col-md-8">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Students <button class="btn btn-default btn-xs btn-filter pull-right"><span class="fa fa-filter"></span> Filter</button></h3>
                
                    
               
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email Adress" disabled></th>
                    </tr>
                </thead>
                <tbody id="content">
                   

                </tbody>
            </table>
        </div>
    </div>
</div>

            <!-- End of modal Table -->
      </div>
          <div class="modal-footer ">
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
   
                </div>
                <!-- /.row -->

<!--  //start All the text for body -->
    <div>
                    
    </div>
<!--  //End All the text for body -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script src="../../student/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../student/assets/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../../student/assets/js/jquery-1.11.2.min.js"></script>

// <script>
// function show(id){
//     $.get("tab.php?id="+id,"&name="+name,function(data,status){
//         document.getElementById('content').innerHTML=data;
//     });
// }
// </script>

<script type="text/javascript">
        function show(id){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('content').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","tab2.php?show=yes&id="+id+"&name="+name,true);
              xmlhttp.send();
        }
        </script>


<!-- // <script type="text/javascript">

//      function fupld(id) {
//             alert(id);
//            $.get("tab.php?fid="+id,function(data,status){
//         document.getElementById('fil').innerHTML=data;
//       });
//     }
// </script>
 -->
 <script type="text/javascript">
    function _(el){
        return document.getElementById(el);
    }
    function fupld(tab,id) {
        var file = _('js-upload-files').files[0];
        var formdata = new FormData();
        formdata.append("js-upload-files", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress",progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);

        ajax.onreadystatechange=function(){
            if(ajax.readyState==4 && ajax.status==200) {
                 _('fil').innerHTML=ajax.responseText;
            }
        }
        var tdesc=document.getElementById("description").value;
        var subject=document.getElementById("subject").value;
        ajax.open("POST","tab.php?fid="+tab+"&tid="+id+"&tdesc="+tdesc+"&subject="+subject, true);
        ajax.send(formdata);
    }
    function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Upload "+event.loaded+" byetes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent)+"% Uploaded....  Pleas wait";
    }
     function completeHandler(event) {
         _("status").innerHTML = event.target.responseText;
        _("progress").value = 0;
    }
    function errorHandler(event) {
         _("status").innerHTML = "Upload Faild";
    }
    function abortHandler(event) {
         _("status").innerHTML = "Upload Aborted";
    }
 </script>
<script type="text/javascript">
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$.noConflict();
jQuery(document).ready(function(){
    jQuery('.filterable .btn-filter').click(function(){
        var jQuerypanel = jQuery(this).parents('.filterable'),
        jQueryfilters = jQuerypanel.find('.filters input'),
        jQuerytbody = jQuerypanel.find('.table tbody');
        if (jQueryfilters.prop('disabled') == true) {
            jQueryfilters.prop('disabled', false);
            jQueryfilters.first().focus();
        } else {
            jQueryfilters.val('').prop('disabled', true);
            jQuerytbody.find('.no-result').remove();
            jQuerytbody.find('tr').show();
        }
    });

    jQuery('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var jQueryinput = jQuery(this),
        inputContent = jQueryinput.val().toLowerCase(),
        jQuerypanel = jQueryinput.parents('.filterable'),
        column = jQuerypanel.find('.filters th').index(jQueryinput.parents('th')),
        jQuerytable = jQuerypanel.find('.table'),
        jQueryrows = jQuerytable.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var jQueryfilteredRows = jQueryrows.filter(function(){
            var value = jQuery(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        jQuerytable.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        jQueryrows.show();
        jQueryfilteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if (jQueryfilteredRows.length === jQueryrows.length) {
            jQuerytable.find('tbody').prepend(jQuery('<tr class="no-result text-center"><td colspan="'+ jQuerytable.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>
<script type="text/javascript">
+ function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

}(jQuery);
</script>

</body>
</html>
