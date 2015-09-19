<?php
	
	$conn = NULL;
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$c_password = $_POST["confirm-password"];
						
	$conn = mysqli_connect("localhost", "root", "", "thinkfeelact");
	
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
		$conn = mysqli_connect("localhost", "root", "", "thinkfeelact");

		$usernameSearch = "SELECT * from registered_users WHERE username LIKE '".$user."'";

		$usernameResultSearch = mysqli_query($conn, $usernameSearch);

		$numRows = mysqli_num_rows($usernameResultSearch);
		
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
		$conn = mysqli_connect("localhost", "root", "", "thinkfeelact");

		$emailSearch = "SELECT * from registered_users WHERE email LIKE '".$em."'";

		$emailResultSearch = mysqli_query($conn, $emailSearch);

		$numRows = mysqli_num_rows($emailResultSearch);
		
		if($numRows > 0)
		{	
			return FALSE;
		} else {

			return TRUE;
		}
		
	}

	$insertUserToDatabase = "INSERT INTO registered_users (username, email, password) VALUES ('".$username."', '".$email."', '".$password."')";
	if(
		(checkunusedemail($email) == TRUE) &&
		(checkunusedusername($username) == TRUE) &&
		(checkpasswordmatches($password, $c_password) == TRUE)
		)
	{
		mysqli_query($conn, $insertUserToDatabase);
		setcookie("PHPSESSION", $username, 0, "/");
		header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/c_profile.php");
	} else {
		header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/Login.php");
	}

	mysqli_close($conn);
	die();
?>