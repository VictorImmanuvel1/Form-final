<?php
	//get the index
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	$index = $_POST['index'];
	//fetch data from json
	$data = file_get_contents('messages.json');
	$data = json_decode($data,true);

  unset ($data[$index]);
        

	//encode back to json
  $data = array_values($data);
	$data = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents('messages.json', $data);
  echo json_encode([
                'success' => 1,
            ]);
  exit;
?>