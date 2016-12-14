<?php	
	require_once 'ACrudDAO.php';

    class ObservacaoDAO extends ACrudDAO{

        function Save($observacao){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($observacao->getCode()==0){				
					$query = "INSERT INTO tbl_Observacao (cod_Aluno,enviado_Observacao,descricao_Observacao) VALUES ({$observacao->getCodeAluno()},
					{$observacao->getEnviado()},'{$observacao->getDescricao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$observacao->setCode($code);
				}else{	
					$query = "UPDATE tbl_Observacao SET cod_Aluno = {$observacao->getCodeAluno()}, descricao_Observacao = '{$observacao->getDescricao()}' 
					,enviado_Observacao = {$observacao->getEnviado()} WHERE cod_Observacao = {$observacao->getCode()}";
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
					$observacao->setEnviado($register['enviado_Observacao']);
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

        function getByCode($code){			
			try{
				$this->Connect();	
				$query = "select * from tbl_Observacao where cod_Observacao = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);

				$observacao = new Observacao();
				$observacao->setCode($register['cod_Observacao']);
				$observacao->setEnviado($register['enviado_Observacao']);
	            $observacao->setCodeAluno($register['cod_Aluno']);
	            $observacao->setDescricao($register['descricao_Observacao']);
					
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $observacao;
        }
}
?>