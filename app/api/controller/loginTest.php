<?php
session_start();
require_once('../redbeanphp/rb.php');
R::setup('mysql:host=localhost;
        dbname=QPark','root','root');

if(!empty($_GET)){
	$vars = $_GET;
}elseif(!empty($_POST)){
	$vars = $_POST;
}else{
	$vars = null;
}

if(isset($vars['action']) && $vars['action'] != ''){
	if($vars['action'] == 'login'){
		login($vars['email'], $var['password']);
	}		
} else{
	echo "no action selected";
}


function login($email, $password) {


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
?>