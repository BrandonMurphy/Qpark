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

class user {

	function login($user) {

    $link = mysql_connect('localhost', 'root', 'root');
      if (!$link) {
        die('Could not connect: ' . mysql_error());
      }

    $query = sprintf("SELECT user_email from User WHERE user_email='%s'",
    mysql_real_escape_string($user['email']));

    $results = mysql_query($query);
    $row = mysql_fetch_assoc($results);
   
    mysql_free_result($results);

    $email = $row['user_email'];


    //comparing password with confirm password
    if(strcmp($user['email'], $row) == 0) {

      //getting password to compare with one they enteres
      //$query1 = "select password_hash, salt from lab8.authentication where username = $1";

      $query1 = sprintf("SELECT user_password from User WHERE user_email='%s'",
      mysql_real_escape_string($email));

      $results1 = mysql_query($query1);

      $row1 = mysql_fetch_assoc($results1);

      mysql_free_result($results1);

      mysql_close($link);          

      $salt = sha1($user['email']);
      

      //comparing password in database with users input
      if(strcmp(sha1($user['password'] . $salt), $row1['user_password']) == 0) {

        //create username session to be sent accross pages
        //$_SESSION['email'] = $_POST['email'];
        if(isset($user['email'])) {
          header("Location: home.php");
        }

      }
      else {
        echo '<br/>';
        echo"Invalid username or password";
        echo '<br/>';
      }
    }
    else {
      echo '<br/>';
      echo "Invalid usernam or password";
      echo '<br/>';
    }
  }
}

?>