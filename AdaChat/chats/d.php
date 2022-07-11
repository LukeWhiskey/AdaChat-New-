<?php
	$jsonFile = basename(__file__);
	$jsonFile = str_replace(".php", ".json", $jsonFile);
	$jsonString = file_get_contents($jsonFile);
	$data = json_decode($jsonString, true);

	$datain = $_POST['msg'];
	$package1 = array(
		'msg' => $datain
	);
	$package2 = array(
		count($data)+1 => $package1
	);
	$newPackage = $data + $package2;

	$newJsonString = json_encode($newPackage);
	file_put_contents($jsonFile, $newJsonString);
?>