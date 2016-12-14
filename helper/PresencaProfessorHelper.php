<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new PresencaProfessorController();
			$presenca = new PresencaProfessor();
			
            if(isset($_POST["code"])){
			$presenca->setCode($_POST["code"]);
            }
            $presenca->setCodePessoa($_POST["sltProf"]);
            if ($_POST["situacao"]=="on"){
                $presenca->setSituacao(1);
            }
            $presenca->setData($_POST["data"]);
            
            if($control->Save($presenca)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/controle_presenca_professor.php';</script>"; 			
			
		break;	

		case 'list':

		?>
			<table id="tabela" class="display nowrap" cellspacing="0" width="100%">
			<h3><select name="professor" id="professor">

			<?PHP
			$pessoaControl = new PessoaController();
			$perfilControl = new PerfilController();

			$perfil = $perfilControl->getByDescricao("Professor");
			$professores = $pessoaControl->ListByPerfil($perfil->getCode());
			$codeProfessor = 0;
				
			 	while ($professor = array_pop($professores)) { 
			 		$codeProfessor = $professor->getCode();
			        $perfil = $pessoaControl->getByCode($professor->getCode());
			        echo "<option value=\"{$professor->getCode()}\" > {$professor->getNome()} </option>";
			    }

			?>
			</select>
			</h3>
			<thead>
					<tr> 
			            <th> Data</th>
			            <th> Presença</th>
						
			        </tr>
			</thead>
			<tfoot>
				<tr> 
			        <th> Data</th>
			        <th> Presença</th>	
			    </tr>
			</tfoot>
			    <tbody>    	
			    	<?PHP
			    		$presencaProfessorControl = new PresencaProfessorController();
			    		$presencas = $presencaProfessorControl->ListByProfessor($_POST['code']);
			    		while ($presenca = array_pop($presencas)) { 
			    			echo "<tr>
			    					  <td align=\"center\">{$presenca->getData()}</td>";
			    					  if($presenca->getSituacao()){
			    					  	echo "<td align=\"center\"><img src=\"assets/images/checkmark.png\" alt=\"Presente\" ></td>";

			    					  }
			    					  else{
			    					  	echo "<td align=\"center\"><img src=\"assets/images/xmark.png\" alt=\"Presente\" ></td>";

			    					  }
			    			echo "</tr>";
			    		}
					?>
					
			    </tbody>
			</table>
		<?PHP

		break;

		case 'delete':
			$control = new PresencaProfessorController();	
            $presenca = new PresencaProfessor();
            $presenca->setCode($_POST["deleteCode"]);
			if($control->Delete($presenca)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');;</script>"; 
			}
            echo "<script>location.href='../pages/controle_presenca_professor.php';</script>"; 				
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html;</script>";
		break;
	}	
?>