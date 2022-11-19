<?php
	session_start();
	//include 'getLogData.php';

	$user = $_SESSION['user']['user'];
	$userID = $_SESSION['user']['id'];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$timeZone = "Europe/London";//$timezone_data;
	date_default_timezone_set($timeZone); 
	$date = date(r);

	$cName = $_POST['cName'];
	$cName = str_replace("\\", "", $cName);
	$desc = $_POST['desc'];
	$nsfw = isset($_POST['nsfw']) ? True : False;

	if ($cName == Null OR $cName == "") {
		header("Location: CreatNewChat.php");
	}

	$jsonString = file_get_contents('Tabs.json');
	$data = json_decode($jsonString, True);

	$newName1 = array(
		'chatName' => $cName,
		'creator' => $user,
		'sessionId' => $userID,
		'IP address' => $ip,
		'location' => $timeZone,
		'localTime' => $date,
		'desc' => $desc,
		'nsfw' => $nsfw
	);
	if (count($data) == 0) {
		$newName2 = array(
			count($data)+1 => $newName1
		);
		$newName3 = array(
			'Chats' => $newName2
		);
	}
	else {
		$newName2 = array(
			count($data)+1 => $newName1
		);
		$newName3 = array(
			'Chats' => $newName2
		);
	}
	$newPackage = $data + $newName3;

	$newJsonString = json_encode($newPackage);
	file_put_contents('Tabs.json', $newJsonString);

	header("Location: GenericTab.php?chat=". $cName);
?>