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
	if($vars['action'] == 'deactivate'){
		deactivateUser($vars['email']);
	}
	if($vars['action'] == 'reactivate'){
		reactivateUser($vars['email']);
	}
	if($vars['action'] == 'createAccount'){
		createAccount($vars['email']);
	}
	if($vars['action'] == 'editAccount'){
		editAccount($vars['fname'], $vars['lname'], $vars['password'], $vars['email'], $vars['permission']);
	}
	if($vars['action'] == 'viewAllTickets'){
		viewAllTickets();
	}
}

function createAccount($emailParam, $passwordParam, $fnameParam, $lnameParam, $permissionParam){
			
	$query = sprintf("SELECT user_email from User WHERE user_email='%s'",
	mysql_real_escape_string($emailParam));
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);

  	if(strcmp($row, $emailParam)==0) {
        echo "Username already taken.";
	}
	else {
    $email = $emailParam;
    $salt = sha1($emailParam);
    $password = sha1($passwordParam . $salt);
    $fname = $fnameParam;
    $lname = $lnameParam;
    $permission = $permissionParam;
    $isactive = "true";
    $datetime = $_SERVER['REQUEST_TIME'];

	mysql_query("Insert INTO User VALUES (NULL, '$email', '$password', '$fname', '$lname', '$permission', '$isactive', '$datetime')");
	
	$query = sprintf("SELECT user_id from User WHERE user_email='%s'",
	mysql_real_escape_string($emailParam));
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);
	}
}

function deactivateUser($email){
	if ($email != NULL) {
   		$query = sprintf("UPDATE User SET user_isactive = '0' WHERE user_email = '%s'", mysql_real_escape_string($email));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	
	}
}

function reactivateUser($email){
	if ($email != NULL) {
   		$query = sprintf("UPDATE User SET user_isactive = '1' WHERE user_email = '%s'", mysql_real_escape_string($email));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	
	}
}

function deleteTicket($ticketId){
	if ($ticketId != NULL) {
   		$query = sprintf("DELETE Ticket WHERE ticket_id = '%s'", mysql_real_escape_string($ticketId));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	

	}
}

function editTicket($date, $time, $price, $violation, $employee, $isActive, $notes, $ticketId){
	if ($ticketId != NULL) {
		$query = sprintf("UPDATE Ticket SET ticket_date = '%s', ticket_time = '%s', ticket_price = '%s', ticket_violation = '%s', ticket_employee_id = '%s', ticket_isactive = '%s', ticket_notes = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($date), mysql_real_escape_string($time), mysql_real_escape_string($price), mysql_real_escape_string($violation), mysql_real_escape_string($employee), mysql_real_escape_string($isActive), mysql_real_escape_string($notes), mysql_real_escape_string($ticketId));			
		
		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);


		if ($date != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_date = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($date), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($time != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_time = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($time), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($price != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_price = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($price), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($violation != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_violation = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($violation), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($employee != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_employee_id = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($employee), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($isActive != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_isactive = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($isActive), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
		if ($notes != NULL) {
			$query = sprintf("UPDATE Ticket SET ticket_notes = '%s' WHERE ticket_id = '%s'", mysql_real_escape_string($notes), mysql_real_escape_string($ticketId));			
		
			$results = mysql_query($query);
			mysql_free_result($results);
			mysql_close($link);

		}
	}
}

function editAccount($fname, $lname, $passwordParam, $emailParam, $permissionParam){

	$email = $emailParam;
	$salt = sha1($emailParam);
	$password = sha1($passwordParam . $salt);
	$permission = $permissionParam;

	$query = sprintf("UPDATE User SET user_firstname = '%s', user_lastname = '%s', user_password = '%s', user_permission = '%s'  WHERE user_email = '%s'",mysql_real_escape_string($fname), mysql_real_escape_string($lname), mysql_real_escape_string($password),mysql_real_escape_string($permission), mysql_real_escape_string($email));

	$results = mysql_query($query);
	mysql_free_result($results);
	mysql_close($link);

	if($email != NULL){

		if ($fname != NULL){
		$query = sprintf("UPDATE User SET user_firstname = '%s' WHERE user_email = '%s'",mysql_real_escape_string($fname), mysql_real_escape_string($email));

		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);
		}

		if ($lname != NULL){
		$query = sprintf("UPDATE User SET user_lastname = '%s' WHERE user_email = '%s'",mysql_real_escape_string($lname), mysql_real_escape_string($email));

		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);
		}

		if ($passwordParam != NULL){
		$query = sprintf("UPDATE User SET user_password = '%s' WHERE user_email = '%s'",mysql_real_escape_string($password), mysql_real_escape_string($email));

		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);
		}

		if ($permission != NULL){
		$query = sprintf("UPDATE User SET user_permission = '%s' WHERE user_email = '%s'",mysql_real_escape_string($permission), mysql_real_escape_string($email));

		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);
		}
	}



}

function viewAllTickets(){
	$query="SELECT * FROM Ticket ORDER BY ticket_date";
	$results = mysql_query($query);

	while ($row = mysql_fetch_array($results)) {
    	echo '<tr>';
    	foreach($row as $field) {
       		echo '<td>' . htmlspecialchars($field) . '</td>';
    	}
    	echo '</tr>';
	}
}

?>