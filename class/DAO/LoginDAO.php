<?php	
	require_once 'ACrudDAO.php';

    class LoginDAO extends ACrudDAO{

        function Save($login){	
			$situation = TRUE;
			try{
				$this->Connect();						
					$query = "insert into tbl_Login (email_Login, senha_Login,isConfirmed_Login,chaveConfirmacao_Login) values ('{$login->getEmail()}', '{$login->getSenha()}','{$login->getIsConfirmed()}','{$login->getChaveConfirmacao()}')";
					$this->connection->query($query);					

					$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

		function Update($login){	
			$situation = TRUE;
			try{
				$this->Connect();						
				$query = "update tbl_Login set senha_Login = '{$login->getSenha()}',isConfirmed_Login = '{$login->getIsConfirmed()}',chaveConfirmacao_Login = '{$login->getChaveConfirmacao()}' where email_Login = '{$login->getEmail()}'";
				$this->connection->query($query);					
				$this->Disconnect();

			}

			catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $situation;
		}

        function Delete($login){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Login where email_Login = '{$login->getEmail()}'";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function Validate($email, $password){
            try{
                $this->Connect();	
                $query = "select * from tbl_Login where email_Login = '{$email}' and senha_Login = '{$password}'";
                $result = $this->connection->query($query);
                $quantity = $this->connection->affected_rows;
                $this->Disconnect();
            }catch(Exception $ex){
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }			
            $situation = ($quantity > 0 ? TRUE : FALSE);

            return $situation;
        }

		function getPessoa($email){
			$pessoa = new Pessoa();

			try{
				$this->Connect();	
				$query = "select * from tbl_Pessoa where email_Pessoa = {$email}";
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

        function getByEmail($email){
			$login = new Login();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Login where email_Login = '{$email}'";
				$result = $this->connection->query($query);	
				$this->Disconnect();	
				
				$register = mysqli_fetch_assoc($result);				
                $login->setEmail($register['email_Login']);
                $login->setSenha($register['senha_Login']);
                $login->setIsConfirmed($register['isConfirmed_Login']);
                $login->setChaveConfirmacao($register['chaveConfirmacao_Login']);
								
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $login;
		}	


        function ListByID($codigo){
			$login = new Login();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Login where cod_Login = {$codigo}";
				$result = $this->connection->query($query);	
				$this->Disconnect();	
				
				$register = mysqli_fetch_assoc($result);				
                $login->setEmail($register['email_Login']);
                $login->setSenha($register['senha_Login']);
                $login->setIsConfirmed($register['isConfirmed_Login']);
                $login->setChaveConfirmacao($register['chaveConfirmacao_Login']);
								
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $login;
		}	

        function ListAll(){
			$logins = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Login";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$login = new Login();
					$login->setEmail($register['email_Login']);
                    $login->setSenha($register['senha_Login']);
					array_push($logins, $login);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $logins;
		}
}
?>