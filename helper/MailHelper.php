<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){

		case 'notificationMail':
			$mailControl = new MailController();
			$observacaoControl = new ObservacaoController();
			$pessoaControl = new PessoaController();

			if(isset($_POST['codeMail'])){
				$observacao = $observacaoControl->getByCode($_POST['codeMail']);
				$aluno = $pessoaControl->getByCode($observacao->getCode());

				$subject = "CCAA - Notificação";

				$text = "	<p>Olá prezado <b>{$aluno->getNome()}</b>,</p>
						 	<p>segue abaixo notificação da escola <b>Centro Cultural Anglo Americano</b>:</p>
						 <p>'{$observacao->getDescricao()}'</p>
					 	<p>Caso ainda hajam dúvidas favor entrar em contato. </p>
						 <p>Agradecemos sua preferência.</p>
						 	<p>Av. Juscelino Kubitscheck, 4 - Funcionários, Timóteo - MG, 35180-410  <b>Telefone:</b> (31) 3848-3432<img src=\"../pages/assets/images/logo.png\" alt=\"CCAA\" style=\"width:50px;height:25px;\"></p>
						 ";

				if($mailControl->SendMail($aluno->getEmail(),$subject,$text)){
					$observacao->setEnviado(1);
					$observacaoControl->Save($observacao);
				}


				echo "<script>location.href='../pages/entrada_diario.php';</script>";
			}
			else{
				echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
			}

			
		break;	
		
		default:
			echo "<script>alert('Acesso negado!'); location.href='../pages/inicio.html';</script>";
		break;
	}	
?>