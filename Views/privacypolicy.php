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
				<a href="maps.html">Maps</a>
			</li>
			<li><a href="myAccount.php">My Account</a></li>
		</ul>

		<div class="loginOrRegister">
			<div class="row">
					<div style="margin-left: -180px;"><?php echo 'Welcome ' . htmlspecialchars($_GET["user"]) . '!';?><a style="margin-top: 10px; margin-left: 10px; font-size: 12px;" href="../index.html">logout</a></div>
			</div>
		</div>
	</div>


	<div class="mainContent">
		<div class="privacyPolicy">
			<h3>QPark Privacy Policy</h3>
			<p>This Privacy Policy was last modified on April 02, 2014.</p>
			<p>QPark ("us", "we", or "our") operates http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/index.html (the "Site"). This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site.</p>
			<p>We use your Personal Information only for providing and improving the Site. By using the Site, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/index.html.</p>

			<p><strong>Information Collection And Use</strong><br />While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to, your name, email address, postal address and phone number ("Personal Information").</p>

			<p><strong>Log Data</strong><br />Like many site operators, we collect information that your browser sends whenever you visit our Site ("Log Data"). This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages and other statistics.</p>

			<p><strong>Cookies</strong><br />Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive.</p>
			<p>Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.</p>

			<p><strong>Security</strong><br />The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>

			<p><strong>Links To Other Sites</strong><br />Our Site may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
			<p>QPark has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party sites or services.</p>

			<p><strong>Changes To This Privacy Policy</strong><br />QPark may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on the Site. You are advised to review this Privacy Policy periodically for any changes.</p>

			<p><strong>Contact Us</strong><br />If you have any questions about this Privacy Policy, please contact us at qparkcrew@gmail.com.</p>

			<p style="font-size: 85%; color: #999;">Generated with permission from <a href="http://termsfeed.com/privacy-policy/generator/" title="TermsFeed" style="color: #999; text-decoration: none;">TermsFeed Generator</a>.</p>
		</div>
		<hr class="footerhr"/>
		<div class="footer">
			<div class="row" style="margin-top: 20px;">
				<div class="twelve columns centered text-center">
					<div style="float: left; margin-right: 5px;">| <a class="linkHover" href="#" style="margin-right: 5px;">Privacy Policy</a>|</div>
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