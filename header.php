<?php 
session_start();
include("language.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
	ol{
		list-style-type: none;
	   
        position: relative;
        top: 20px;
        color: #fff;
        position: relative;
        right: 30px;
	}
	ol li
	{
		display: inline;
		float: left;
		padding-right: 3px;
	    margin-right: 20px;
	}
	ol li a{color: #fff;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" type="image/png" href="images/tkfav.png">
<title>TechKids</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<br><br>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.js"></script>
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
		<!---768px-menu-->
		<link type="text/css" rel="stylesheet" href="assets/css/jquery.mmenu.all.css" />
		<script type="text/javascript" src="assets/js/jquery.mmenu.js"></script>
			<script type="text/javascript">
				//	The menu on the left
				$(function() {
					$('nav#menu-left').mmenu();
				});
		</script>
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="home" dir="<?php echo $_SESSION['dir']?>">
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
	<div class="navbar navbar-inverse navbar-fixed-top headroom" dir="<?php echo  $_SESSION['dir']?>">
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
		     
			    <ol class="pull-right" style="">
			     <?php
                     if($_SESSION['lang']=='da')
                     {
                     	?>
                     	 
                     	<li><a href="index.php?lang=en&dir=ltr">English|</a> </li>
                     	<li><a href="index.php?lang=ps&dir=rtl">Pahto|</a> </li>
                     	<?php
                     }
                     elseif ($_SESSION['lang']=='ps') {
                     	?>
                      
                     	 <li><a href="index.php?lang=da&dir=rtl">Dari|</a> </li>
                     	 <li><a href="index.php?lang=en&dir=ltr">English|</a> </li>
                     	 <?php
                     }
        
                     elseif($_SESSION['lang']=='en')
                     {
                     	?>
                     	 
                     	 <li><a href="index.php?lang=ps&dir=rtl">Pahto|</a> </li>
                     	 <li><a href="index.php?lang=da&dir=rtl">Dari|</a> </li>
                     	<?php
                  }
	              ?>
			    </ol>
              
				<ul class="nav navbar-nav pull-right" style="padding-top:30px;">
				<li><a href="index.php"><?= $index_header_1_msg ?></a></li>
					<li><a href="about.php?lang=<?php echo $_SESSION['lang'] ?>"><?= $index_header_2_msg ?></a></li>
						<li><a href="curriculum.php?lang=<?php echo $_SESSION['lang']?>"><?= $index_header_3_msg ?></a></li>
						<li><a href="methodology.php?lang=<?php echo $_SESSION['lang']?>"><?= $index_header_4_msg ?></a></li>
						<!--<li><a href="resources.php">Resources</a></li>-->
						<li><a href="gallery/examples/gallery.php"><?= $index_header_5_msg ?></a></li>
						<li><a href="contact.php?lang=<?php echo $_SESSION['lang'] ?>"><?= $index_header_6_msg ?></a></li>
					<li><a href="login/form.php?lang=<?php echo  $_SESSION['lang'] ?>">Log In</a></li>

				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->
	</html>
	 