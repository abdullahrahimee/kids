<?php
@$reg=$_GET['reg'];

 include '../users/student/execute/connect.php';
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
													$check_login = mysql_query("select id,email,type,user_level from users where email='$email' AND password = '$password'");

													if(mysql_num_rows($check_login) == 1){ 

														$run= mysql_fetch_array($check_login); 
														$user_id=$run['id'];
														$type=$run['type']; 
														$email=$run['email'];
														$user_level=$run['user_level'];

														if($type=='d'){ 
															
															header('location: form.php?action=d');		
														}
														else{
															
															$_SESSION['user_id']=$user_id;

															if($run['user_level'] == '3'){

																header('location: ../users/student/index.php'); 
															}
															else if($run['user_level'] == '2'){
																// echo "teacher dashboard is not present!";
																 header('location: ../users/teacher/index.php');
															}else if($run['user_level'] == '4'){
																 header('location: ../users/parents/index.php');
															}			
															
														}
													}
													else{ 
														header('location: form.php?login=fail');
														
													}
											}
										}
?>