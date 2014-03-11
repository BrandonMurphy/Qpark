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
	if($vars['action'] == 'getParkValidity'){
		getParkValidity($vars['employeeGarage'], $vars['userId']);
	}
}


function getParkValidity($employeeGarage, $userId){

	date_default_timezone_set('America/Chicago');
	$currTime = date('m/d/Y h:i:s');

	$db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = $userId");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$vehicleId = $row[0];

	$db_result = mysql_query("SELECT park_time FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time ASC");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$parkTime = $row[0];

	$db_result = mysql_query("SELECT park_duration FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time ASC");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$parkDuration = $row[0];

	$pieces = split(':', $parkDuration); 
    $hours=$pieces[0]; 
    $hours=str_replace("00","12",$hours); 
    $minutes=$pieces[1]; 
    $seconds=$pieces[2]; 
    $parkDuration=$hours.":".$minutes.":".$seconds; 

    


}








?>