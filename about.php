<?php
session_start();
include('header.php');
 //include("languages/en.php");
?>

			<div class="content_1">
				<div class="wrap">
					<div class="about">
			<div class="about-bottom">
	   		       <div class="about-topgrids">
						<div class="about-topgrid1">
						<div class="col-md-12">
				<h3 class="heading" id="one"><?= $index_about_1_title ?></h3>
						</div>
							  

						
							   <p><?= $index_about_1_title ?></p>
							   <br>
							   <p><?= $index_about_2_content?></p>
							   <br>
							   <p><?= $index_about_3_content ?></p>
							   <br>
							   <p><?= $index_about_4_content ?></p>
						</div>
				   </div>		
								<div class="about-services">
									<h3 class="heading" ><?= $index_about_2_title ?></h3>
									<div class="questions">
							          <h4>&nbsp;<strong><?= $index_about_3_title ?></strong></h4>
	        				          <p><?= $index_about_5_content ?></p>
	        		                </div>
	        		                <div class="questions">
							          <h4><?= $index_about_4_title ?></h4>
	        				          <p><?= $index_about_6_content ?></p>
	        		                </div>
	        		                <div class="questions">
							          <h4>&nbsp;<? = $index_about_7_title ?></h4>
	        				          <p><?= $index_about_7_content ?></p>
	        		                </div>
							   </div>
						<div class="clear"></div> 
					</div >
                <div dir="<?php echo $_SESSION['dir']?>">
			<h3 class="heading"><?= $index_about_8_title ?></h3>
			<div class="line" >
				
			</div>
				</div>
				 

					<div class="section group">
					<h2 class="heading"><?= $index_about_9_title ?></h2>
		<!-- Mansoor ansari -->
           <div class="col-md-2 col-sm-3" id="team_l">
              <div class="box-style-1 white-bg team-member">
                <div class="overlay-container">
                  <img src="images/omarphoto.jpg">
                    <div class="overlay" href="#" data-toggle="modal" data-target="#omar">
                    <h6 class="title_s"><?= $index_about_1_job ?></h6>
                      <ul class="social-links clearfix">
                      <li class="linkedin"><a target="_blank" href="http://af.linkedin.com/in/omansari/"><i class="fa fa-linkedin"></i></a></li>
                      <li class="twitter"><a target="_blank" href="https://twitter.com/CyberMullah"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                   </div>
                </div>
                <h3><a class="btn btn-link" href="ansari.php"><?= $index_about_name ?><br><?= $index_about_lastname ?></a></h3>
              </div>
            </div>
<!-- /mansoor ansari -->
		<!-- Baseer Baheer -->
           <div class="col-md-2 col-sm-3" id="team_l">
              <div class="box-style-1 white-bg team-member">
                <div class="overlay-container">
                  <img src="images/baseerphoto.jpg">
                    <div class="overlay" href="#" data-toggle="modal" data-target="#omar">
					<h6><?= $index_about_2_job ?></h6>
                      <ul class="social-links clearfix">
                      <li class="linkedin"><a target="_blank" href="http://af.linkedin.com/in/bbaheer"><i class="fa fa-linkedin"></i></a></li>
                      <li class="twitter"><a target="_blank" href="https://twitter.com/bbaheer"><i class="fa fa-twitter"></i></a></li>                   
                </ul>
                   </div>
                </div>
                <h3><a class="btn btn-link" href="baseer.php"><?= $index_about_2_name ?><br><?= $index_about_2_lastname ?></a></h3>
              </div>
            </div>
<!-- /Baseer Baheer -->
	<!-- Karima -->
           <div class="col-md-2 col-sm-3" id="team_l">
              <div class="box-style-1 white-bg team-member">
                <div class="overlay-container">
                  <img src="images/prs1.jpg">
                    <div class="overlay" href="#" data-toggle="modal" data-target="#omar">
                      <ul class="social-links clearfix">
                      <li class="linkedin"><a target="_blank" href="http://af.linkedin.com/in/omansari/"><i class="fa fa-linkedin"></i></a></li>
                      <li class="twitter"><a target="_blank" href="https://twitter.com/CyberMullah"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                   </div>
                </div>
                <h3><a class="btn btn-link" href="karima.php"><?= $index_about_3_name ?><br><?= $index_about_3_lastname ?></a></h3>
              </div>
            </div>
                  <!-- /Karima -->
				   </div>
					<div class="clear"> </div>
			          </div>
		               </div>
<?php
include 'footer.php';
?>
