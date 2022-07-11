<?php 
	$cName = $_POST['cName']; 
	$desc = $_POST['desc']; 
	$nsfw = isset($_POST['nsfw']) ? "True" : "False";

	$jsonString = file_get_contents('Tabs.json');
	$data = json_decode($jsonString, true);

	$newName1 = array(
		'cName' => $cName,
		'desc' => $desc,
		'nsfw' => $nsfw
	);
	$newName2 = array(
		count($data)+1 => $newName1
	);

	$newPackage = $data + $newName2;
	$newJsonString = json_encode($newPackage);
	file_put_contents('Tabs.json', $newJsonString);
?>
<?php
	mkdir('chats/'. $cName);
	$temp = 'chats/'. $cName. '/'. $cName;
	$newChat = $temp. '.html';
	$newChatJSON = $temp. '.json';
	$newChatPHP = $temp. '.php';
	copy("genericTab.html", $newChat);
	copy("genericTab.php", $newChatPHP);
	if (file_exists($newChat)) {
		$fileJSON = fopen($newChatJSON,'w+'); 
		fwrite($fileJSON, "{}"); 
		fclose($fileJSON);
	}
	header('Location:'. $newChat)
?>