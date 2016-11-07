<?php	
	require_once 'ACrudDAO.php';

    class ContaPagarDAO extends ACrudDAO{

        function Save($contaPagar){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($contaPagar->getCode()==0){		
					$query = "insert into tbl_ContaPagar (tbl_TipoConta_cod_TipoConta,valor_ContaPagar,dataVencimento_ContaPagar,dataPagamento_ContaPagar,situacao_ContaPagar) values ('{$contaPagar->getTipo()}',{$contaPagar->getValor()},'{$contaPagar->getDtVencimento()}',
					'{$contaPagar->getDtPagamento()}','{$contaPagar->getSituacao()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$contaPagar->setCode($code);
				}else{	
					$query = "update tbl_ContaPagar set tbl_TipoConta_cod_TipoConta = '{$contaPagar->getTipo()}',valor_ContaPagar = '{$contaPagar->getValor()}',dataVencimento_ContaPagar = '{$contaPagar->getDtVencimento()}',dataPagamento_ContaPagar = '{$contaPagar->getDtPagamento()}',situacao_ContaPagar = '{$contaPagar->getSituacao()}' where cod_ContaPagar = {$contaPagar->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($contaPagar){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_ContaPagar where cod_ContaPagar = {$contaPagar->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$contasReceber = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_ContaPagar";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$contaPagar = new ContaPagar();
					$contaPagar->setCode($register['cod_ContaPagar']);
                    $contaPagar->setTipo($register['tbl_TipoConta_cod_TipoConta']);
					$contaPagar->setValor($register['valor_ContaPagar']);
					$contaPagar->setDtVencimento($register['dataVencimento_ContaPagar']);
					$contaPagar->setDtPagamento($register['dataPagamento_ContaPagar']);
					$contaPagar->setSituacao($register['situacao_ContaPagar']);
					array_push($contasReceber, $contaPagar);
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
				$query = "select * from tbl_ContaPagar where cod_ContaPagar = {$id}";
				$result = $this->connection->query($query);	
				$this->Disconnect();
				$register = mysqli_fetch_assoc($result);
				$contaPagar = new ContaPagar();
				$contaPagar->setCode($register['cod_ContaPagar']);
				$contaPagar->setTipo($register['tbl_TipoConta_cod_TipoConta']);
				$contaPagar->setValor($register['valor_ContaPagar']);
				$contaPagar->setDtVencimento($register['dataVencimento_ContaPagar']);
				$contaPagar->setDtPagamento($register['dataPagamento_ContaPagar']);
				$contaPagar->setSituacao($register['situacao_ContaPagar']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $contaPagar;
            
        }
}
?>