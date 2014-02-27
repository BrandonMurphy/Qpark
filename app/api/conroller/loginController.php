<html>
<head>
<title>Log in</title>
</head>
<body>
        <form action='index.php' method='POST'>
                <label id='email'>Email: </label>
                <input type='text' name='email' /> <br />
                <label id='password'>Password: </label>
                <input type='password' name='password' /> <br />
                <input type='submit' value='Submit' name='submit' />
                        </form>
        <a onlick="myFunction()">Click here</a> to register.
</body>
</html>
<script type="text/javascript">
function myFunction() {

    $.ajax({
        url: 'loginController',
        type: 'POST',
        dataType: "json",
        data: {
            email: $('#email').val(),
            password: $('#password').val()
        },
        success: function(data){
            alert(JSON.stringify(data));
    });

}
</script>
<?php

$username = 'Brandon';
$password = 'Guest';
$email = 'brandon@test.com';

// Create login functions
// Login Function

class login {

	function login($email, $password) {

		// //call safestrip function
 	// 	$user = safestrip($username);
 	// 	$pass = safestrip($password);

		// //convert password to md5
 	// 	$password = md5($pass);

 	// 	// check if the user id and password combination exist in database
  // 		$sql = mysql_query("SELECT * FROM Authentication WHERE username = '$user' AND password = '$pass'")or die(mysql_error());

  // 		//if match is equal to 1 there is a match
  // 		if (mysql_num_rows($sql) == 1) {

  //           //set session
  //           $_SESSION['authorized'] = true;

  //           // reload the page
  //          	$_SESSION['success'] = 'Login Successful';
  //           header('Location: ./index.php');
  //           exit;


  //  		} else {
  //           // login failed save error to a session
  //           $_SESSION['error'] = 'Sorry, wrong username or password';
  // 		}

    // vars

$link = mysql_connect('localhost', 'root', 'root');
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