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
	if($vars['action'] == 'login'){
		deleteTicket($vars['ticketId']);
	}
	if($vars['action'] == 'editTicket'){
		editTicket($vars['ticketId'], $vars['date'], $vars['time'], $vars['price'], $vars['violation'], $vars['employee'], $vars['isActive'],$vars['notes']);
	}
}

function deleteTicket($ticketId){
	if ($ticketId != NULL) {
   		$ticketId = sanitize($ticketId, 'int');
   		$query = sprintf("DELETE FROM Ticket WHERE ticket_id = '%s'", mysql_real_escape_string($email));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	

	}
}

function editTicket($date, $time, $price, $violation, $employee, $isActive, $notes, $ticketId){
	if ($ticketId != NULL) {
		$ticketId = sanitize($ticketId, 'int');  
		$query = sprintf("UPDATE Ticket SET ticket_date = '%s', ticket_time = '%s', ticket_price = '%s', ticket_violation = '%s', ticket_employee_id = '%s', ticket_isactive = '%s', ticket_notes = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($date), mysql_real_escape_string($time), mysql_real_escape_string($price), mysql_real_escape_string($violation), mysql_real_escape_string($employee), mysql_real_escape_string($isActive), mysql_real_escape_string($notes), mysql_real_escape_string($ticketId));			
		
		$results = mysql_query($query);

		mysql_free_result($results);
		mysql_close($link);
	}
}


?>