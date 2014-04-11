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
	if($vars['action'] == 'viewParks'){
		viewParks($vars['email']);
	}
	if($vars['action'] == 'viewAllAccounts'){
		viewAllAccounts();
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
   		$query = sprintf("UPDATE User SET user_isactive = false WHERE user_email = '%s'", mysql_real_escape_string($email));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	
	}
}

function reactivateUser($email){
	if ($email != NULL) {
   		$query = sprintf("UPDATE User SET user_isactive = true WHERE user_email = '%s'", mysql_real_escape_string($email));
   		
   		$results = mysql_query($query);
		mysql_free_result($results);
		mysql_close($link);	
	}
}

function deleteTicket($ticketId){

	echo $ticketId;
	echo "test!";

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

function viewAllAccounts(){
	$users = is_array();
	$i=0;
	$query="SELECT * FROM User ORDER BY user_id";
	$results = mysql_query($query);

	while ($row = mysql_fetch_assoc($results)) {
 		$users[$i] = $row;
 		$i++;
	}
	
	
echo '<table style="background:gray;">';
echo '<tr>';
echo   '<th>Email</th>';
echo   '<th>First</th>';
echo   '<th>Last</th>';
echo   '<th>Permission</th>';
echo   '<th>Pawprint</th>';
echo   '<th>Active</th>';
echo   '<th>Edit</th>';
echo   '<th>Deactivate/Reactivate</th>';
echo '</tr>';

foreach ($users as $value) { 
	if ($value['user_isactive'] == "true") {

    	echo '<div>';
        echo '<tr>';
        echo '<td>' . $value['user_email'] . '</td>';
        echo '<td>' . $value['user_firstname'] . '</td>';
        echo '<td>' . $value['user_lastname'] . '</td>';
        echo '<td>' . $value['user_permission'] . '</td>';
        echo '<td>' . $value['user_pawprint'] . '</td>';
        echo '<td>' . $value['user_isactive'] . '</td>';
        echo '<td><a href=editAccount.php?id=' . $value['user_email'] . '>Edit</a></td>';
        echo '<td><a href=deactivateUser.php?id=' . $value['user_email'] . '>Deactivate</a></td>';
        echo '</tr>';
        echo '</div>';


	}else {
    
    	echo '<div>';
        echo '<tr>';
        echo '<td>' . $value['user_email'] . '</td>';
        echo '<td>' . $value['user_firstname'] . '</td>';
        echo '<td>' . $value['user_lastname'] . '</td>';
        echo '<td>' . $value['user_permission'] . '</td>';
        echo '<td>' . $value['user_pawprint'] . '</td>';
        echo '<td>' . $value['user_isactive'] . '</td>';
        echo '<td><a href=editAccount.php?id=' . $value['user_email'] . '>Edit</a></td>';
        echo '<td><a href=reactivateUser.php?id=' . $value['user_email'] . '>Reactivate</a></td>';
        echo '</tr>';
        echo '</div>';
    }
    }
   echo '</table';
	
}

function viewAllTickets(){
	$tickets = is_array();
	$i=0;
	$query="SELECT * FROM Ticket ORDER BY ticket_id";
	$results = mysql_query($query);

	while ($row = mysql_fetch_assoc($results)) {
 		$tickets[$i] = $row;
 		$i++;
	}
	
	
echo '<table style="background:gray;">';
echo '<tr>';
echo   '<th>Ticket ID</th>';
echo   '<th>Price</th>';
echo   '<th>Date</th>';
echo   '<th>Time</th>';
echo   '<th>Violation</th>';
echo   '<th>Employee ID</th>';
echo   '<th>User ID</th>';
echo   '<th>Edit</th>';
echo   '<th>Delete</th>';
echo '</tr>';

foreach ($tickets as $value) { 
    if ($value['ticket_is_flagged'] == 1) {

    	echo '<div>';
        echo '<tr style="background: red;">';
        echo '<td>' . $value['ticket_id'] . '</td>';
        echo '<td>' . $value['ticket_price'] . '</td>';
        echo '<td>' . $value['ticket_date'] . '</td>';
        echo '<td>' . $value['ticket_time'] . '</td>';
        echo '<td>' . $value['ticket_violation'] . '</td>';
        echo '<td>' . $value['ticket_employee_id'] . '</td>';
        echo '<td>' . $value['ticket_userid'] . '</td>';
        echo '<td><a href=editTicket.php?id=' . $value['ticket_id'] . '>Edit</a></td>';
        echo '<td><a href=deleteTicket.php?id=' . $value['ticket_id'] . '>Delete</a></td>';
        echo '</tr>';
        echo '</div>';


	}else {
    	echo '<div>';
        echo '<tr>';
        echo '<td>' . $value['ticket_id'] . '</td>';
        echo '<td>' . $value['ticket_price'] . '</td>';
        echo '<td>' . $value['ticket_date'] . '</td>';
        echo '<td>' . $value['ticket_time'] . '</td>';
        echo '<td>' . $value['ticket_violation'] . '</td>';
        echo '<td>' . $value['ticket_employee_id'] . '</td>';
        echo '<td>' . $value['ticket_userid'] . '</td>';
        echo '<td><a href=editTicket.php?id=' . $value['ticket_id'] . '>Edit</a></td>';
        echo '<td><a href=deleteTicket.php?id=' . $value['ticket_id'] . '>Delete</a></td>';
        echo '</tr>';
        echo '</div>';
    }
    }
   echo '</table>';
}

function viewParks($emailParam){

	if($emailParam != NULL)
	{
		$query = sprintf("SELECT user_id from User WHERE user_email ='%s'",
		mysql_real_escape_string($emailParam));
		$results = mysql_query($query);
		$row = mysql_fetch_assoc($results);
		$userid = $row['user_id'];

		$query1 = sprintf("SELECT vehicle_id from Vehicle WHERE vehicle_userid ='%s'",
		mysql_real_escape_string($userid));
		$results1 = mysql_query($query1);
		$row = mysql_fetch_assoc($results1);
		$userid = $row['vehicle_id'];

		$query2 = sprintf("SELECT * from Park where park_vehicleid ='%s' ORDER BY park_time DESC", 
		mysql_real_escape_string($row['vehicle_id']));
		$result2 = mysql_query($query2);

		write_results_to_table($result2);

		mysql_free_result($result);
		mysql_free_result($result1);
		mysql_free_result($result2);

	}
	else
	{
		$query = sprintf("SELECT * from Park ORDER BY park_time DESC");
		$result = mysql_query($query);
		write_results_to_table($result);
		mysql_free_result($result);
	}

	function write_results_to_table($result)
{

        $row = mysql_fetch_assoc($result);


        echo '<table border = "1">';
        echo "<tr>";
        foreach($row as $key => $value)
        {
                echo "<th>$key</th>";
        }

        echo "</tr>";

        echo "<tr>";
        foreach($row as $res)
        {
                echo "<td>$res</td>";
        }

        echo "</tr>";

         while($row = mysql_fetch_assoc($result))
        {
                //print_r($row);

                echo "<tr>";

                foreach($row as $res)
                {
                        echo "<td>$res</td>";
                }

         }
        echo "</table>\n";

}
	
}

?>