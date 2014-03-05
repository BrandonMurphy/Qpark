<?php
class Admin {
	function deleteTicket($ticketId){
		if (isset($ticketId) && ($ticketId != NULL)) {
    		$ticketId = sanitize($ticketId, 'int');  //protect from sql injection
    		$query = "DELETE FROM Ticket WHERE ticket_id=$ticketId";
    			if(!mysql_query($query, $db_server))
        			echo "DELETE failed: $query<br />" . 
        			mysql_error() . "<br /><br />";
		}
	}
	function editTicket($ticket){
		if (isset($ticket->id) && ($ticket->id != NULL)) {
			$ticket->id = sanitize($ticket->id, 'int');  //protect from sql injection
			$query = "UPDATE Ticket WHERE ticket_id=$ticket->id";
				if(!mysql_query($query, $db_server))
        			echo "UPDATE failed: $query<br />" . 
        			mysql_error() . "<br /><br />";
		}
	}
	function createAccount($user){
			$email = $user->email;
        	$salt = sha1($user->email);
        	$password = sha1($user->password . $salt);
        	$fname = $user->fname;
        	$lname = $user->lname;
        	$permission = $user->permission;
        	$isactive = "true";
			$query = "INSERT INTO User VALUES $email, $password, $fname, $lname, $permission, $isactive";
	}
	function deleteAccount($userId){
		if (isset($userId) && ($userId != NULL)) {
			$userId = sanitize($userId, 'int');  //protect from sql injection
			$query = "DELETE User WHERE user_id=$userId";
				if(!mysql_query($query, $db_server))
        			echo "DELETE failed: $query<br />" . 
        			mysql_error() . "<br /><br />";
		}
	}
}
?>