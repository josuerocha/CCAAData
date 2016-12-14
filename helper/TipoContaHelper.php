<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
        case 'save':
			$control = new TipoContaController();
			$tipoConta = new TipoConta();
			
			if(isset($_POST['codeHidden'])){
				$tipoConta->setCode($_POST['codeHidden']);
			}

			$tipoConta->setTipo($_POST["contatipo"]);

            if($control->Save($tipoConta)){		
				echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}else{		
				echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}
			echo "<script>location.href='../pages/cadastro_tipoconta.php';</script>"; 

		break;

		case 'edit':
			$control = new TipoContaController();	
            $tipoConta = $control->getByCode($_POST['codeEdit']);
            
			$array = $tipoConta->toArray();

			echo  json_encode($array);

		break;	

		case 'delete':
			$control = new TipoContaController();	
            $tipoConta = new Sala();
            $tipoConta->setCode($_POST["codeDelete"]);
			if($control->Delete($tipoConta)){
				echo "<script>alert('Registro excluído com sucesso!');</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');</script>"; 
			}
			//echo "<script>location.href='../pages/cadastro_tipoconta.php';</script>"; 						
		break;			

		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
		break;
	}
	
?>