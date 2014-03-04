<?php
class Admin {
	function deleteTicket($ticketId){
		if (isset($ticketId) && ($ticketId != NULL)) {
    		$id = sanitize($ticketId, 'int');  //protect from sql injection
    		$query = "DELETE FROM Ticket WHERE ticket_id=$ticketId";
    			if(!mysql_query($query, $db_server))
        			echo "DELETE failed: $query<br />" . 
        			mysql_error() . "<br /><br />";
		}
	}
	function editTicket($ticket){
		if (isset($ticketId) && ($ticketId != NULL)) {
			$id = sanitize($ticketId, 'int');  //protect from sql injection
			$query = "UPDATE Ticket WHERE ticket_id=$ticket->ticketId";
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
			$id = sanitize($userId, 'int');  //protect from sql injection
			$query = "DELETE User WHERE user_id=$userId";
				if(!mysql_query($query, $db_server))
        			echo "DELETE failed: $query<br />" . 
        			mysql_error() . "<br /><br />";
		}
	}
}
?>