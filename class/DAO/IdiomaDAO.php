<?php	
	require_once 'ACrudDAO.php';

    class IdiomaDAO extends ACrudDAO{

        function Save($idioma){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($idioma->getCode()==0){				
					$query = "insert into tbl_Idioma (descricao_Idioma) values ('{$idioma->getDescricao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$idioma->setCode($code);
				}else{	
					$query = "update tbl_Idioma set descricao_Idioma = '{$idioma->getDescricao()}' where cod_Idioma = {$idioma->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($idioma){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Idioma where cod_Idioma = {$idioma->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$idiomas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Idioma";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$idioma = new Idioma();
					$idioma->setCode($register['cod_Idioma']);
                    $idioma->setDescricao($register['descricao_Idioma']);
					array_push($idiomas, $idioma);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $idiomas;
		}

		function getByCode($code){		
			try{
				$this->Connect();	
				$query = "select * from tbl_Idioma where cod_Idioma = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				

				$register = mysqli_fetch_assoc($result);

				$idioma = new Idioma();
				$idioma->setCode($register['cod_Idioma']);
                $idioma->setDescricao($register['descricao_Idioma']);	

				$result->close();	

			}

			catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $idioma;
		}
        
}
?>