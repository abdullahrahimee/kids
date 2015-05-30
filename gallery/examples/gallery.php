<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>TechKids</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="icon" type="image/png" href="images/tkfav.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
<br><br>
<link href="../../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../assets/css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../assets/css/magnific-popup.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="../../assets/js/owl.carousel.js"></script>
	<script>
			$(document).ready(function() {
				$(window).on("scroll", function () {
				    if ($(this).scrollTop() > 87) {
				        $("#header_change").addClass("header-scroll");
				    }
				    else {
				        $("#header_change").removeClass("header-scroll");
				    }
				});
				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});
			});
		</script>
		<!-- //Owl Carousel Assets -->
		<!-----768px-menu----->
		<link type="text/css" rel="stylesheet" href="../../assets/css/jquery.mmenu.all.css" />
		<script type="text/javascript" src="../../assets/js/jquery.mmenu.js"></script>
			<script type="text/javascript">
				//	The menu on the left
				$(function() {
					$('nav#menu-left').mmenu();
				});
		</script>
	<link rel="stylesheet" href="../../assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="../../assets/css/main.css">
<!-- Reference to html5gallery.js -->
<script type="text/javascript" src="../html5gallery/html5gallery.js"></script>
<!-- gallery link -->
    
	<link rel="stylesheet" href="../../assets/css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../assets/css/style1.css" type="text/css" media="screen">
	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/touchTouch.jquery.js"></script> 
  
</head>
<body class="home">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', '.com');
  ga('send', 'pageview');
</script>
<script async src='http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>

	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<div class="logo">
			<a href="/kids/">
				<img src="images/tklogo.png" height="50px" width="350px" alt=""/>
				<!--<h1>TechKids</h1>-->
				<div class="clear"> </div>
			 </a>
		</div>
			</div>
			<div class="navbar-collapse collapse">
			
				<ul class="nav navbar-nav pull-right">
				<li><a href="../../index.php">Home</a></li>
					<li><a href="../../about.php">About Us</a></li>
						<li><a href="../../curriculum.php">Curriculum </a></li>
						<li><a href="../../methodology.php">Methodology</a></li>
						<li><a href="gallery.html">Gallery</a></li>
						<!--<li><a href="resources.php">Resources</a></li>-->
						<li><a href="../../contact.php">Contact Us</a></li>
					<li><a  href="../../login/form.php">Log In</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
 
  <!-- start of gallery-->

        <div>
       
<div class="container" style="margin-top:50px;">
  Image & Gallery<hr>

    <div class="row">
        <?php 
    include("../../conf/conn.inc");
    $query=mysql_query("select * from gallery");
    while($row=mysql_fetch_array($query))
    {
  ?>
        <div class="col-xs-6 col-sm-4 col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                     
                    <p style="margin-top:60px;"><a href="album.php?id=<?php echo $row['id']; ?>" class="label label-danger">View Gallery</a>
                     <?php
                     $img=explode('|', $row['images']);
					 ?>
                </div>
                <img src="<?php echo "../".$img[0]; ?>" alt="...">
            </div>
        </div>
         <?php } ?>
    </div>
  
  
</div><!-- /.container -->

        </div>
  <!--end of gallery-->
</div></div></div></div></div>
 
</body>
<br>
	<div class="footer">
				<div class="wrap">
					<div class="footer-left">
						<h3>About TechKids</h3>
						<p>TechKids is a technology education lab for children teaching Coding, Design and Making. We offer full time and part time pre-school, primary school classes, and after school workshops for children aged 3-12.</p>
						
					<div class="soc_icons soc_icons1">
							<ul>
								<li><a class="icon1" href="https://www.facebook.com/"> </a> </li>
								<li><a class="icon2" href="https://twitter.com/"> </a></li>
								<li><a class="icon3" href="https://www.google.com"> </a></li>
								<div class="clear"> </div>	
							</ul>
								
					</div>
					</div>
					<div class="footer-right">
						<h3>Countact US</h3>
						<div class="comments1">
							<address class="add">
							<strong>TechKids, TechNation Compound</strong>
							<br>
								Next to Amarkhel Clinic
								<br>
								5th Street Seelo
								<br>
								Deh Naw-e-Dehboori
								<br>
								Kabul, Afghanistan
								<br>
								Phone: (+93) (0) 788 161 862
								<br>
								Email: kids@technation.af
							</address>
						</div>
						
					</div>
					<div class="clear"> </div>	
				</div>
			</div>

	<div class="copy">
				       <p>© 2014 <a href="http://technation.af" target="_blank">TechKids</a></p>
			  </div>
<!-- Mirrored from .com/demos/eracle/web/ by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 06 May 2014 18:05:12 GMT -->
<script type="text/javascript">
 $(document).ready(function(){
   $(".box").mouseover(function(){
   	$("#btn").fadeIn()
   });
 });
</script>
</html>
