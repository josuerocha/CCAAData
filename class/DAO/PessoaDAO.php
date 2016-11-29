<?php	
	require_once 'ACrudDAO.php';

	class PessoaDAO extends ACrudDAO
	{			
		function Save($pessoa){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($pessoa->getCode()==0){				
					$query = "insert into  tbl_Pessoa (tbl_Perfil_cod_Perfil,tbl_Login_email_Login,nome_Pessoa,cpf_Pessoa,endereco_Pessoa,telefone_Pessoa,celular_Pessoa,email_Pessoa,dataNascimento_Pessoa,sexo_Pessoa,horaAula_Pessoa) values 
                    ('{$pessoa->getFKPerfil()}','{$pessoa->getFKLogin()}','{$pessoa->getNome()}', '{$pessoa->getCPF()}','{$pessoa->getEndereco()}','{$pessoa->getTelefone()}','{$pessoa->getCelular()}','{$pessoa->getEmail()}','{$pessoa->getDataNascimento()}','{$pessoa->getSexo()}','{$pessoa->getHoraAula()}')";
					
					//echo "NOME ".$pessoa->getNome();

					$this->connection->query($query);					
					$codigo = $this->connection->insert_id;
					$pessoa->setCode($codigo);
				}else{	
					$query = "update tbl_Pessoa set tbl_Perfil_cod_Perfil = '{$pessoa->getFKPerfil()}',tbl_Login_email_Login  = '{$pessoa->getFKLogin()}',nome_Pessoa = '{$pessoa->getNome()}',cpf_Pessoa = '{$pessoa->getCPF()}',endereco_Pessoa = '{$pessoa->getEndereco()}', telefone_Pessoa = '{$pessoa->getTelefone()}',celular_Pessoa = '{$pessoa->getCelular()}', email_Pessoa = '{$pessoa->getEmail()}', dataNascimento_Pessoa = '{$pessoa->getDataNascimento()}',sexo_Pessoa = '{$pessoa->getSexo()}',horaAula_Pessoa = '{$pessoa->getHoraAula()}' where cod_Pessoa = {$pessoa->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

		function Delete($pessoa){
			$situation = TRUE;
			try{
				$this->Connect();	
				$query = "delete from tbl_Pessoa where cod_Pessoa = {$pessoa->getCode()}";
				$this->connection->query($query);
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}					
			return $situation;
		}		

		function ListAll(){
			$pessoas = array();			
			try{
				
				$this->connect();	
				$query = "select * from tbl_Pessoa";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$pessoa = new Pessoa();
					$pessoa->setCode($register['cod_Pessoa']);
					$pessoa->setFKPerfil($register['tbl_Perfil_cod_Perfil']);
					$pessoa->setFKLogin($register['tbl_Login_email_Login']);
					$pessoa->setNome($register['nome_Pessoa']);
					$pessoa->setCPF($register['cpf_Pessoa']);
					$pessoa->setEndereco($register['endereco_Pessoa']);
					$pessoa->setTelefone($register['telefone_Pessoa']);
					$pessoa->setCelular($register['celular_Pessoa']);
					$pessoa->setEmail($register['email_Pessoa']);
					$pessoa->setDataNascimento($register['dataNascimento_Pessoa']);
					$pessoa->setSexo($register['sexo_Pessoa']);
					
					array_push($pessoas, $pessoa);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $pessoas;
		}			
		
		function ListById($code){
			
			$pessoa = new Pessoa();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Pessoa where cod_Pessoa = {$code}";
				$result = $this->connection->query($query);	
				$this->Disconnect();	
				
				$register = mysqli_fetch_assoc($result);	

				$pessoa->setCode($register['cod_Pessoa']);
				$pessoa->setFKPerfil($register['tbl_Perfil_cod_Perfil']);
				$pessoa->setFKLogin($register['tbl_Login_email_Login']);
				$pessoa->setNome($register['nome_Pessoa']);
				$pessoa->setCPF($register['cpf_Pessoa']);
				$pessoa->setEndereco($register['endereco_Pessoa']);
				$pessoa->setTelefone($register['telefone_Pessoa']);
				$pessoa->setCelular($register['celular_Pessoa']);
				$pessoa->setEmail($register['email_Pessoa']);
				$pessoa->setDataNascimento($register['dataNascimento_Pessoa']);
				$pessoa->setSexo($register['sexo_Pessoa']);
							
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $pessoa;
		}

		function ListByPerfil($fkPerfil){
			$pessoas = array();	
			try{
				$this->Connect();	
				$query = "select * from tbl_Pessoa where tbl_Perfil_cod_Perfil = {$fkPerfil}";
				//echo $fkPerfil;
				//echo $query;
				$result = $this->connection->query($query);	
				
				$this->Disconnect();	
				
				$register = mysqli_fetch_assoc($result);	
				
				echo $result;
				
				while($register = mysqli_fetch_assoc($result)) {
					$pessoa = new Pessoa();
					$pessoa->setCode($register['cod_Pessoa']);
					$pessoa->setFKPerfil($register['tbl_Perfil_cod_Perfil']);
					$pessoa->setFKLogin($register['tbl_Login_email_Login']);
					$pessoa->setNome($register['nome_Pessoa']);
					$pessoa->setCPF($register['cpf_Pessoa']);
					$pessoa->setEndereco($register['endereco_Pessoa']);
					$pessoa->setTelefone($register['telefone_Pessoa']);
					$pessoa->setCelular($register['celular_Pessoa']);
					$pessoa->setEmail($register['email_Pessoa']);
					$pessoa->setDataNascimento($register['dataNascimento_Pessoa']);
					$pessoa->setSexo($register['sexo_Pessoa']);
					array_push($pessoas,$pessoa);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $pessoas;

		}

	}	
?> 