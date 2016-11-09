<?php	
	require_once 'ACrudDAO.php';

    class PerfilDAO extends ACrudDAO{

        function Save($perfil){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($perfil->getCode()==0){				
					$query = "insert into tbl_Perfil (perfil_Perfil) values ('{$perfil->getDescricao()}')";
					$this->connection->query($query);					
					$code = $this->conexao->insert_id;
					$perfil->setCode($code);
				}else{	
					$query = "update tbl_Perfil set perfil_Perfil = '{$perfil->getDescricao()}' where cod_Perfil = {$perfil->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($perfil){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Perfil where cod_Perfil = {$perfil->getCode()}";
                $this->connection->query($query);
                $this->desconectar();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$perfis = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Perfil";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$perfil = new Perfil();
					$perfil->setCode($register['cod_Perfil']);
					//echo $perfil->getCode();
                    $perfil->setDescricao($register['perfil_Perfil']);
					//echo $perfil->getDescricao();
					array_push($perfis, $perfil);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $perfis;
		}

        function ListById($id){
            
        }

		function getByDescricao($descricao){
			$perfil = new Perfil();
			try{
				$this->Connect();	
				$query = "select * from tbl_Perfil where perfil_Perfil = '{$descricao}'";
				$result = $this->connection->query($query);	
				$this->Disconnect();	
				$register = mysqli_fetch_assoc($result);			
				$perfil = new Perfil();
				$perfil->setCode($register['cod_Perfil']);
				$perfil->setDescricao($register['perfil_Perfil']);
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $perfil;
		}
}
?>