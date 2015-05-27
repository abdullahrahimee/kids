<?php
//session_start();
include("../language.php");
@$reg=$_GET['reg'];
 include '../users/student/execute/connect.php';
 include '../users/student/execute/functions.php'; 

								if(isset($_GET['reg']) && $_GET['reg']=='done'){
								echo "<div class='alert alert-success'><?= $index_login_msg ?></div>";
								}
								if(isset($_GET['reg']) && $_GET['reg']=='fail'){
								echo "<div class='alert alert-danger'><?= $index_login_msg_1 ?></div>";}


									if(isset($_POST['submit'])){
										
										$email=$_POST['email'];
										$password=md5($_POST['pass']);
									
											if(empty($email) or empty($password)){
												echo "<div class='alert alert-danger'><?php echo $index_login_msg_2; ?></div>";
											}
											else{   
													$check_login = mysql_query("select * from users where email='$email' AND password = '$password'")  or die(mysql_error());

													if(mysql_num_rows($check_login) == 1){ 

														$run= mysql_fetch_array($check_login); 
														$user_id=$run['u_id'];
														$status=$run['status']; 
														$email=$run['email'];
														$user_level=$run['type'];

														if($status=='none'){ 
															
															header('location: form.php?action=d');		
														}
														else{
															
															

															if($run['type'] == 'student'){
																$_SESSION['auth']='student';
																$_SESSION['user_id']=$run['u_id'];
																header('location: ../users/student/index.php'); 
															}
															else if($run['type'] == 'parent'){
																// echo "teacher dashboard is not present!";
																$_SESSION['auth']='parent';
																$_SESSION['user_id']=$run['u_id'];
																 header('location: ../users/parents/index.php');
															}			
															else if($run['type'] == 'teacher'){
																$_SESSION['auth']='teacher';
																$_SESSION['user_id']=$run['u_id'];
																// echo "teacher dashboard is not present!";
																 header('location: ../users/teacher/index.php');
															}			
															
														}
													}
													else{ 
														header('location: form.php?login=fail');
														
													}
											}
										}
?>