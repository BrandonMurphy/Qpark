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
?>
