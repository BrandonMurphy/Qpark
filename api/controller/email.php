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
		registerEmail($vars['email'], $vars['user']);
	}
    if($vars['action'] == 'loginEmail'){
        resetPasswordEmail($vars['email']);
    }
    if($vars['action'] == 'notifyUser'){
        notifyUser($vars['email']);
    }
} else{
    echo "no action selected";
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
function registerEmail($email, $user){

    //echo $email;
    $salt = sha1($email);
    $url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=";
    $qrcode = $url . $salt;

    // $db_result = mysql_query("SELECT user_qrcode FROM User WHERE user_email = $email");
    // $row = mysql_fetch_array($db_result, MYSQL_NUM);
    // $qrcode = $row[0];

    $mgClient = new Mailgun('key-6s-9iaeib8sokcc3jbp99ixtnpkhi6y4');
    $domain = "sandbox11344.mailgun.org";

    $mgClient->sendMessage("$domain",
    array('from'  => 'Qpark Crew <postmaster@sandbox11344.mailgun.org>',
        'to'      => 'User <'.$email.'>',
        'subject' => 'Welcome to QPark!',
        'html'    => "<p>Thank you for registering with QPark!</p>
                      <p>Confirm your email by clicking the link below</p>
                      <p>http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/home.php?user=".$user."</p>
                        <p>
                        You have chosen to login with the email qparkcrew@gmail.com 
                        You can find and print your personal QPark QR Code at 
                        ".$qrcode." 
                        </p>

                        <p>Please attach your QPark Code to the lower right hand side of the inside of your
                        windshield.</p>
                        <p>For more questions or concerns, you can contact QPark at qparkcrew@gmail.com.</p>
                        <p>Thanks again for choosing QPark!</p>"));

    //echo $email;
    echo " Finished";
  

}
function notifyUser($email) {

    $db_result = mysql_query("SELECT user_notification_time FROM User WHERE user_email = '$email'");
    $row = mysql_fetch_array($db_result, MYSQL_NUM);
    $notifTime = $row[0];


    $mgClient = new Mailgun('key-6s-9iaeib8sokcc3jbp99ixtnpkhi6y4');
    $domain = "sandbox11344.mailgun.org";

    $result = $mgClient->sendMessage("$domain",
    array('from'    => 'Qpark Crew <postmaster@sandbox11344.mailgun.org>',
        'to'      => $email,
        'subject' => 'Your Parking Time is Almost Expired!',
        'text'    => "Hello '.$email'. Your parking spot has ".$notifiTime." minutes left 
            before expiration. Thank you for using Qpark!"));

}



?>