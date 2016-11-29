<?php	
	require_once 'ACrudDAO.php';

    class ObservacaoDAO extends ACrudDAO{

        function Save($observacao){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($observacao->getCode()==0){				
					$query = "insert into tbl_Observacao (cod_Aluno,descricao_Observacao) values ({$observacao->getCodeAluno()},'{$observacao->getDescricao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$observacao->setCode($code);
				}else{	
					$query = "update tbl_Observacao set cod_Aluno = {$observacao->getCodeAluno()}, descricao_Observacao = '{$observacao->getDescricao()}' where cod_Observacao = {$observacao->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($observacao){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Observacao where cod_Observacao = {$observacao->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$observacoes = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Observacao";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$observacao = new Observacao();
					$observacao->setCode($register['cod_Observacao']);
                    $observacao->setCodeAluno($register['cod_Aluno']);
                    $observacao->setDescricao($register['descricao_Observacao']);
					array_push($observacoes, $observacao);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $observacoes;
		}

        function ListById($id){
            
        }
}
?>