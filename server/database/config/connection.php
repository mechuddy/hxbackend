<?php
	// import DB
	require_once 'DB.php';
	// create DB object
	$db = new DB("localhost", "root", "", "haxell_solutions");
	// attempt database connection
	$connectionStatus = $db->connect();
	// cond
	if($connectionStatus == false) {
		die("Cannot connect to MySQL Database");
	}
?>