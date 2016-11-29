<?php	
	require_once 'ACrudDAO.php';

    class PresencaProfessorDAO extends ACrudDAO{

        function Save($presenca){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($presenca->getCode()==0){				
					$query = "insert into tbl_PresencaProfessor (tbl_Pessoa_cod_Pessoa,situacao_PresencaProfessor,data_PresencaProfessor) values ('{$presenca->getCodePessoa()}','{$presenca->getSituacao()}','{$presenca->getData()}')";
					$this->connection->query($query);					
					$code = $this->conexao->insert_id;
					$presenca->setCode($code);
				}else{	
					$query = "update tbl_PresencaProfessor set situacao_PresencaProfessor = '{$presenca->getSituacao()}' where cod_PresencaProfessor = {$presenca->getCode()}";
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
                $query = "delete from tbl_PresencaProfessor where cod_PresencaProfessor = {$presenca->getCode()}";
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
				$query = "select * from tbl_PresencaProfessor";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$presenca = new PresencaProfessor();
					$presenca->setCode($register['cod_PresencaProfessor']);
                    $presenca->setCodePessoa($register['tbl_Pessoa_cod_Pessoa']);
                    $presenca->setSituacao($register['situacao_PresencaProfessor']);
                    $presenca->setData($register['data_PresencaProfessor']);


					array_push($presencas, $presenca);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $presencas;
		}

        function ListById($id){
            
        }
}
?>