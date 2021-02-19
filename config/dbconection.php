<?php 


class dbconnection {
	
	private $host        = "host = 127.0.0.1";
	private $port        = "port = 5432";
    private $dbname      = "dbname = cartrack";
    private $credentials = "user = postgres password=cartrack";
	
	public $conn ; 
	
	
	
	public function getConnection(){
  
		$this->conn = null;
        $this->conn = pg_connect( "$this->host $this->port $this->dbname $this->credentials"  );

		if(!$this->conn)
		{
			echo "Error : Unable to open database\n";
		}else {
			 // echo "Opened database successfully\n";
		}
  
        return $this->conn;
    }
	
}

?>
