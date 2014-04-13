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
		loadHtmlTemplate();
	}
} else{
	echo "no action selected";
}

function loadHtmlTemplate() {
	include('../../Views/myAccount.php');
}

?>