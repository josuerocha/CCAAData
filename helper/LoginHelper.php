<?php
session_start();
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){
	case 'changePassword':
	$control = new LoginController();
	$login = $control->getByEmail($_SESSION["email"]);
	echo $login->getEmail();
	
	if($login->getSenha() == MD5($_POST["senhaAnterior"])){
		$novaSenha = MD5($_POST["senha"]);
        $login->setSenha($novaSenha);
		
		if($control->Update($login)){		
		
			echo "<script>alert('Registro salvo com sucesso!;');</script>"; 
		}else{		
		echo "<script>alert('Erro ao salvar o registro.');</script>"; 
		}			
	}
	
	else{
		echo "<script>alert('Senha anterior informada inválida.');</script>"; 
	}
		echo "<script>	document.location.href = '../pages/alterar_senha.php';</script>";
	break;

	case 'validate':
		$control = new LoginController();
		$login = $control->getByEmail($_POST['email']);
		$validation = '';

		if($control->Validate($_POST["email"],MD5($_POST["senha"])) && $login->getIsConfirmed()){

    			$validation = "<script>	document.location.href = '../pages/home.php';
    					   	</script>";
				if(!isset($_SESSION)){ 
					session_start();
					$_SESSION["email"] = $_POST["email"];
					
					} 
				else{
					session_destroy();
					session_start();
					$_SESSION["email"] = $_POST["email"];
				}
		}
		else{
				$validation = "<script>alert('Favor confirmar seus dados utilizando o e-mail em sua caixa de entrada!');</script>";
		}

		echo ($validation);

	break;
    
    case 'save':
		$control = new LoginController();
		$login = new Login();
	
		if(isset($_POST["email"])){
        	$login->setEmail($_POST["email"]);

        	echo $login->getEmail();

        	$login->setSenha(MD5($_POST["senha"]));

			if($control->Save($login)){		
			echo "<script>alert('Registro salvo com sucesso!');</script>"; 
			}
			
			else{		
			echo "<script>alert('Erro ao salvar o registro.');</script>"; 
			}			
    	}

		echo "<script>location.href='../cadastroLogin.php';</script>";
	break;	

	case 'confirmEmail':
		$control = new LoginController();

		$login = $control->getByEmail($_POST['codeHidden']);
		$login->setIsConfirmed(1);
		$login->setSenha(MD5($_POST['senha']));

		if ($control->Update($login)){
			echo "<script>alert('Email confirmado.');</script>";
			 
		}
		else{
			echo "<script>alert('Email não confirmado.');</script>";
		}

		echo "<script>location.href='../pages/login.php';</script>";
	break;

	case 'delete':
		$control = new LoginController();
		$login = new Login();
		$login->setEmail($_GET["emailDl"]);
		$control->Delete($login);

		if($control->Delete($login)){
			echo "<script>alert('Registro excluído com sucesso!');</script>"; 
		}else{
			echo "<script>alert('Erro ao excluir ');</script>"; 
		}
		echo "<script>location.href='../cadastroLogin.php';</script>";						
	break;			
default:
	echo "<script>alert('Acesso negado!'); location.href='../inicio.html';</script>";
break;
	}	
?>