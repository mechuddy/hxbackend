<?php
	/**
	 * API code to handle login request
	*/

	/**
	 * This authentication API returns the user ID
	 * The client can initiate session and store the user ID
	*/

	// def headers
	header("Access-Control-Allow-Origin: *"); // enable CORS
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// get required modules
	require_once '../database/models/User.php';
	require_once '../database/config/connection.php';

	// vars
	$empty = "";
	$email = $empty;
	$password = $empty;
	$response = $empty;
	$table = "users";

	// get request method
	$requestMethod = $_SERVER['REQUEST_METHOD'];

	// cond
	if($requestMethod == "POST") {
		// cond
		if(isset($_POST['email']) && isset($_POST['password'])) {
			// get user input
			$email = $_POST['email'];
			$password = $_POST['password'];
			// sanitize user input
			$email = $connection->real_escape_string($email);
			$password = $connection->real_escape_string($password);
			// cond
			if(User::exist($email) == true) {
				// cond
				if(User::confirmPassword($email, $password) == true) {
					// fetch user
					$user = User::fetch($email);
					// get user id
					$userId = $user['id'];
					// set response
					$response = $userId;
					// send response
					echo json_encode($response);
				} else {
					// set response
					$response = "Password Not Correct";
					// send response
					echo json_encode($response);
				}
			} else {
				// set response
				$response = "User Not Found";
				// send response
				echo json_encode($response);
			}
		} else {
			// set response
			$response = "No Payload Received";
			// send response
			echo json_encode($response);
		}
	} else {
		// set response
		$response = "Invalid Request";
		// send response
		echo json_encode($response);
	}

	// close connection
	$connection->close();
	// exit
	exit();
?>