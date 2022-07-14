<?php
	updateTabs.php &
	$chats = array();
	foreach(glob("chats/*") as $file) {
		$fileCut = str_replace("chats/", "", $file);
		array_push($chats, $fileCut);
	}

	$getJson = file_get_contents("Tabs.json");
	$decodeJson = json_decode($getJson, true);
	foreach($decodeJson as $tabs => $parentElem) {
		if(!in_array($tabs, $chats)) {
			unset($decodeJson[$tabs]);
		}
	}
	$newJsonString = json_encode($decodeJson);
	file_put_contents("Tabs.json", $newJsonString);
?>