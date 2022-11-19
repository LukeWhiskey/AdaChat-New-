<?php
	session_start();

	// Gets POST variables sent from Signup.php ajax
	$email = $_POST['email'];
	$user = $_POST['user'];
	$password = $_POST['password'];

	// Checks whether the variables are null and then redirects
	if ($email == Null OR $user == Null OR $password == Null) {
		header("Location: Home.php");
	}

	// Opens and decodes Users.json
	$jsonUsers = file_get_contents("Users.json");
	$decodeJson = json_decode($jsonUsers, True);

	// Checks Duplicate Users within Users.json
	for($i = 0; $i <= count($decodejson[Users]); $i++) {
		$userEmail = $decodejson[Users][$i]['email'];
		$userName = $decodejson[Users][$i]['userName'];
		if ($userEmail === $email OR $userName === $user) {
			header("Location: Signup.php");
			return false;
		}
	}

	$userData = array(
		'email' => $email,
		'userName' => $user,
		'password' => $password //password unhashed vulnerability (Should hash both on client side and server)
	);
	$newPackage = array(
		count($decodeJson[Users])+1 => $userData
	);

	// Creates 'Users' Object in Users.json if No Users Exist
	if (count($decodeJson) == 0) {
		$create = array(
			'Users' => $newPackage
		);
		$package = $decodeJson + $create;
	}
	else {
		$newUser = $decodeJson[Users] + $newPackage;
		$create = array(
			'Users' => $newUser
		);
		unset($decodeJson[Users]);
		$package = $create;
	}

	// Encodes and sends json package tp Users.jsom 
	$jsonEncode = json_encode($package);
	file_put_contents("Users.json", $jsonEncode);

	// Generates unique id and user session data
	$id = uniqid(rand(), true);
	$_SESSION['user'] = array(
		'user' => $user,
		'id' => $id //php header vulnerability 
	);
	header("Location: GenericUser.php");
?>