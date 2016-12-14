<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
            $flag = "ok";
			$control = new NotaController();
            
            $ano = $_POST['ano'];
            $semestre = $_POST['semestre'];

            $vetorCodeNota = $_POST['codigoNota'];
            $vetorCodeAluno = $_POST['codigoAluno'];
            $vetorNotaMid = $_POST['notaMid'];
            $vetorNotaFinal = $_POST['notaFinal'];
            $vetorNotaOral = $_POST['notaOral'];

            while($codeAluno = array_pop($vetorCodeAluno)){
                $nota = new Nota();
                $codeNota = array_pop($vetorCodeNota);

                $nota->setCodeAluno($codeAluno);

                if($codeNota != ""){
                    $nota->setCode($codeNota);
                }
                else{
                    $nota->setCode(0);
                }
                $nota->setMid(array_pop($vetorNotaMid));
                $nota->setFinal(array_pop($vetorNotaFinal));
                $nota->setOral(array_pop($vetorNotaOral));
                $nota->setAno($ano);
                $nota->setSemestre($semestre);

                //echo $nota->getCodeAluno();
                if($control->Save($nota)){		
				    $flag = "ok"; 
			    }else{
                    $flag = "ops";
                    break;	 
			    }			
            }
			
            if($flag == "ok"){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
			echo "<script>location.href='../pages/entrada_diario.php';</script>"; 			
			
		break;	
		case 'edit':
			$control = new ContaPagarController();	
            $contaPagar = new ContaPagar();
            $contaPagar = $control->ListById($_POST["codeEdit"]);
			//var_dump ($contaPagar->toArray());
			$array = $contaPagar->toArray();
			echo  json_encode($array);

		break;

		case 'delete':
			$control = new ContaPagarController();	
            $contaPagar = new ContaPagar();
            $contaPagar->setCode($_GET["code"]);
			if($control->Delete($contaPagar)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}			
			echo "<script>location.href='../pages/cadastro_contaspagar.php';</script>"; 			
		break;			
		default:
			echo "<script>alert('Acesso negado!');</script>";
		break;
	}	
?>