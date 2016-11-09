<?php	
	require_once 'ACrudDAO.php';

    class TurmaDAO extends ACrudDAO{

        function Save($turma){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($turma->getCode()==0){				
					$query = "insert into tbl_Turma (tbl_Sala_numero_Sala,tbl_Idioma_cod_Idioma,descricao_Turma,horario_Turma) values ({$turma->getNumSala()},{$turma->getIdioma()},'{$turma->getDescricao()}','{$turma->getHorario()}')";
					$this->connection->query($query);					
					$code = $this->connection->insert_id;
					$sala->setCode($code);
				}else{	
					$query = "update tbl_Turma set tbl_Sala_numero_Sala = '{$sala->getNumeroSala()}',tbl_Idioma_cod_Idioma = '{$sala->getIdioma()}',descricao_Turma = '{$turma->getDescricao()}',horario_Turma = '{$turma->getHorario()}' where numero_Sala = {$sala->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($turma){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Sala where cod_Turma = {$turma->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$turmas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Turma";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$sala = new Sala();
					$sala->setCode($register['numero_Sala']);
                    $sala->setDescricao($register['descricao_Sala']);
					array_push($salas, $sala);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $salas;
		}

        function ListById($id){
            
        }
}
?>
CREATE TABLE tbl_Turma (
  cod_Turma INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbl_Sala_numero_Sala INTEGER UNSIGNED NOT NULL,
  tbl_Idioma_cod_Idioma INTEGER UNSIGNED NOT NULL,
  descricao_Turma VARCHAR(200) NOT NULL,
  horario_Turma TIME NOT NULL,
  PRIMARY KEY(cod_Turma),
  INDEX tbl_Turma_FKIndex1(tbl_Idioma_cod_Idioma),
  INDEX tbl_Turma_FKIndex2(tbl_Sala_numero_Sala)
);