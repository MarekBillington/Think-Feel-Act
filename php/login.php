<?php

	$username = $_GET['username'];
	$password = $_GET['password'];
	$rememberme = $_GET['remember'];

	require_once ("settings.php");
							
	$conn =@mysqli_connect($host, $user, $pass, $dbnm);
	
	if ($conn->connect_error) {
		die("The database is unavailable at the moment." . $conn->connect_error);
	}

	mysqli_select_db($conn, $dbnm);

	$loginQuery = "SELECT * FROM registered_users WHERE username = '".$username."' AND password = '".$password."'";

	$loginSearch =@mysqli_query($conn, $loginQuery);

	$row = mysqli_fetch_array($loginSearch);

	//checking to see if there is a username and password allocated to the work
	if(	(is_null($row['username'])) &&
		(is_null($row['password']))
		)
	{	
		header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/Login.html");
	} else {
		if($rememberme == "on")
		{
			echo $rememberme;
			setcookie("USER_REM", $username, time() + (86400 * 30), "/");
		}
		setcookie("PHPSESSION", $username, 0, "/");
		header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/c_profile.html");
	}

	mysqli_close($conn);
	die();
?>