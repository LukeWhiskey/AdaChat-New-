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
	$newChat = 'chats/'. $cName. '.html';
	$newChatJSON = 'chats/'. $cName. '.json';
	$newChatPHP = 'chats/'. $cName. '.php';
	copy("genericTab.html", $newChat);
	copy("genericTab.php", $newChatPHP);
	if (file_exists($newChat)) {
		$fileJSON = fopen($newChatJSON,'w+'); 
		fwrite($fileJSON, "{}"); 
		fclose($fileJSON);
	}
	header('Location:'. $newChat)
?>