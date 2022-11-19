<?php
	session_start();
	
	$user = $_POST['id'];
	$pass = $_POST['password'];

	$jsonUsers = file_get_contents("Users.json");
	$jsonDecode = json_decode($jsonUsers, True);

	for ($i = 1; $i <= count($jsonDecode['Users']); $i++) {
		$userEmail = $jsonDecode['Users'][$i]['email'];
		$userName = $jsonDecode['Users'][$i]['userName'];
		$userPass = $jsonDecode['Users'][$i]['password'];

		if ($user === $userEmail OR $user === $userName) {
			if ($pass === $userPass) {
				$id = uniqid(rand (), true);
				$_SESSION['user'] = array(
					'user' => $userName,
					'id' => $id
				);
				$success = $userName;
				$successEnc = json_encode($success);
				echo $successEnc;
				return false;
			}
			else {
				$status = 2;
			}
		}
		else {
			$status = 1;
		}
	}
	if ($status = 1) {
		$userErr = "User does not exist";
		$userErrEnc = json_encode($userErr);
		echo $userErrEnc;
	}
	else if ($status = 2) {
		$passErr = "Password is incorrect";
		$passErrEnc = json_encode($passErr);
		echo $passErrEnc;
	}
?>