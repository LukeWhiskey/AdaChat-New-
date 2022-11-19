<?php
	session_start();

	$msgData = $_POST['msg'];
	$user = $_POST['user'];
	$chat = $_GET['chat'];

	$jsonString = file_get_contents("Tabs.json");
	$data = json_decode($jsonString, True);

	for($i = 0; $i <= count($data[Chats]); $i++) {
		$chatID = $data[Chats][$i]['chatName'];
		if ($chatID == $chat) {
			$chat = $i;
			$chatFound = 1;
			break;
		}
		else {
			$chatFound = 0;
		}
	}

	if ($chatFound == 1) {
		$package1 = array(
			'msgCont' => $msgData,
			'user' => $user
		);
		if (!isset($data[Chats][$chat][msgs])) {
			$package2 = array(
				'1' => $package1
			);
			$package4 = array(
				'msgs' => $package2
			);
		}
		else {
			$package2 = array(
				count($data[Chats][$chat][msgs])+1 => $package1
			);
			$package3 = $data[Chats][$chat][msgs] + $package2;
			$package4 = array(
				'msgs' => $package3
			);
			unset($data[Chats][$chat][msgs]);
		}
		$package5 = $data[Chats][$chat] + $package4;
		$package6 = array(
			$chat => $package5
		);
		unset($data[Chats][$chat]);
		$package7 = $package6 + $data[Chats];
		$newPackage = array(
			'Chats' => $package7
		);
		print_r($newPackage);
		$newJsonString = json_encode($newPackage);
		file_put_contents("Tabs.json", $newJsonString);
		//create call back for placeholder message, that will be replaced by message when received by database
	}
	else {
		return false;
	}
?>