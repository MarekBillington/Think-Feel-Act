<?php
	
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$c_password = $_POST["confirm-password"];

	//establish connection to database
	require_once ("settings.php");
							
	$conn =@mysqli_connect($host, $user, $pass, $dbnm);
	
	if ($conn->connect_error) {
		die("The database is unavailable at the moment." . $conn->connect_error);
	}

	mysqli_select_db($conn, $dbnm);
	//check that the passwords upon registration match
	function checkpasswordmatches($pass, $c_pass)
	{
		if($pass == $c_pass)
		{
			return TRUE;
		}
	}

	//check that the username is not already taken
	function checkunusedusername($user)
	{
		$usernameSearch = "SELECT * from counselors_login WHERE username LIKE '".$user."'";

		$usernameResultSearch =@mysqli_query($conn, $usernameSearch);

		$numRows =@mysqli_num_rows($usernameResultSearch);
		
		if($numRows > 0)
		{	
			return FALSE;
		} else {

			return TRUE;
		}
	}

	//check that the email has not already been used
	function checkunusedemail($em)
	{
		$emailSearch = "SELECT * from counselors_login WHERE email LIKE '".$em."'";

		$emailResultSearch =@mysqli_query($conn, $emailSearch);

		$numRows =@mysqli_num_rows($emailResultSearch);

		if($numRows > 0)
		{

			return FALSE;
		} else {

			return TRUE;
		}
	}

	$insertUserToDatabase = "INSERT INTO counselors_login (username, email, password) VALUES ('".$username."', '".$email."', '".$password."')";
	if(
		(checkunusedemail($username) == TRUE) &&
		(checkunusedusername($email) == TRUE) &&
		(checkpasswordmatches($password, $c_password) == TRUE)
		)
	{
		mysqli_query($conn, $insertUserToDatabase);
		setcookie("PHPSESSION", $username, 0, "/");
	}


	mysqli_close($conn);
	header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/c_profile.html");
	die();
?>