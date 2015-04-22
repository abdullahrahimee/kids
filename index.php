<?php require 'header.php';	
   include("languages/language.php");
 ?>
<br>



<!---start-banner---->
<link rel="stylesheet" href="assets/css/slippry.css">
				<script src="assets/js/jquery-ui.js" type="text/javascript"></script>
				<script src="assets/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
			<div class="banner" id="move-top">
				<!----start-image-slider---->

					<div data-scroll-reveal="enter bottom but wait 0.7s" class="img-slider" id="home">
						<div class="wrap">
							<div class="slider">
								<ul id="jquery-demo">
								  <li>
								    <a href="#slide1">
								    </a>
								    <div data-scro l-reveal="enter bottom but wait 0.7s" class="slider-detils">
								    	<h3> <?php $index_school_msg;?></h3>
								    	<!--<span>consectetur adipisc ing elit</span>-->
								    </div>
								  </li>
								  <li>
								    <a href="#slide2">
								    </a>
								      <div data-scroll-reveal="enter bottom but wait 1s" class="slider-detils">
								    	<h3><?= $index_2_msg ?></h3>
								    	<!--<span>Aliquam viverra consectetur nibh a blan dit.</span>-->
								    	</div>
								  </li>
								  <li>
								    <a href="#slide3">
								    </a>
								      <div data-scroll-reveal="enter bottom but wait 1.5s" class="slider-detils">
								      	<h3><?= $index_3_msg ?></h3>
								    	<!--<span>Proin at amet consectetur adipisc lacinia.</span>-->
								    </div>
								  </li>
								</ul>
							</div>
						</div>
					</div>
					<div class="clear"> </div>
				</div>
						<!---slider---->
				
				<script>
					  jQuery('#jquery-demo').slippry({
					  // general elements & wrapper
					  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
					  // options
					  adaptiveHeight: false, // height of the sliders adapts to current slide
					  useCSS: false, // true, false -> fallback to js if no browser support
					  autoHover: false,
					  transition: 'fade'
					});
				</script>
				<!---scrooling-script--->
					<!----//End-image-slider---->
					<div class="simple-text">
						<div class="wrap">
<h4><?= $index_h4_msg?></h4>
								<p>TechKids inspires and empowers kids through educational technology, tools and methodologies. We stimulate mind, develop leadership, and critical thinking of your children. Our goal is to help your kids realize their potential and become exceptional individuals.</p>
					
						</div>
					</div>
				<!-- start services -->	
				
			<div class="Recent-wroks">
				<div class="wrap">
				<div class="Recent-wrok">
					<h5 class="heading"><?= $index_1_msg ?></h5>
					<!----start-img-cursual---->

  <div class="container1" align="center">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
     

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/1a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_msg ?></h2>
		      <?= $index_slider_content_msg ?>				
          </div>
        </div>
        <div class="item">
          <img src="images/2a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_title_2_msg ?></h2>

		      <?= $index_slider_content_2_msg ?>

          </div>
        </div>
        <div class="item">
          <img src="images/3a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_title_3_msg ?></h2>
			<?= $index_slider_content_3_msg ?>
          </div>
        </div>
		<div class="item">
          <img src="images/4a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_title_4_msg ?></h2>
			<?= $index_slider_content_4_msg ?>
          </div>
        </div>
		<div class="item">
          <img src="images/5a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_title_5_msg ?></h2>
			  <?= $index_slider_content_5_msg ?>
          </div>
        </div>
		
		<div class="item">
          <img src="images/6a.png" alt="...">
          <div class="carousel-caption">
            <h2><?= $index_slider_title_6_msg ?></h2>
		     <?= $index_slider_content_6_msg ?>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
					<!----//End-img-cursual---->
				</div>
				 <script type="text/javascript" src="assets/js/nivo-lightbox.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){
				    $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
				});
				</script>

				</div>
			</div>
			
			<!-- start last_posts -->
			<div class=" last_posts">
				<div class="wrap">
					<h5 class="heading"><?= $index_cur_title_msg ?></h5>
					<div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-5 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="images/im1.jpg">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <?= $index_cur_title_1_msg ?>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                             <?= $index_cur_content_1_msg ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item" data-category="ui">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="images/im.jpg">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <?= $index_cur_title_2_msg ?>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                             <?= $index_cur_content_2_msg ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="images/sb3.jpg">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <?= $index_cur_title_3_msg ?>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                             <?= $index_cur_content_3_msg ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="images/sb5.jpg">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <?= $index_cur_title_4_msg ?>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                             <?= $index_cur_content_4_msg ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
        </div>
</div>
					</div>
				</div>
			
			<br>
			<div class="clear"> </div>
			<div class="testimonial"><!-- start last_posts -->
				<div class="wrap">
					
					<div class="test-grids">

						<div class="test-desc">
							<div><h5 class="heading"><?= $index_tech_title_msg ?></h5></div>
							<p><?= $index_tech_content_msg ?></p>
							 
						</div>
						<div class="img_1">
							<img src="images/avator.png">
						</div>
						<div class="clear"> </div>
					</div>
				</div>
			</div>
			
				<div class="clear"> </div>
				
						<div class="map">
					<!--<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=India&amp;aq=0&amp;oq=indi&amp;sll=44.746733,-108.533936&amp;sspn=5.859437,13.392334&amp;ie=UTF8&amp;hq=&amp;hnear=India&amp;ll=20.593684,78.96288&amp;spn=3.787665,6.696167&amp;t=m&amp;z=8&amp;output=embed"> </iframe>-->
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3287.3433520323306!2d69.12058!3d34.519528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d16f49d46738f1%3A0x4e4f2be6b36d7bc7!2sTechKids!5e0!3m2!1sen!2s!4v1404381115842" width="100%" height="200" frameborder="0" style="border:0"></iframe>				</div>
			</div>
			</div>
<?php require 'footer.php'; ?>
