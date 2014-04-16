<?php

header("Access-Control-Allow-Origin: *");
$link = mysql_connect('dbhost-mysql.cs.missouri.edu', 'cs4970s14grp1', 'VetMh^J=B1');
mysql_select_db("cs4970s14grp1");

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$result = array();


if(!empty($_GET)){
    $vars = $_GET;
}elseif(!empty($_POST)){
    $vars = $_POST;
}else{
    $vars = null;
}

if(isset($vars['action']) && $vars['action'] != ''){
	if($vars['action'] == 'returnScanInfo'){
        $result = getVehicleInfo($vars['employeeGarage'], $vars['qrId'], $result);
        getParkValidity($vars['employeeGarage'], $vars['qrId'], $result);
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

function getVehicleInfo($employeeGarage, $qrId, $result){

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = '$qrId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

    $db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $vehicleId = $row[0];
    
    $db_result = mysql_query("SELECT vehicle_make FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $make = $row[0];
    $result["make"] = $make;

    $db_result = mysql_query("SELECT vehicle_model FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $model = $row[0];
    $result["model"] = $model;
    
    $db_result = mysql_query("SELECT vehicle_year FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $year = $row[0];
    $result["year"] = $year;

    $db_result = mysql_query("SELECT vehicle_plate FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $plate = $row[0];
    $result["plate"] = $plate;

    $db_result = mysql_query("SELECT vehicle_color FROM Vehicle WHERE vehicle_userid = '$userId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $color = $row[0];
    $result["color"] = $color;

    return $result;
}

function getParkValidity($employeeGarage, $qrId, $result){
    $garageValidity = 0;

    $db_result = mysql_query("SELECT user_id FROM User WHERE user_qrcodeid = '$qrId'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $userId = $row[0];

	$db_result = mysql_query("SELECT vehicle_id FROM Vehicle WHERE vehicle_userid = '$userId'");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$vehicleId = $row[0];

    $query = sprintf("SELECT park_status from Park WHERE park_vehicleid='%s'", mysql_real_escape_string($vehicleId));
    $results = mysql_query($query);
    $row = mysql_fetch_assoc($results);

    $db_result = mysql_query("SELECT park_status FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time DESC");
	$row = mysql_fetch_array($db_result, MYSQL_NUM);
	$timeValidity = $row[0];

	$db_result = mysql_query("SELECT park_garage FROM Park WHERE park_vehicleid = $vehicleId ORDER BY park_time DESC");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $parkGarage = $row[0];

    if ($parkGarage == null) {
        $parkGarage = "N/A";
    }

    $result["parkGarage"] = $parkGarage;

    if ($timeValidity == null) {
        $timeValidity = "false";
    }

    if ($employeeGarage == $parkGarage){
        $garageValidity = 1;
    }

    if ($timeValidity == "true" && $garageValidity == 1) {
        $violationCode = 0;
    }
    else if ($timeValidity == "true" && $garageValidity == 0){
        $violationCode = 1;
    }
    else if ($timeValidity == "false"){
        $violationCode = 2;
    }

    $result["violationCode"] = $violationCode;

    echo json_encode($result);


}


?>