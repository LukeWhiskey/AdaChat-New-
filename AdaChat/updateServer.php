<?php // Chats
	//File is for updating chat tabs html, php and json file according to generic version
	updateTabs.php & // Updates Automatically (Not Working)
	$chats = array(); // Creates array of files within 'chats/'
	foreach(glob("chats/*") as $file) {
		$fileCut = str_replace("chats/", "", $file); // Cuts file directory into just file name
		array_push($chats, $fileCut);
	}

	$getJson = file_get_contents("Tabs.json"); // Grabs json file contents to compare with array
	$decodeJson = json_decode($getJson, true);
	foreach($decodeJson as $tabs => $parentElem) { // Each string in $chats array is compared with each parent object name in json file, if it does not exist, it is deleted from json file
		if(!in_array($tabs, $chats)) {
			unset($decodeJson[$tabs]); // Unsets chat that does not exist within the 'chats/' directory
		}
	}
	$newJsonString = json_encode($decodeJson);
	file_put_contents("Tabs.json", $newJsonString); // Rencodes into json array, puts file contents back into Tabs.json
?>
<?php
	foreach(glob("chats/*") as $tabs) { // Itereates through each folder directory in 'chats/'
		$w = file_get_contents("GenericTab.php"); // Grabs new GenericTab Template
		$r = str_replace("chats/", "", $tabs); // Grabs Folder Directory
		file_put_contents($tabs. "/". $r. ".php", $w); // Replaces GenericTab.html Template for each Tab using $w
	}
	foreach(glob("chats/*") as $tabs) { // Itereates through each folder directory in 'chats/'
		$w = file_get_contents("GenericTabS.php"); // Grabs new GenericTab Template
		$r = str_replace("chats/", "", $tabs); // Grabs Folder Directory
		file_put_contents($tabs. "/". $r. ".php", $w); // Replaces GenericTab.html Template for each Tab using $w
	}
?>