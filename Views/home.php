<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Qpark</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="humans.txt">

	<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
	However, there is a blank style.css in the css directory should you prefer -->
	<link rel="stylesheet" href="../css/gumby.css">
	<link rel="stylesheet" href="../css/style.css">

	<script src="../js/libs/modernizr-2.6.2.min.js"></script>
</head>

<body class="backgroundImage1">

	<div class="row navbar" id="nav1" style="max-width: 100%;">
		<!-- Toggle for mobile navigation, targeting the <ul> -->
		<a class="toggle" gumby-trigger="#nav1 > ul" href="#"><i class="icon-menu"></i></a>
		<h1 class="one columns logo">
			<a href="#">
				<img src="../img/qpark_logo.png"/>
			</a>
		</h1>
		<ul class="four columns">
			<li><a href="#" onclick="loadPaymentPage()">Pay For Parking</a></li>
			<li>
				<a href="maps.php">Maps</a>
			</li>
			<li><a href="#" onclick="loadMyAccountPage('<?php echo htmlspecialchars($_GET["user"]);?>')">My Account</a></li>
		</ul>

		<div class="loginOrRegister">
			<div class="row">
					<div style="margin-left: -180px;"><?php echo 'Welcome ' . htmlspecialchars($_GET["user"]) . '!';?><a style="margin-top: 10px; margin-left: 10px; font-size: 12px;" href="../index.html">logout</a></div>
			</div>
		</div>
	</div>
	
	<div class="mainContent">

		<div class="carousel">
			<ul class="bxslider">
			 <!--  <li class="payForParking switch" gumby-trigger="#modal1"><img src="../img/payForParking.png"/></li>
 -->			  <li><img src="../img/campusMapBanner.png"/></li>
			  <li style="width: 610px !important;"><img src="../img/qrCodeBanner.png"/></li>
			</ul>
		</div>
		<hr style="width: 96%; margin-left: 26px; margin-top: 10px; margin-bottom: 10px;"/>
		<div class="description">
			<div class="row">
				<div class="twelve columns centered" style="margin-left: 20px;">
					<h3>Description:</h3>
				</div>
				<div class="twelve columns centered">
					<p>Qpark is a web application that allows users to pay for parking online via their mobile
						device or computer.  Once a user is signed up, they are issued a QR code that they will print
						out and display in their vehicle windshield.  The user may then pay for their parking online through
						the Qpark web application after they have parked in a parking garage.  When paying for parking the user
						will select a garage and choose the amount of time they would like to park for, then click 'pay for parking'.
						Once the user has payed for parking they can add more time to their 'virtual meter' if they need to and will
						be sent a reminder when their time is about to expire.</p>
				</div>
			</div>
		</div>
		<hr style="width: 96%; margin-left: 26px; margin-top: 10px; margin-bottom: 10px;"/>
		<div class="reviews">
			<div class="row">
				<div class="twelve columns centered" style="margin-left: 20px;">
					<h3>Reviews:</h3>
				</div>
				<ul class="bxslider">
					<div class="row" style="margin-left: 50px;">
				  		<div class="review four columns">
							<h5><i class="icon-user"></i> User1: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>
						<div class="review four columns">
							<h5><i class="icon-user"></i> User2: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>
						<div class="review four columns">
							<h5><i class="icon-user"></i> User3: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>

						<div class="row">
					  		<div class="review four columns">
								<h5><i class="icon-user"></i> User4: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User5: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User6: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
						</div>
						<div class="row">
					  		<div class="review four columns">
								<h5><i class="icon-user"></i> User7: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User8: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User9: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
						</div>
					</div>
					<div class="row" style="margin-left: 50px;">
				  		<div class="review four columns">
							<h5><i class="icon-user"></i> User10: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>
						<div class="review four columns">
							<h5><i class="icon-user"></i> User11: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>
						<div class="review four columns">
							<h5><i class="icon-user"></i> User12: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
						</div>

						<div class="row">
					  		<div class="review four columns">
								<h5><i class="icon-user"></i> User13: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User14: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User15: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
						</div>
						<div class="row">
					  		<div class="review four columns">
								<h5><i class="icon-user"></i> User16: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User17: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
							<div class="review four columns">
								<h5><i class="icon-user"></i> User18: <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></h5> "This App is amazing, would reccomend!"
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
		<hr class="footerhr"/>
		<div class="footer">
			<div class="row" style="margin-top: 20px;">
				<div class="twelve columns centered text-center">
					<div style="float: left; margin-right: 5px;">| <a class="linkHover" href="privacypolicy.php" style="margin-right: 5px;">Privacy Policy</a>|</div>
					<div style="float: left; margin-right: 5px;"><a class="linkHover" href="about.php" style="margin-right: 12px;">About</a>|</div>
					<div style="float: left; margin-right: 5px;"><a class="linkHover" href="disclaimer.php" style="margin-right: 5px;">Disclaimer</a>|</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Grab Google CDN's jQuery, fall back to local if offline -->
	<!-- 2.0 for modern browsers, 1.10 for .oldie -->
	<script>
	var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
	if(!oldieCheck) {
		document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
	} else {
		document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
	}
	</script>
	<script>
	if(!window.jQuery) {
		if(!oldieCheck) {
			document.write('<script src="../js/libs/jquery-2.0.2.min.js"><\/script>');
		} else {
			document.write('<script src="../js/libs/jquery-1.10.1.min.js"><\/script>');
		}
	}
	</script>

	<!--
	Include gumby.js followed by UI modules followed by gumby.init.js
	Or concatenate and minify into a single file -->
	<script gumby-touch="../js/libs" src="../js/libs/gumby.js"></script>
	<script src="../js/libs/ui/gumby.retina.js"></script>
	<script src="../js/libs/ui/gumby.fixed.js"></script>
	<script src="../js/libs/ui/gumby.skiplink.js"></script>
	<script src="../js/libs/ui/gumby.toggleswitch.js"></script>
	<script src="../js/libs/ui/gumby.checkbox.js"></script>
	<script src="../js/libs/ui/gumby.radiobtn.js"></script>
	<script src="../js/libs/ui/gumby.tabs.js"></script>
	<script src="../js/libs/ui/gumby.navbar.js"></script>
	<script src="../js/libs/ui/jquery.validation.js"></script>
	<script src="../js/libs/gumby.init.js"></script>

	<!-- bxSlider Javascript file -->
	<script src="../js/libs/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="../css/jquery.bxslider.css" rel="stylesheet" />

	<script src="../js/plugins.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/myAccount.js"></script>

<!-- Change UA-XXXXX-X to be your site's ID -->
	<!--<script>
	window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
	Modernizr.load({
	  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
	});
</script>-->

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

</body>
</html>