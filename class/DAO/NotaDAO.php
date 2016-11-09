<?php	
	require_once 'ACrudDAO.php';

    class NotaDAO extends ACrudDAO{

        function Save($nota){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($nota->getCode()==0){				
					$query = "insert into tbl_Nota (cod_Aluno,mid_Nota,mid_Nota,oral_Nota,ano_Nota,semestre_Nota) values ({$nota->getCodeAluno()},{$nota->getMid()},{$nota->getFinal()},{$nota->getOral()},{$nota->getAno()},{$nota->getSemestre()})";
					$this->connection->query($query);					
					$code = $this->conexao->insert_id;
					$nota->setCode($code);
				}else{	
					$query = "update tbl_Nota set cod_Aluno = {$nota->getCodeAluno()},mid_Nota = {$nota->getMid()},final_Nota = {$nota->getFinal()},oral_Nota = {$nota->getOral()},ano_Nota = {$nota->getAno()},semestre_Nota = {$nota->getSemestre()} where cod_Nota = {$nota->getCode()}";
					$this->connection->query($query);
				}
				$this->Disconnect();
			}catch(Exception $ex){
				$situation = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $situation;
		}

        function Delete($nota){
            $situation = TRUE;
            try{
                $this->Connect();	
                $query = "delete from tbl_Nota where cod_Nota = {$nota->getCode()}";
                $this->connection->query($query);
                $this->Disconnect();
            }catch(Exception $ex){
                $situation = FALSE;
                echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }					
            return $situation;
        }

        function List(){
			$notas = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Nota";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$nota = new Nota();
					$nota->setCode($register['cod_Nota']);
                    $nota->setCodeAluno($register['descricao_Nota']);
					array_push($idiomas, $idioma);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $idiomas;
		}

        function ListById($id){
            
        }
}
?>
CREATE TABLE `ccaa`.`tbl_Nota` (
  `cod_Nota` INT NOT NULL,
  `cod_Aluno` INT NULL,
  `mid_Nota` FLOAT NULL,
  `final_Nota` FLOAT NULL,
  `oral_Nota` FLOAT NULL,
  `ano_Nota` INT NULL,
  `semestre_Nota` INT NULL,
  PRIMARY KEY (`cod_Nota`));