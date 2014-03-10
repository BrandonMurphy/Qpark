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
		login($vars['email'], $vars['password']);
	}
	if($vars['action'] == 'register'){
		register($vars['email'], $vars['password'],$vars['fname'],$vars['lname'],$vars['pawprint'],$vars['make'],$vars['model'], $vars['year'], $vars['plate'], $vars['color'], $vars['state']);
	}
	if($vars['action'] == 'update'){
		updateaacountinfo($vars['fname'],$vars['lname'], $vars['password'], $vars['email']);
	}
} else{
	echo "no action selected";
}


function login($email, $password) {
//echo $email;

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
	
$query1 = sprintf("SELECT user_password from User WHERE user_email='%s'",
mysql_real_escape_string($email));
$results1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($results1);
mysql_free_result($results1);
mysql_close($link);
$salt = sha1($email);
      
    //comparing password in database with users input
    if(strcmp(sha1($password . $salt), $row1['user_password']) == 0)
    {

            //create username session to be sent accross pages
            //$_SESSION['email'] = $_POST['email'];

		if(isset($email))
		{
		        echo "Sucessful";
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

function Register($emailParam, $passwordParam, $fnameParam, $lnameParam, $pawprintParam, $makeParam, $modelParam, $yearParam, $licensePlate, $colorParam, $stateParam){

//session_start();


// if(isset($_POST['submit']))
// {


//     if(!$_POST['email'])
//     {
//             echo '<br/>';
//             echo 'Error: Some data was invalid. Please try again.';
//             echo '<br/>';
//             exit;
//     }
//     if(!$_POST['password'])
//     {
//             echo '<br/>';
//             echo 'Error: Some data was invalid. Please try again.';
//             echo '<br/>';
//             exit;
//     }
//     if(!$_POST['confirm-password'])
//     {
//             echo '<br/>';
//             echo 'Error: Some data was invalid. Please try again.';
//             echo '<br/>';
//             exit;
//     }
//     //check if passwords match
//     if(strcmp($_POST['password'], $_POST['confirm-password'])==0)
//     {

$query = sprintf("SELECT user_email from User WHERE user_email='%s'",
mysql_real_escape_string($emailParam));



$results = mysql_query($query);

$row = mysql_fetch_assoc($results);



//check if username exists
  if(strcmp($row, $emailParam)==0)
{
        echo "Username already taken.";

}
//if not exists insert new name
else
{
	//Set and Insert User Info
    $email = $emailParam;
    $salt = sha1($emailParam);
    $password = sha1($passwordParam . $salt);
    $fname = $fnameParam;
    $lname = $lnameParam;
    $permission = "a";
    $pawprint = $pawprintParam;
    $isactive = "true";
    $qrcode = "qr";
    $datetime = $_SERVER['REQUEST_TIME'];

	mysql_query("Insert INTO User VALUES (NULL, '$email', '$password', '$fname', '$lname', '$permission', '$pawprint', '$isactive', '$qrcode', '$datetime')");


	// Query for user_id for user that was just created
	$query = sprintf("SELECT user_id from User WHERE user_email='%s'",
	mysql_real_escape_string($emailParam));

	$results = mysql_query($query);

	$row = mysql_fetch_assoc($results);

	// Set and Insert User Vehicle Info
	$make = $makeParam;
	$model = $modelParam;
	$year = $yearParam;
	$plate = $licensePlate;
	$color = $colorParam;
	$state = $stateParam;
	$user_id = $row['user_id'];

	$veh = mysql_query("Insert into Vehicle VALUES(NULL, '$make', '$model', 1999, '$plate', '$color', '$state','$user_id')");

	echo $makeParam;
	echo "<br/>";
	echo $modelParam;
	echo "<br/>";
	echo $yearParam;
	echo "<br/>";
	echo $licensePlate;
	echo "<br/>";
	echo $colorParam;
	echo "<br/>";
	echo $stateParam;
	echo "<br/>";

	if(!$veh)
	{
	       echo "failed";;
	}
	else
	{
	        echo "Sucessful";
	}

	}

}
function updateaacountinfo($fname, $lname, $passwordParam, $emailParam){

$email = $emailParam;
$salt = sha1($emailParam);
$password = sha1($passwordParam . $salt);
$query = sprintf("UPDATE User SET user_firstname = '%s', user_lastname = '%s', user_password = '%s'  WHERE user_email = '%s'",mysql_real_escape_string($fname), mysql_real_escape_string($lname), mysql_real_escape_string($password), mysql_real_escape_string($email));


$results = mysql_query($query);

mysql_free_result($results);
mysql_close($link);

echo "function end";



}
?>