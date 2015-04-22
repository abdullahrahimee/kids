<?php
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
												echo "<div class='alert alert-danger'><?= $index_login_msg_2 ?></div>";
											}
											else{   
													$check_login = mysql_query("select * from users where email='$email' AND password = '$password'");

													if(mysql_num_rows($check_login) == 1){ 

														$run= mysql_fetch_array($check_login); 
														$user_id=$run['u_id'];
														$type=$run['type']; 
														$email=$run['email'];
														$user_level=$run['type'];

														if($type=='d'){ 
															
															header('location: form.php?action=d');		
														}
														else{
															
															$_SESSION['user_id']=$user_id;

															if($run['type'] == 'student'){

																header('location: ../users/student/index.php'); 
															}
															else if($run['type'] == 'parent'){
																// echo "teacher dashboard is not present!";
																 header('location: ../users/parents/index.php');
															}			
															else if($run['type'] == 'teacher'){
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