<?php
@$reg=$_GET['reg'];

 include '../conf/conn.inc';
 include '../users/student/execute/functions.php'; 

								if(isset($_GET['reg']) && $_GET['reg']=='done'){
								echo "<div class='alert alert-success'> Successfully Registerd!</div>";
								}
								if(isset($_GET['reg']) && $_GET['reg']=='fail'){
								echo "<div class='alert alert-danger'>registeration Faild!</div>";}


									if(isset($_POST['submit'])){
										
										$email=$_POST['email'];
										$password=md5($_POST['pass']);
									
											if(empty($email) or empty($password)){
												echo "<div class='alert alert-danger'>Error: Feild Empty!</div>";
											}
											else{   
													$check_login = mysql_query("SELECT * FROM users WHERE email='".$email."' AND password = '".$password."'");

													if(mysql_num_rows($check_login) == 1){ 

														$run= mysql_fetch_array($check_login); 
														$email=$run['email'];
															$_SESSION['user_id']=$run['u_id'];;

															if($run['type'] == 'teacher'){

																header('location: ../users/teacher/index.php'); 
															}
															else if($run['type'] == 'parent'){
																// echo "teacher dashboard is not present!";
																 header('location: ../users/parents/index.php');
															}else if($run['type'] == 'student'){
																 header('location: ../users/student/index.php');
															}
													}
													else{ 
														header('location: form.php?login=fail');
														
													}
											}
										}
?>