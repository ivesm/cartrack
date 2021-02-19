<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once 'config/dbconection.php';  
	$db  = new dbconnection() ; 
	
	$con = $db->getConnection() ; 
    $cnt = false ; 

	$datereated = date('Y-m-d H:i:s') ;  
	// get posted data
	$data = json_decode(file_get_contents("php://input"));
	
	if(
		!empty($data->name) &&
		!empty($data->surname) 
	){
		
		   $sql =<<<EOF
      INSERT INTO person (name,surname,created)
      VALUES ('$data->name', '$data->surname','$datereated'  );

EOF;

	$ret = pg_query($con, $sql);
   if(!$ret) {
      // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create Person."));
   } else {
     // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Person was created."));
   }
		pg_close($con);
   

	
		
	}else {
		
		// set response code - 400 bad request
		http_response_code(400);
	  
		// tell the user
		echo json_encode(array("message" => "Unable to create Person. Data is incomplete."));
	}

?>