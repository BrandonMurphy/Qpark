<?php
echo "<pre>";
echo "string";
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'login' : login();break;
        case 'blah' : blah();break;
        // ...etc...
    }
}

$username = 'Brandon';
$password = 'Guest';
$email = 'brandon@test.com';

$user = new stdClass();

// Create login functions
// Login Function

function viewticket(){
        session_start();

$email = $_SESSION['email'];


// Connect to database
$link = mysql_connect('dbhost-mysql.cs.missouri.edu', 'rdtg6', 'EvkknFwT');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }

$query = sprintf("Select user_id from rdtg6.User where user_email='%s'", mysql_real_escape_string($email));

$result = mysql_query($query);

$userid = mysql_fetch_assoc($result);

//echo $userid['user_id'];

$query1 = sprintf("Select vehicle_id from rdtg6.Vehicle where vehicle_userid='%s'", mysql_real_escape_string($userid['user_id']));

$result1 = mysql_query($query1);

$vehicleid = mysql_fetch_assoc($result1);

//echo $vehicleid['vehicle_id'];

$query2 = sprintf("Select park_id from rdtg6.Park where park_vehicleid='%s'", mysql_real_escape_string($vehicleid['vehicle_id']));

$result2 = mysql_query($query2);

//$parkid = mysql_fetch_assoc($result2);


while ($row = mysql_fetch_array($result2, MYSQL_ASSOC)) {

$query3 = sprintf("Select * from rdtg6.Ticket where ticket_parkid='%s' AND ticket_isactive = 'true'", mysql_real_escape_string($row['park_id']));

$result3 = mysql_query($query3);
write_results_to_table($result3);

echo '<br/>';

}

//$result3 = mysql_query($query3);

//write_results_to_table($result3);

mysql_free_result($result);
mysql_close($link);

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

function Logout(){

        session_start();
        session_destroy();
        $_SESSION = array();
        header("Location: index.php");


}


function updateaacountinfo($description){

if(isset($_POST['submit']))
{
        session_start();

        $email = $_SESSION['email'];

        //connect to databse
        $link = mysql_connect('localhost', 'root', 'root');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }
$query = sprintf("UPDATE rdtg6.User SET user_pawprint = '%s' WHERE user_email = '%s'",mysql_real_escape_string($_POST['description']), mysql_real_escape_string($email));



        $results = mysql_query($query);

        mysql_free_result($results);
        mysql_close($link);

        header("Location: home.php");



}

}


function readaccountinfo(){
session_start();

$email = $_SESSION['email'];

// Connect to database
$link = mysql_connect('localhost', 'root', 'root');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }

$query = sprintf("Select user_email, user_firstname, user_lastname, user_pawprint from rdtg6.User where user_email='%s'",
                                mysql_real_escape_string($email));
$result = mysql_query($query);

write_results_to_table($result);


        echo "</br>";
        echo "<a href = 'update.php'>Update</a> Account Info";
        echo "</br>";
        echo "</br>";


mysql_free_result($result);
mysql_close($link);

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

                echo "</tr>";

        }
        echo "</table>\n";


}


}


function RegisterVehicle($make, $model, $year, $plate, $color, $state){

session_start();
if(isset($_POST['submit']))
        {


$link = mysql_connect('localhost', 'root', 'root');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }
                                //echo 'Connected successfully';


                        $email =  $_SESSION['email'];


                                $query = sprintf("SELECT user_id from rdtg6.User WHERE user_email='%s'",
                                mysql_real_escape_string($email));





                                $results = mysql_query($query);

                                $row = mysql_fetch_assoc($results);




                                $make = $_POST['make'];
                                $model = $_POST['model'];
                                $year = '1990';
                                $plate = $_POST['plate'];
                                $color = $_POST['color'];
                                $state = $_POST['state'];
                                $user_id = $row['user_id'];


$veh = mysql_query("Insert into rdtg6.Vehicle VALUES(NULL, '$make', '$model', 1990, '$plate', '$color', '$state','$user_id')");

if(!$veh)
{
        header("Location: register.php");
}
else
{
        header("Location: home.php");
}


}



}

