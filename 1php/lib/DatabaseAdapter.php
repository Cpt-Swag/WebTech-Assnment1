<?php
/*
* Mysql database class
*/
class DatabaseAdapter {

	// var to hold connection to db server
	public $connection;
	
	// vars for configuaration
	public $host = "localhost";
	public $port = "3307"; // CHANGE THIS, CHECK USBWEBSERVER SETTINGS FOR MYSQL
	
	public $username = "root"; 
	public $password = "usbw";
	
	public $database = "frequencycounter";


	// Constructor with default value for $databasename parameter 
	public function __construct( $databasename=NULL ) {
		
		if ($databasename!=NULL) {
			$this->database = $databasename;
		}
		
		$this->connection = new mysqli(
			$this->host,
			$this->username,
			$this->password,
			$this->database
		);
		
		if ($this->connection->connect_error) {
		    echo "Sorry, this website is experiencing problems.<br/>";
		    echo "Failed to make a MySQL connection, here is why: <br/>";
		    echo "Error No.: " . $this->connection->connect_errno . "<br/>";
		    echo "Error: " . $this->connection->connect_error . "<br/>";
			
			exit;
		}
		
	}

		
	// Get mysqli connection
	public function getConnection() {
		return $this->connection;
	}
	
	
	public function doQuery( $sqlString ){
		$results = $this->connection->query($sqlString);
		
		if(!$results){
			//error
		    // Oh no! The query failed. 
		    echo "Sorry, the website is experiencing problems.<br/>";
		    // to get the error information
		    echo "Query failed to execute and here is why: <br/>";
		    echo "Query: " . $sqlString . "<br/>";
		    echo "Error No.: " . $this->connection->errno . "<br/>";
		    echo "Error: " . $this->connection->error . "<br/>";
			
		} else {
			return $results;
		}
		
		
	}














}
?>