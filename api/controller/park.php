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


function getParkValidity($employeeGarage, $qrId){

    $garageValidity = 0;

	date_default_timezone_set('America/Chicago');
	$currTime = date('m/d/Y h:i:s');

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = $qrId");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

	$db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = $userId");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$vehicleId = $row[0];

	$db_result = mysql_query("SELECT park_status FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time ASC");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$timeValidity = $row[0];


    return timevalidity;

	$db_result = mysql_query("SELECT park_garage FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time ASC");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $parkGarage = $row[0];

    if ($employeeGarage == $parkGarage){
        $garageValidity = 1;
    }

    return garageValidity;

    //$query = "UPDATE Park SET park_status=0 WHERE (park_time + park_duration) > NOW() AND park_status NOT LIKE 0";

  

}


?>