function Register($email, $password, $firstname, $lastname, $pawprint ){

session_start();


        if(isset($_POST['submit']))
        {


                if(!$_POST['email'])
                {
                        echo '<br/>';
                        echo 'Error: Some data was invalid. Please try again.';
                        echo '<br/>';
                        exit;
                }
                if(!$_POST['password'])
                {
                        echo '<br/>';
                        echo 'Error: Some data was invalid. Please try again.';
                        echo '<br/>';
                        exit;
                }
                if(!$_POST['confirm-password'])
                {
                        echo '<br/>';
                        echo 'Error: Some data was invalid. Please try again.';
                        echo '<br/>';
                        exit;
                }
                //check if passwords match
                if(strcmp($_POST['password'], $_POST['confirm-password'])==0)
                {

                        $link = mysql_connect('localhost', 'root', 'root');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }
                                //echo 'Connected successfully';


                                $query = sprintf("SELECT user_email from rdtg6.User WHERE user_email='%s'",
                                mysql_real_escape_string($_POST['email']));



                                $results = mysql_query($query);

                                $row = mysql_fetch_assoc($results);



                                        //check if username exists
                                          if(strcmp($row, $_POST['email'])==0)
                                        {
                                                echo "Username already taken.";

                                        }
                                        //if not exists insert new name
                                        else
                                        {

                                                $email = $_POST['email'];
                                                $salt = sha1($_POST['email']);
                                                $password = sha1($_POST['password'] . $salt);
                                                $fname = $_POST['firstname'];
                                                $lname = $_POST['lastname'];
                                                $permission = "a";
                                                $pawprint = $_POST['pawprint'];
                                                $isactive = "true";
                                                $qrcode = "qr";
                                                $datetime = '2014-02-12 00:00:00';


                                                mysql_query("Insert INTO rdtg6.User VALUES (NULL, '$email', '$password', '$fname', '$lname', '$permission', '$pawprint', '$isactive', '$qrcode', '$datetime')");


                                        mysql_close($link);


//create session to send username accross pages
                                                                $_SESSION['email'] = $_POST['email'];

                                                if(isset($_SESSION['email']))
                                                {
                                                        header("Location: vehicleregister.php");
                                                }

                                    }



                }

                else
                {
                        echo'<br/>';
                        echo"password does not match confirmation password";
                }





        }

}

function login($email, $password) {
echo "test";
$link = mysql_connect('localhost', 'QPark', 'root', 'root');
                        if (!$link) {
                        die('Could not connect: ' . mysql_error());
                        }
                                //echo 'Connected successfully';


                                $query = sprintf("SELECT user_email from User WHERE user_email='%s'",
                                mysql_real_escape_string($email));



                                $results = mysql_query($query);

                                $row = mysql_fetch_assoc($results);
      
        mysql_free_result($results);

      //  echo $row['user_email'];
        $email = $row['user_email'];


                //comparing password with confirm password
                if(strcmp($email, $row) == 0)
                {

      //echo "here";

                        //getting password to compare with one they enteres
                        //$query1 = "select password_hash, salt from lab8.authentication where username = $1";

      $query1 = sprintf("SELECT user_password from User WHERE user_email='%s'",
                                mysql_real_escape_string($email));


      $results1 = mysql_query($query1);

      $row1 = mysql_fetch_assoc($results1);

      mysql_free_result($results1);

      mysql_close($link);

      //echo $row1['user_password'];
      

                        //$results1 = pg_prepare($conn, "pass", $query1);
                        //$results1 = pg_execute($conn, "pass", array($_POST['username']));

                        //$row1 = pg_fetch_assoc($results1);

      $salt = sha1($email);
      

                        //comparing password in database with users input
                        if(strcmp(sha1($password . $salt), $row1['user_password']) == 0)
                        {

                                //create username session to be sent accross pages
                                //$_SESSION['email'] = $_POST['email'];

                                if(isset($email))
                                {
                                        header("Location: home.php");
                                }

                        }
                        else
                        {
                                echo '<br/>';
                                echo"Invalid username or password";
                                echo '<br/>';
                        }


                }
                else
                {
                        echo '<br/>';
                        echo "Invalid usernam or password";
                        echo '<br/>';
                }

}

	//function to show any messages
	/*function messages() {
   		$message = '';
   		if($_SESSION['success'] != '') {
       		$message = '<span class="success" id="message">'.$_SESSION['success'].'</span>';
       		$_SESSION['success'] = '';
   		}
   		if($_SESSION['error'] != '') {
       		$message = '<span class="error" id="message">'.$_SESSION['error'].'</span>';
       		$_SESSION['error'] = '';
   		}
   		return $message;
	}

	// function to escape data and strip tags
	function safestrip($string){
       	$string = strip_tags($string);
       	$string = mysql_real_escape_string($string);
       	return $string;
	}
}
*/
?>