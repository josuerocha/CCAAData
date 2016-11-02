<?php
	class DataBase
	{
		private $connection;

		function __construct(){
			try{
				$this->connection = new mysqli("localhost", "root", "", "ccaa");
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}				
		}	
		
		function getConnection(){
			return $this->connection;
		}		
	}
?>