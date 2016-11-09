<?php	
	require_once 'ACrudDAO.php';

    class HorarioDAO extends ACrudDAO{

        function Save($horario){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($horario->getCode()==0){				
					$query = "insert into tbl_Horario (horarioInicial_Horario,horarioFinal_Horario,data_Horario) values ('{$horario->getHorarioInicial()}','{$horario->getHorarioFinal()}','{$horario->getData()}')";
					$this->connection->query($query);					
					$code = $this->conexao->insert_id;
					$horario->setCode($code);
				}else{	
					$query = "update tbl_Horario set horarioInicial_Horario = '{$horario->getHorarioInicial()}',horarioFinal_Horario = '{$horario->getHorarioFinal()}',data_Horario = '{$horario->getData()}'  where cod_Horario = {$horario->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($horario){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Horario where cod_Horario = {$horario->getCode()}";
                $this->connection->query($query);
                $this->desconectar();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$horarios = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Horario";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$horario = new Perfil();
					$horario->setCode($register['cod_Horario']);
                    $horario->setHorarioInicial($register['HorarioInicial_Horario']);
                    $horario->setHorarioFinal($register['HorarioFinal_Horario']);
                    $horario->setData($register['data_Horario']);

					array_push($horarios, $horario);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $horarios;
		}

        function ListById($id){
            
        }
}
?>