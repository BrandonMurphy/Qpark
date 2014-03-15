<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

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
	if($vars['action'] == 'registerEmail'){
		registerEmail($vars['email']);
	}
    if($vars['action'] == 'loginEmail'){
        resetPasswordEmail($vars['email']);
    }
}

function resetPasswordEmail($email){

    $salt = sha1($email);
    $temp = 'temp';
    $tempPassword = $temp . $salt;
    
    $query = sprintf("UPDATE User SET user_password = '%s'  WHERE user_email = '%s'", mysql_real_escape_string($tempPassword), mysql_real_escape_string($email));



    $result = $mgClient->sendMessage("$domain",
    array('from'    => 'Enter QPark Email address here',
        'to'      => $email,
        'subject' => 'QPark Login Information',
        'text'    => "Hello '.$email'. Your temporary password is '.$tempPassword.'.  Please use this
                        to login to QPark.  You can then reset your password in your account settings.
                        Thanks!'\n'-QPark Team   "));




}
function registerEmail($email){

    $salt = sha1($email);
    $url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=";
    $qrcode = $url . $salt;

    $db_result = mysql_query("SELECT user_qrcode FROM User WHERE user_email = $email");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $qrcode = $row[0];


    $mgClient = new Mailgun('key-3ax6xnjp29jd6fds4gc373sgvjxteol0');
    $domain = "samples.mailgun.org";

    $result = $mgClient->sendMessage("$domain",
    array('from'    => 'Enter QPark Email address here',
        'to'      => $email,
        'subject' => 'Welcome to QPark!',
        'text'    => "Thank you for registering with QPark!  You have chosen to login with 
                        the email '.$email .'.  You can also find and print your personal QPark 
                        Code at https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$qrcode\n.'
                        Please attach your QPark Code to the lower lefthand side of the inside of your
                        windshield.  For more questions or concerns, you can contact QPark at <Qpark email>.
                        Thanks again for choosing QPark!    "));

  

}



?>