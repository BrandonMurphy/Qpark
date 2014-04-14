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
	if($vars['action'] == 'returnScanInfo'){
        getParkValidity($vars['employeeGarage'], $vars['qrId']);
	    getVehicleInfo($vars['employeeGarage'], $vars['qrId']);
    }
    if($vars['action'] == 'flagTicket'){
        flagticket($vars['qrId']);
    }
}
function flagTicket($qrId) {

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = $qrId");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

    $query = sprintf("UPDATE Ticket SET ticket_is_flagged = true WHERE user_id = $userId");
         

}

function getVehicleInfo($employeeGarage, $qrId){

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = '$qrId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

    $db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $vehicleId = $row[0];

    $db_result = mysql_query("SELECT vehicle_make FROM Vehicle WHERE vehicle_id = '$vehicle_id'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $make = $row[0];

    $make = json_encode($make);
    echo $make;

    $db_result = mysql_query("SELECT vehicle_model FROM Vehicle WHERE vehicle_id = '$vehicle_id'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $model = $row[0];

    $model = json_encode($model);
    echo $model;

    $db_result = mysql_query("SELECT vehicle_year FROM Vehicle WHERE vehicle_id = '$vehicle_id'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $year = $row[0];

    $year = json_encode($year);
    echo $year;

    $db_result = mysql_query("SELECT vehicle_plate FROM Vehicle WHERE vehicle_id = '$vehicle_id'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $plate = $row[0];

    $plate = json_encode($plate);
    echo $plate;

}

function getParkValidity($employeeGarage, $qrId){

    $garageValidity = 0;

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = '$qrId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

	$db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = '$userId'");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$vehicleId = $row[0];

	$db_result = mysql_query("SELECT park_status, MAX(park_time) FROM Park WHERE park_vehicleid = '$vehicleId'");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$timeValidity = $row[0];
   
    $timeValidity = json_encode($timeValidity);

	$db_result = mysql_query("SELECT park_garage FROM Park WHERE park_vehicleid = '$vehicleId' ORDER BY park_time ASC");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $parkGarage = $row[0];

    if ($employeeGarage == $parkGarage){
        $garageValidity = 1;
    }

    $garageValidity = json_encode($garageValidity);


    //echo $garageValidity;

    //$query = "UPDATE Park SET park_status=0 WHERE (park_time + park_duration) > NOW() AND park_status NOT LIKE 0";


    //"UPDATE Park SET park_status = 'false' WHERE (park_time + park_duration) <= NOW() AND park_status = 'true'"; //


    if ($timeValidity == 1 && $garageValidity == 1) {
        $violationCode = 0;
        $violationMessage = 'No Violations';
    }
    else if ($timeValidity == 1 && $garageValidity == 0){
        $violationCode = 1;
        $violationMessage = 'Invalid Garage';
    }
    else if ($timeValidity == 0){
        $violationCode = 2;
        $violationMessage = 'Invalid Time';
    }

    $violationCode = json_encode($violationCode);
    echo $violationCode;

    $violationMessage = json_encode($violationMessage);
    echo $violationMessage;
  

}


?>