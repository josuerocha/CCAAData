<?php
	class DataBase
	{
		private $connection;

		function __construct(){
			try{
				$this->connection = new mysqli("localhost", "root", "", "ccaa");
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}				
		}	
		
		function getConnection(){
			return $this->connection;
		}		
	}
?>