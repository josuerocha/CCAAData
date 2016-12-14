<?php	
	require_once 'ACrudDAO.php';

    class EstadoDAO extends ACrudDAO{

        function Save($estado){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($estado->getCode()==0){				
					$query = "insert into tbl_Estado (nome,sigla) values ({$estado->getNome()},'{$estado->getSigla()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$estado->setCode($code);
				}else{	
					$query = "update tbl_Estado set nome = {$estado->getNome()}, sigla = '{$estado->getSigla()}' where cod_Estado = {$estado->getCode()}";
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

        function Delete($estado){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Estado where cod_Estado = {$estado->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function ListAll(){
			$estados = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Estado";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$estado = new Estado();
					$estado->setCode($register['cod_Estado']);
					$estado->setNome($register['nome']);
                    $estado->setSigla($register['sigla']);

					array_push($estados, $estado);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $estados;
		}

	}
?>