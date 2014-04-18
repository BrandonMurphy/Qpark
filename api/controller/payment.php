<?php
header("Access-Control-Allow-Origin: *");
$link = mysql_connect('dbhost-mysql.cs.missouri.edu', 'cs4970s14grp1', 'VetMh^J=B1');
mysql_select_db("cs4970s14grp1");
if (!$link) {
die('Could not connect: ' . mysql_error());
}

if(!empty($_GET)){
	$vars = $_GET;
}elseif(!empty($_POST)){
	$vars = $_POST;
}else{
	$vars = null;
}

if(isset($vars['action']) && $vars['action'] != ''){
	if($vars['action'] == 'loadHtmlTemplate'){
		loadHtmlTemplate($vars['page']);
	}
} else{
	echo "no action selected";
}

function loadHtmlTemplate($page) {
	if($page == 'payment') {
		include('../../Views/payment.php');
	} else if($page == 'about') {
		include('../../Views/about.php');
	} else if($page == 'disclaimer') {
		include('../../Views/disclaimer.php');
	} else if($page == 'maps') {
		include('../../Views/maps.php');
	} else if($page == 'myAccount') {
		include('../../Views/myAccount.php');
	} else if($page == 'privacyPolicy') {
		include('../../Views/privacypolicy.php');
	} else if($page == 'updateUser') {
		include('../../Views/updateUser.php');
	} else if($page == 'updateVehicle') {
		include('../../Views/updateVehicle.php');
	}
}

?>