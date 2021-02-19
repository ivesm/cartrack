<?php 
include_once 'config/dbconection.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

	$db  = new dbconnection() ; 
	
	$con = $db->getConnection() ; 
    $cnt = false ; 


  $sql =<<<EOF
      SELECT * from person ;
EOF;

   $ret = pg_query($con, $sql);

	if(!$ret) {

		// set response code - 500 Not found
		http_response_code(500);
		// tell the user no Person found
		echo json_encode(
			array("message" => "An UnKnown Error as ocuured .")
		);
		exit ;
   }else{
  
    // person array
    $person_arr=array();
    $person_arr["records"]=array();
  
    
    while ($row = pg_fetch_assoc($ret) ){
			extract($row);  
			$product_item=array(
				"id" => $id,
				"name" => $name,
				"surname" => $surname ,
				"created" => $created
			);
	  
			array_push($person_arr["records"], $product_item);
			
		$cnt = true ;
    }
	
	if ($cnt){
		// set response code - 200 OK
		http_response_code(200);
		// show person data in json format
		echo json_encode($person_arr);
		
	}else {
		
		// set response code - 404 Not found
			http_response_code(404);
		  
			// tell the user no products found
			echo json_encode(
				array("message" => "No Persons found.")
			);
	} 
}



?>