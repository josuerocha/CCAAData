<?php	
	require_once 'ACrudDAO.php';

    class PagamentoDAO extends ACrudDAO{

        function Save($pagamento){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($pagamento->getCode()==0){				
					$query = "insert into tbl_Pagamento (numCartao_Pagamento,dtVencimento_Pagamento,nome_Pagamento,codSeguranca_Pagamento,tipoDocumento_Pagamento,documento_Pagamento,ddd_Pagamento,telefone_Pagamento,dtNascimento_Pagamento,nmMae_Pagamento) values ('{$pagamento->getNumeroCartao()}','{$pagamento->getDtVencimento()}','{$pagamento->getNome()}','{$pagamento->getCodSeguranca()}','{$pagamento->getTipoDocumento()}','{$pagamento->getDocumento()}','{$pagamento->getDDD()}','{$pagamento->getTelefone()}','{$pagamento->getDtNascimento()}','{$pagamento->getNomeMae()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$pagamento->setCode($code);
				}else{	
					//$query = "update tbl_Idioma set descricao_Idioma = '{$idioma->getDescricao()}' where cod_Idioma = {$idioma->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($pagamento){
            $situation = TRUE;
            try{
                $this->Connect();	
              //  $query = "delete from tbl_Idioma where cod_Idioma = {$idioma->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$pagamentos = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Pagamento";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$pagamento = new Idioma();
					$pagamento->setCode($register['cod_Idioma']);
                    $pagamento->setDescricao($register['descricao_Idioma']);
					array_push($idiomas, $idioma);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $pagamentos;
		}

        function ListById($id){
            
        }
}
?>