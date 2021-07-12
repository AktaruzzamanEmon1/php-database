<?php 

	$firstName =  $lastName = $userName = $password = "";
	$isValid = true;
	$firstNameErr =  $lastNameErr = $userNameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$userName = $_POST['username'];
		$password = $_POST['password'];
		if(empty($firstName)) {
			$firstNameErr = "First name can not be empty!";
			$isValid = false;
		}
		
		if(empty($lastName)) {
			$lastNameErr = "Last Name can not be empty!";
			$isValid = false;
		}
		if(empty($userName)) {
			$userNameErr = "User name can not be empty!";
			$isValid = false;
         }
		if(empty($password)) {
			$passwordErr = "Password can not be empty!";
			$isValid = false;
		}
		if($isValid) {
			if(strlen($username) > 5) {
				$userNameErr = "User name can not be empty!";
			    $isValid = false;

			}
			if(strlen($password) > 8) {
				$passwordErr = "Password can not be empty!";
			     $isValid = false;

			}
			if($isValid){
			$firstName = test_input($firstName);
			$lastName = test_input($lastName);
			$userName = test_input($userName);
			$password = test_input($password);

			
			$response = true;
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
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
	<meta charset="utf-8">
	<title> Registration Form</title>
</head>
<body>

<h1>Registration Form</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<Form>
<table>
	<fieldset>
<legend>Basic Information:</legend>
<br>
	<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname">
			<span style="color:red"><?php echo $firstNameErr; ?></span>

			<br><br>


			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname">
			<span style="color:red"><?php echo $lastNameErr; ?></span>

			<br>

			

			<br><br>
			<label for="Gender ">Gender: </label><br>

		<input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label>
		<br>
		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label>
		<br>
		<input type="radio" id="other" name="gender" value="other">
		<label for="other">Other</label>
		<br><br>

		<label for="DoB">DoB:</label>
		<input type="date" id="date" name="date">
		
		<br><br>
		<label for="Religion">Religion:</label>
		<select id="Religion">
			<option value="Hindu">Hindu</option>
			<option value="Muslim">Muslim</option>
			<option value="Buddha">Buddha</option>
			<option value="Christian">Christian</option>

		<br><br>
      </fieldset>
        </table>



		
        <table>
         <fieldset>
         	<legend>Contact Information:</legend>
         <br>
         <label for="Present Address  ">Present Address </label>
	     <textarea id="Present Address" name="Present Address" rows="1" cols="18"></textarea>

		<br><br>
		<label for="Permanent Address  ">Permanent  Address </label>
		 <textarea id="Permanent Address " name="Permanent Address " rows="1" cols="18"></textarea>
		<br><br>
		<label for="Phone  ">Phone </label>
		<input type="tel" id="Phone" name="Phone ">
    
        <br><br>
		<label for="Email  ">Email </label>
		<input type="Email" id="email" name="email ">
		<br><br>
		<a href="https://github.com/AktaruzzamanEmon1">Personal Website Link </a>
        
        <br><br>
        </fieldset>
        </table>


       
        <table>
       <fieldset>
       <legend>Acount Information:</legend>
        <label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red"><?php echo $passwordErr; ?></span>
		<input type="submit" value="Submit">

        

</form>		
<p>Back to<a href="Login.php">Login</a></p>

	
		
</body>
</html>