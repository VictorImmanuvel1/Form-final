<?php 
  header('Location: table.php');
	$file = file_get_contents("messages.json");
  $data = json_decode($file, true);

// Get last id
$last_item    = end($data);
$last_item_id = $last_item['id'];
		$data[]= array(
            "id"=>++$last_item_id,
			      "fname" => $_POST['fname'],
            "lname" => $_POST['lname'],
			      "age" => $_POST['age'],
			      "gender" => $_POST['gender'],
            "ug" => $_POST['ug'],
            "pg" => $_POST['pg'],
            "college_ug"=> $_POST['college_ug'],
            "college_pg"=> $_POST['college_pg'],
            "states" =>$_POST['states'],
            "cities" =>$_POST['cities']
	    	);
		
		file_put_contents('messages.json',json_encode($data), LOCK_EX);
	
	
