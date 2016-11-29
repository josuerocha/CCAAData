<?php	
	require_once 'ACrudDAO.php';

    class ContaReceberDAO extends ACrudDAO{

        function Save($contaReceber){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($contaReceber->getCode()==0){				
					$query = "insert into tbl_ContaReceber (tbl_TipoConta_cod_TipoConta,valor_ContaReceber,dataVencimento_ContaReceber,dataPagamento_ContaReceber,situacao_ContaReceber) values ('{$contaReceber->getTipo()}',{$contaReceber->getValor()},'{$contaReceber->getDtVencimento()}',
					'{$contaReceber->getDtPagamento()}','{$contaReceber->getSituacao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$contaReceber->setCode($code);
				}else{	
					$query = "update tbl_ContaReceber set tbl_TipoConta_cod_TipoConta = '{$contaReceber->getTipo()}',valor_ContaReceber = '{$contaReceber->getValor()}',dataVencimento_ContaReceber = '{$contaReceber->getDtVencimento()}',dataPagamento_ContaReceber = '{$contaReceber->getDtPagamento()}',situacao_ContaReceber = '{$contaReceber->getSituacao()}' where cod_ContaReceber = {$contaReceber->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($contaReceber){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_ContaReceber where cod_ContaReceber = {$contaReceber->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$contasReceber = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_ContaReceber";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$contaReceber = new ContaReceber();
					$contaReceber->setCode($register['cod_ContaReceber']);
                    $contaReceber->setTipo($register['tbl_TipoConta_cod_TipoConta']);
					$contaReceber->setValor($register['valor_ContaReceber']);
					$contaReceber->setDtVencimento($register['dataVencimento_ContaReceber']);
					$contaReceber->setDtPagamento($register['dataPagamento_ContaReceber']);
					$contaReceber->setSituacao($register['situacao_ContaReceber']);
					array_push($contasReceber, $contaReceber);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $contasReceber;
		}

        function ListById($id){
			try{
				$this->Connect();	
				$query = "select * from tbl_ContaReceber where cod_ContaReceber = {$id}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$contaReceber = new ContaReceber();
				$register = mysqli_fetch_assoc($result);
				$contaReceber->setCode($register['cod_ContaReceber']);
				$contaReceber->setTipo($register['tbl_TipoConta_cod_TipoConta']);
				$contaReceber->setValor($register['valor_ContaReceber']);
				$contaReceber->setDtVencimento($register['dataVencimento_ContaReceber']);
				$contaReceber->setDtPagamento($register['dataPagamento_ContaReceber']);
				$contaReceber->setSituacao($register['situacao_ContaReceber']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $contaReceber;
            
        }
}
?>