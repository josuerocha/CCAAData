<?php	
	require_once 'ACrudDAO.php';

    class EnderecoDAO extends ACrudDAO{

        function Save($endereco){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($endereco->getCode()==0){				
					$query = "insert into tbl_Endereco (cod_Pessoa,cep_Endereco,logradouro_Endereco,numero_Endereco,complemento_Endereco,bairro_Endereco,cidade_Endereco,uf_Endereco) values ({$endereco->getCodePessoa()},'{$endereco->getCep()}','{$endereco->getLogradouro()}','{$endereco->getNumero()}','{$endereco->getComplemento()}','{$endereco->getBairro()}','{$endereco->getCidade()}','{$endereco->getUF()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$endereco->setCode($code);
				}else{	
					$query = "update tbl_Endereco set cod_Pessoa = {$endereco->getCodePessoa()}, cep_Endereco = '{$endereco->getCep()}',logradouro_Endereco = '{$endereco->getLogradouro()}',numero_Endereco = '{$endereco->getNumero()}', complemento_Endereco = '{$endereco->getComplemento()}',bairro_Endereco = '{$endereco->getBairro()}', cidade_Endereco = '{$endereco->getCidade()}',uf_Endereco = '{$endereco->getUF()}', where cod_Endereco = {$endereco->getCode()} ";
					echo $query;
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($endereco){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Endereco where cod_Endereco = {$endereco->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$enderecos = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Enderecos";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$endereco = new Sala();
					$endereco->setCode($register['cod_Endereco']);
					$endereco->setCodePessoa($register['cod_Pessoa']);
                    $endereco->setCep($register['cep_Endereco']);
                    $endereco->setLogradouro($register['logradouro_Endereco']);
                    $endereco->setLogradouro($register['logradouro_Endereco']);
                    $endereco->setNumero($register['numero_Endereco']);
                    

					array_push($enderecos, $endereco);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $enderecos;
		}

        function getByCode($code){			
			try{
				$this->Connect();	
				$query = "select * from tbl_Sala where cod_Sala = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				$register = mysqli_fetch_assoc($result);
				$sala = new Sala();
				$sala->setCode($register['cod_Sala']);
				$sala->setNumero($register['numero_Sala']);
                $sala->setDescricao($register['descricao_Sala']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $sala;
            
        }
}
?>