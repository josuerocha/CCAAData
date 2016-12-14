<?php	
	require_once 'ACrudDAO.php';

    class PresencaDAO extends ACrudDAO{

        function Save($presenca){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($presenca->getCode()==0){				
					$query = "insert into tbl_Presenca (cod_Pessoa,situacao,data) values ('{$presenca->getCodePessoa()}','{$presenca->getSituacao()}','{$presenca->getData()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$presenca->setCode($code);
				}else{	
					$query = "update tbl_Presenca set situacao = '{$presenca->getSituacao()}',set data = '{$presenca->getData()}' where cod_Presenca = {$presenca->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($presenca){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Presenca where cod_Presenca = {$presenca->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$presencas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Presenca";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$presenca = new Presenca();
					$presenca->setCode($register['cod_Presenca']);
                    $presenca->setCodePessoa($register['cod_Pessoa']);
                    $presenca->setSituacao($register['situacao']);
                    $presenca->setData($register['data']);


					array_push($presencas, $presenca);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $presencas;
		}

        function ListByPessoa($code){
        		$presencas = array();
    			try{
				$this->Connect();	
				$query = "select * from tbl_Presenca where cod_Pessoa = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				
				while($register = mysqli_fetch_assoc($result)){
					$presenca = new Presenca();
					$presenca->setCode($register['cod_Presenca']);
                    $presenca->setCodePessoa($register['cod_Pessoa']);
                    $presenca->setSituacao($register['situacao']);
                    $presenca->setData($register['data']);
                    array_push($presencas,$presenca);
                }
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $presencas;
        }
}
?>