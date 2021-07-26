<?php
   require 'DbRead.php';
  	
	$usernameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
   if($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$isValid = true;
		if(empty($username)) {
			$usernameErr = "User name can not be empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		
		 if($isValid) 
		 {

			if(strlen($username) > 6) {
				$usernameErr = "Username max size 6!";
			    $isValid = false;

			}
			if(strlen($password) > 8) {
				$passwordErr = "Password max size 8!";
			     $isValid = false;
			 }
			 if($isValid) {
                  $username = test_input($username);
			      $password = test_input($password);
				   $response = login($username, $password);
				if( $response) {
					session_start();
					$_SESSION['username'] = $username;
					header("Location: Welcome.php");
				}
				else{
					$errorMessage = "Login Failed";
				}
				
			
				
				  }
          }
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	 <body style="background-color:#CCCCFF;">
	<meta charset="utf-8">
	<title>Login Form</title>
<body>
<h1>Login Form </h1>
	

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset align="center">
			<legend>Login Form</legend>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red" id="userNameErr"><?php echo $userNameErr; ?></span>

			<br><br>

				<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span>
			<br><br>
			
			

			
			
			<button style="background-color:  #ffb3ff"><a href="Home_page.php"> Back</a></button>

			<input type="submit" name="submit" value="Login">

		</fieldset>
	</form>

	<script>
	function isvalid(){
    var flag = true;
 
    var userNameErr = document.getElementById("userNameErr");
    var passwordErr = document.getElementById("passwordErr");
  
    var userName = document.forms["registrationForm"]["userName"].value;
    var password = document.forms["registrationForm"]["password"].value;
   
    userNameErr.innerHTML = "";
    passwordErr.innerHTML = "";

   
     if (userName === ""){
    	flag = false;
    	 userNameErr.innerHTML = " Please fillup the user name";

    }
     if (password === ""){
    	flag = false;
    	 passwordErr.innerHTML = " Please fillup the password";

    }
    return flag;


	}
</script>

	

</body>
</html>