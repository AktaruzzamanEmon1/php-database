<?php  
    require 'DbInsert.php'; 

	$firstNameErr =  $lastNameErr = $userNameErr = $passwordErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$firstname = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$userName = $_POST['username'];
		$password = $_POST['password'];
		$isValid = true;
		if(empty($firstname)) {
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
			if(strlen($userName) > 5) {
				$userNameErr = "Username max size 5!";
			    $isValid = false;

			}
			if(strlen($password) > 8) {
				$passwordErr = "Password max size 8!";
			     $isValid = false;

			}
			if($isValid){
			$firstname = test_input($firstname);
			$lastName = test_input($lastName);
			$userName = test_input($userName);
			$password = test_input($password);

			
			$response = register( $firstname, $lastName, $userName, $password);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name= "regitrationForm" onsubmit="return isvalid()">

<table>
	<fieldset>
<legend>Basic Information:</legend>
<br>
	<label for="firstname">First Name:</label>
			<input type="text" name="firstname" id="firstname">
			<span style="color:red" id="firstNameErr"><?php echo $firstNameErr; ?></span>

			<br><br>


			<label for="lastname">Last Name:</label>
			<input type="text" name="lastname" id="lastname">
			<span style="color:red" id="lastNameErr"><?php echo $lastNameErr; ?></span>

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
		<label for="Link  ">Personal Website Link </label>
		<input type="text" id="text" name="text ">
		<br><br>
        </fieldset>
        </table>


       
        <table>
       <fieldset>
       <legend>Acount Information:</legend>
        <label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<span style="color:red" id="userNameErr"><?php echo $userNameErr; ?></span>

			<br><br>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span>
		<input type="submit" value="Submit">

        

</form>	
<script>
	function isvalid(){
    var flag = true;
    var firstNameErr = document.getElementById("firstNameErr"); 
    var lastNameErr = document.getElementById("lastNameErr");
    var userNameErr = document.getElementById("userNameErr");
    var passwordErr = document.getElementById("passwordErr");
    var firstName = document.forms["registrationForm"]["firstname"].value;
    var lastName = document.forms["registrationForm"]["lastName"].value;
    var userName = document.forms["registrationForm"]["userName"].value;
    var password = document.forms["registrationForm"]["password"].value;
    firstNameErr.innerHTML = "";
    lastNameErr.innerHTML = "";
    userNameErr.innerHTML = "";
    passwordErr.innerHTML = "";

    if (firstname === ""){
    	flag = false;
    	 firstNameErr.innerHTML = " Please fillup the first name";

    }
     if (lastname === ""){
    	flag = false;
    	 lastNameErr.innerHTML = " Please fillup the last name";

    }
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





<p>Back to<a href="Login.php">Login</a></p>

	
		
</body>
</html>