<?php

require_once (__DIR__."/../../util/autoload.php");
spl_autoload_register("LoadClass");

	abstract class ACrudDAO
	{
		protected $connection;
		
		protected function Connect(){
			$base = new DataBase();
			$this->connection = $base->getConnection();
		} 
		
		protected function Disconnect(){
			$this->connection->close();
		} 		

		abstract function Save($objeto);
		abstract function Delete($objeto);
		abstract function ListAll();
	}
	
?> 