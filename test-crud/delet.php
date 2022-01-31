<?php
	//get the index
	$key = $_GET['index'];

	//fetch data from json
	$json = file_get_contents('gasbi.json');
	$json = json_decode($json ,true);

	//delete the row with the index
	unset($json[$key]);

	//encode back to json
	$json = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents('gasbi.json', $json);

	header('location: index.php');
?>