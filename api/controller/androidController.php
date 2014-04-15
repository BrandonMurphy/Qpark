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
	if($vars['action'] == 'employeelogin'){
		employeelogin($vars['email'], $vars['password']);
	}
	if($vars['action'] == 'createticket'){
		createticket($vars['qrcode'], $vars['notesParam'], $vars['employeeEmailParam'], $vars['violationCodeParam']);
	}
	if($vars['action'] == 'getTickets'){
		getTickets($vars['emailParam']);
	}
} else{
	echo "no action selected";
}

function employeelogin($email, $password) {

$query = sprintf("SELECT user_email from User WHERE user_email='%s';",
mysql_real_escape_string($email));

//echo $query;
$results = mysql_query($query);
//echo $results;
$row = mysql_fetch_assoc($results);
mysql_free_result($results);
//$row = "Sucessful Ajax Call!";
//print_r($row);

$email = $row['user_email'];
//echo $email;

if(strcmp($email, $row) == 0)
{	
$query1 = sprintf("SELECT user_password, user_permission from User WHERE user_email='%s'",
mysql_real_escape_string($email));
$results1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($results1);
mysql_free_result($results1);
mysql_close($link);
$salt = sha1($email);
      
    //comparing password in database with users input
    if(strcmp(sha1($password . $salt), $row1['user_password']) == 0)
    {
    	if(strcmp($row1['user_permission'], "b") == 0)
    	{

		$validation = array('employee_login' => True);
		echo json_encode($validation);	

    	}
    	else
    	{
    		$validation = array('employee_login' => False);
			echo json_encode($validation); 
    	}
	}
    else
    {
        $validation = array('employee_login' => False);
		echo json_encode($validation);  
    }
	}
else
{
        $validation = array('employee_login' => False);
		echo json_encode($validation);
}

}

function createticket($qrcode, $notesParam, $employeeEmailParam, $violationCodeParam) {

$date = date('Y/m/d');
$time = date('g:i:s');
$violationId = $violationIdParam;
$violationCode = $violationCodeParam;
$violationMessageTicket = $violationMessage;
$user_qrcodeid = $qrcode;
$isflagged = 0;
$notes = $notesParam;
$employeeEmail = $employeeEmailParam;
$isactive = "true";


$query = sprintf("SELECT user_id from User WHERE user_qrcodeid='%s';",
mysql_real_escape_string($user_qrcodeid));
$results = mysql_query($query);
$row = mysql_fetch_assoc($results);
mysql_free_result($results);
$userid = $row['user_id'];

$query1 = sprintf("SELECT user_id from User WHERE user_email='%s';",
mysql_real_escape_string($employeeEmail));
$results1 = mysql_query($query1);
$row = mysql_fetch_assoc($results1);
mysql_free_result($results1);
$employeeid = $row['user_id'];

if($notes == null)
{
	$notes = "No comment";
}

if($violationCode == 1)
{
	$price = '$15.00';
}
else if($violationCode == 2)
{
	$price = '$10.00';
}

$createTicket = mysql_query("INSERT INTO Ticket VALUES (NULL, '$date', '$time', '$price', '$violationCode', '$notes', '$employeeid','$isactive','$isflagged','$userid')");


if(!$createTicket)
	{
	    $validation = array('ticket_issued' => False);
		echo json_encode($validation);
	}
	else
	{
	 	$validation = array('ticket_issued' => True);
		echo json_encode($validation);
	}

}

function getTickets($emailParam)
{

$query = sprintf("Select user_id from User where user_email= '%s'", mysql_real_escape_string($emailParam));
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
$emplyeeUserId = $row['user_id'];

$query1 = sprintf("SELECT a.ticket_date, b.vehicle_plate, b.vehicle_state, 
	b.vehicle_state, b.vehicle_make, b.vehicle_model, b.vehicle_color 
	FROM Ticket a join Vehicle b ON a.ticket_userid = b.vehicle_userid 
	WHERE a.ticket_employee_id ='%s' ORDER BY a.ticket_date ASC LIMIT 15;", 
	mysql_real_escape_string($emplyeeUserId));

$result1 = mysql_query($query1);

$allTickets = is_array();

while ($row1 = mysql_fetch_assoc($result1)) {
    
$TicketInfo = array('ticket_date' => $row1['ticket_date'], 'vehicle_plate' => $row1['vehicle_plate'], 'vehicle_state' => $row1['vehicle_state'], 
'vehicle_make' => $row1['vehicle_make'], 'vehicle_model' => $row1['vehicle_model'], 'vehicle_color' => $row1['vehicle_color']);
$allTickets[$i] = json_encode($TicketInfo);
$i++;

}

print_r($allTickets);
mysql_free_result($result);
mysql_free_result($result1);
mysql_close($link);

}

?>

