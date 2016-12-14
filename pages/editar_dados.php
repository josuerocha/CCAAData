<?PHP

require_once("../util/checkSession.php");
include "../util/StandardHeader.php";
require_once (__DIR__."/../util/autoload.php");
spl_autoload_register("LoadClass");

$pessoaControl = new PessoaController();
$pessoa = $pessoaControl->getByEmail($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de pessoas</title>

	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/editar_dados.css">

</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="cad-titulo-pessoa">Cadastro de pessoas</h1>
                </div>
    </header>

    
    <div class="container" >
	<form action="../helper/EditarDadosHelper.php?action=save" method="POST" enctype="multipart/form-data">
				<h4 id="texto-foto-pessoa">Foto: &nbsp</h4><span id="foto-span-pessoa">*</span>
					<input type="file" name="image" id="image">

				<h4 id="texto-nome-pessoa">Nome Completo: &nbsp</h4><span id="nome-span-pessoa">*</span>  
					<input id="input-nome-pessoa" type="text" name="inputNome" value="<?PHP echo $pessoa->getNome();?>" required/>

				<h4 id="texto-sexo-pessoa">Sexo: &nbsp</h4><span id="sexo-span-pessoa">*</span>  
					<select id="sexo-selec-pessoa" class="" name="sexo" value="<?PHP echo $pessoa->getSexo();?>">
						<?PHP if($pessoa->getSexo() == "m"){ ?>
							<option value="f">Feminino</option>
							<option value="m" selected>Masculino</option>

						<?PHP }
							 else {?>
							 <option value="f" selected>Feminino</option>
							<option value="m">Masculino</option>
							<?PHP }
							?>

					</select>
		
				<h4 id="texto-perfil-pessoa">Perfil:</h4><span id="perfil-span-pessoa">*</span> &nbsp 
					<select id="perfil-selec-pessoa" name="perfil">
					<?php
					$perfilControl = new PerfilController();
					$perfis = $perfilControl->ListAll();
					while($perfil = array_pop($perfis)){
						if($pessoa->getFKPerfil() == $perfil->getCode()){
							echo "<option value=\"{$perfil->getCode()}\" selected>{$perfil->getDescricao()}</option>";
						}
						else{
							echo "<option value=\"{$perfil->getCode()}\">{$perfil->getDescricao()}</option>";	
						}
					
				}
			?>
					</select>
					<input type="hidden" name="codeHidden" id="codeHidden" value="<?PHP echo $pessoa->getCode();?>" >
					<input type="hidden" name="codeEndHidden" id="codeEndHidden" value="<?PHP echo $pessoa->endereco->getCode();?>" >
				<h4 id="texto-cpf-pessoa">CPF:</h4><span id="cpf-span-pessoa">*</span> &nbsp 
					<input id="input-cpf-pessoa" type="text" name="cpf" id="cpf" placeholder="999.999.999-99" value="<?PHP echo $pessoa->getCPF();?>" pattern="[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]-[0-9][0-9]" required/>

				<h4 id="texto-data-pessoa">Data de Nascimento:</h4><span id="nome-span-data">*</span>
					<input id="input-data-pessoa" type="date" name="dtNasc" value="<?PHP echo $pessoa->getDataNascimento();?>" required>

				<h4 id="texto-tel-pessoa">Telefone:</h4> &nbsp 
					<input id="input-tel-pessoa" type="text" name="inputTel" placeholder="(99)99999-9999" value="<?PHP echo $pessoa->getTelefone();?>" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$"/> &nbsp  

				<h4 id="texto-cel-pessoa">Celular:</h4><span id="cel-span-pessoa">*</span> &nbsp
				 	<input id="input-cel-pessoa" type="text" name="inputCel" placeholder="(99)99999-9999" value="<?PHP echo $pessoa->getCelular();?>" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}$" required />

				<h4 id="texto-email-pessoa">Email: </h4><span id="email-span-pessoa">*</span> &nbsp 
					<input id="input-email-pessoa" type="email" name="email" value="<?PHP echo $pessoa->getEmail();?>" placeholder="email@email.com" readonly="readonly" />

				<h4 id="texto-cep-pessoa">CEP:</h4><span id="cep-span-pessoa">*</span> &nbsp 
					<input id="input-cep-pessoa" type="text" name="cep" required value="<?PHP echo $pessoa->endereco->getCEP();?>"/> &nbsp 

				<h4 id="texto-logra-pessoa">Logradouro:</h4><span id="logra-span-pessoa">*</span> &nbsp 
					<input id="input-logra-pessoa" type="text" name="logradouro" value="<?PHP echo $pessoa->endereco->getLogradouro();?>" required> &nbsp  

				<h4 id="texto-numero-pessoa">Número:</h4><span id="numero-span-pessoa">*</span> &nbsp 
					<input id="input-numero-pessoa" type="text" name="num" value="<?PHP echo $pessoa->endereco->getNumero();?>" required> &nbsp  

				<h4 id="texto-comple-pessoa">Complemento:</h4>&nbsp 
					<input id="input-comple-pessoa" type="text" name="compl" value="<?PHP echo $pessoa->endereco->getComplemento();?>" />

				<h4 id="texto-bairro-pessoa">Bairro:</h4><span id="bairro-span-pessoa" >*</span> &nbsp 
					<input id="input-bairro-pessoa" type="text" name="bairro" value="<?PHP echo $pessoa->endereco->getBairro();?>" required/> &nbsp  

				<h4 id="texto-cid-pessoa">Cidade:</h4><span id="cid-span-pessoa" >*</span> &nbsp 
					<input id="input-cid-pessoa" type="text" name="cidade" value="<?PHP echo $pessoa->endereco->getCidade();?>" required/>

				<h4 id="texto-uf-pessoa">UF:</h4><span id="uf-span-pessoa">*</span> &nbsp 
					<select id="input-uf-pessoa" name="uf">
						<option value="">---</option>
						<?PHP
							$estadoControl = new EstadoController();

							$estados = $estadoControl->ListAll();

							while($estado = array_pop($estados)){
								if($pessoa->endereco->getUF() == $estado->getSigla()){
									echo "<option selected value=\"{$estado->getSigla()}\"> {$estado->getSigla()} </option>";
								}
								else{
									echo "<option value=\"{$estado->getSigla()}\"> {$estado->getSigla()} </option>";
								}
							}
						?>
						</select>
				<input id="btn-salvar-pessoa" type="submit" name="salvar_temp" value="Salvar" />&nbsp 
				<input id="btn-cancelar-pessoa" type="button" name="cancelar_temp" value="Cancelar"  onclick="Novo();"/>	
			</form>
		</div>	


	<!--FOOTER GENÉRICA -->
	<?PHP include "../util/GenericFooter.php" ?>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/mask/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/specific/cadastro_pessoa.js"></script>
</body>
</html>
