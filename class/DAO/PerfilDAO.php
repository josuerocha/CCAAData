<?php	
	require_once 'ACrudDAO.php';

    class PerfilDAO extends ACrudDAO{

        function Save($perfil){	
			$situation = TRUE;
			try{
				$this->Connect();		
				if($perfil->getCode()==0){				
					$query = "insert into tbl_Perfil (perfil_Perfil,registration_Permission,complex_Registration_Permission,report_Permission,complex_Report_Permission,student_Permission,teacher_Permission) values ({$perfil->getDescricao()},{$perfil->getRegistration()},{$perfil->getComplexRegistration()},{$perfil->getReport()},{$perfil->getComplexReport()},{$perfil->getStudy()},{$perfil->getTeach()})";
					$this->connection->query($query);					
					$code = $this->conexao->insert_id;
					$perfil->setCode($code);
				}else{	
					$query = "update tbl_Perfil set perfil_Perfil = '{$perfil->getDescricao()}',registration_Permission = {$perfil->getRegistration()}, complex_Registration_Permission = {$perfil->getComplexRegistration()}, report_Permission = {$perfil->getReport()}, complex_Report_Permission = {$perfil->getComplexReport()}, student_Permission = {$perfil->getStudy()}, teacher_Permission = {$perfil->getTeach()} where cod_Perfil = {$perfil->getCode()}";
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

        function ListAll(){
			$perfis = array();			
			try{
				$this->Connect();	
				$query = "select * from tbl_Perfil";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				while($register = mysqli_fetch_assoc($result)) {
					$perfil = new Perfil();
					$perfil->setCode($register['cod_Perfil']);
                    $perfil->setDescricao($register['perfil_Perfil']);
                    $perfil->setRegistration($register['registration_Permission']);
                    $perfil->setComplexRegistration($register['complex_Registration_Permission']);
                    $perfil->setReport($register['report_Permission']);
                    $perfil->setComplexReport($register['complex_Report_Permission']);
                    $perfil->setStudy($register['student_Permission']);
                    $perfil->setTeach($register['teacher_Permission']);
					array_push($perfis, $perfil);
				}		
				$result->close();				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $perfis;
		}

        function GetByCode($code){
		
			try{

				$this->Connect();	
				$query = "select * from tbl_Perfil";
				$result = $this->connection->query($query);	
				$this->Disconnect();				
				
				$register = mysqli_fetch_assoc($result);
				
				$perfil = new Perfil();
				$perfil->setCode($register['cod_Perfil']);
                $perfil->setDescricao($register['perfil_Perfil']);
             	$perfil->setRegistration($register['registration_Permission']);
                $perfil->setComplexRegistration($register['complex_Registration_Permission']);
                $perfil->setReport($register['report_Permission']);
                $perfil->setComplexReport($register['complex_Report_Permission']);
                $perfil->setStudy($register['student_Permission']);
                $perfil->setTeach($register['teacher_Permission']);
						
				$result->close();	

			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			
			return $perfil;
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
			 	$perfil->setRegistration($register['registration_Permission']);
                $perfil->setComplexRegistration($register['complex_Registration_Permission']);
                $perfil->setReport($register['report_Permission']);
                $perfil->setComplexReport($register['complex_Report_Permission']);
                $perfil->setStudy($register['student_Permission']);
                $perfil->setTeach($register['teacher_Permission']);
				$result->close();

			}

			catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}		

			return $perfil;
		}
}
?>