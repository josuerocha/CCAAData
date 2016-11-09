<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	        case 'save':
			$control = new PagamentoController();
			$pagamento = new Pagamento();
			
			$pagamento->setNumeroCartao($_POST["numCartao"]);
            $pagamento->setDtVencimento($_POST["dtValCartao"]);
            $pagamento->setNome($_POST["nome"]);
            $pagamento->setCodSeguranca($_POST["codSeg"]);
            $pagamento->setTipoDocumento($_POST["tipoDoc"]);
            $pagamento->setDocumento($_POST["documento"]);
            $pagamento->setDDD($_POST["ddd"]);
            $pagamento->setTelefone($_POST["telefone"]);
            $pagamento->setDtNascimento($_POST["dtNasc"]);
            $pagamento->setNomeMae($_POST["nmMae"]);

            if($control->Save($pagamento)){		
				echo "<script>alert('Pagamento efetuado com sucesso! Você receberá um e-mail de confirmação');</script>"; 
			}else{		
				echo "<script>alert('Erro ao efetuar o pagamento.');</script>"; 
			}			
			echo "<script>location.href='../Principal/pagamento.php';</script>"; 			
			
		break;	

		case 'delete':
			$control = new IdiomaController();	
            $idioma = new Sala();
            $idioma->setCode($_GET["code"]);
			if($control->Delete($idioma)){
				echo "<script>alert('Registro excluído com sucesso!');location.href='../cadastroIdioma.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir ');location.href='../cadastroIdioma.php';</script>"; 
			}						
		break;			
		default:
			echo "<script>alert('Acesso negado!'); location.href='../paginaInicial.html';</script>";
		break;
	}	
?>