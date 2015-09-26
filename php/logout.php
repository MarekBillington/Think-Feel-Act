<?php
	
	unset($_COOKIE['PHPSESSION']);
	setcookie('PHPSESSION', null, -1, '/');

	header("Location: http://localhost/Think-Feel-Act/Think-Feel-Act/index.php");
	die();

?>