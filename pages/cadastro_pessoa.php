<?PHP
require_once("../util/checkSession.php");
include "../util/StandardHeader.php";
require_once (__DIR__."/../util/autoload.php");
spl_autoload_register("LoadClass");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CCAA-Cadastros - Pessoas</title>

	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="cad-titulo-pessoa">Cadastros - Pessoas</h1>
                </div>
    </header>

    
    <div class="container" >
	<form action="../helper/PessoaHelper.php?action=save" method="POST">
				<h4 id="texto-nome-pessoa">Nome Completo: &nbsp</h4><span id="nome-span-pessoa">*</span>  
					<input id="input-nome-pessoa" type="text" name="inputNome" required/>
				<h4 id="texto-sexo-pessoa">Sexo: &nbsp</h4><span id="sexo-span-pessoa">*</span>  
					<select id="sexo-selec-pessoa" class="" name="sexo">
							<option value="f">Feminino</option>
							<option value="m">Masculino</option>
					</select>
		
				<h4 id="texto-perfil-pessoa">Perfil:</h4><span id="perfil-span-pessoa">*</span> &nbsp 
					<select id="perfil-selec-pessoa" name="perfil">
					<?php
					$perfilControl = new PerfilController();
					$perfis = $perfilControl->ListAll();
					while($perfil=array_pop($perfis)){                                               
					echo "<option value=\"{$perfil->getCode()}\">{$perfil->getDescricao()}</option>";
				}
			?>
					</select>
					<input type="hidden" name="codeHidden" id="codeHidden">
					<input type="hidden" name="codeEndHidden" id="codeEndHidden">
				<h4 id="texto-cpf-pessoa">CPF:</h3><span id="cpf-span-pessoa">*</span> &nbsp 
					<input id="input-cpf-pessoa" type="text" name="cpf" id="cpf" placeholder="999.999.999-99" pattern="[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]-[0-9][0-9]" required/>
				<h4 id="texto-data-pessoa">Data de Nascimento:</h4><span id="nome-span-data">*</span>
					<input id="input-data-pessoa" type="date" name="dtNasc" required>
				<h4 id="texto-tel-pessoa">Telefone:</h4> &nbsp 
					<input id="input-tel-pessoa" type="text" name="inputTel" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$"/> &nbsp  
				<h4 id="texto-cel-pessoa">Celular:</h4><span id="cel-span-pessoa">*</span> &nbsp
				 	<input id="input-cel-pessoa" type="text" name="inputCel" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}$" required />
				<h4 id="texto-email-pessoa">Email: </h4><span id="email-span-pessoa">*</span> &nbsp 
					<input id="input-email-pessoa" type="email" name="email" placeholder="email@email.com" required />
				<h4 id="texto-cep-pessoa">CEP:</h4><span id="cep-span-pessoa">*</span> &nbsp 
					<input id="input-cep-pessoa" type="text" name="cep" required /> &nbsp  
				<h4 id="texto-logra-pessoa">Logradouro:</h4><span id="logra-span-pessoa">*</span> &nbsp 
					<input id="input-logra-pessoa" type="text" name="logradouro" required> &nbsp  
				<h4 id="texto-numero-pessoa">Número:</h4><span id="numero-span-pessoa">*</span> &nbsp 
					<input id="input-numero-pessoa" type="text" name="num" required> &nbsp  
				<h4 id="texto-comple-pessoa">Complemento:</h4>&nbsp 
					<input id="input-comple-pessoa" type="text" name="compl" />
				<h4 id="texto-bairro-pessoa">Bairro:</h4><span id="bairro-span-pessoa" >*</span> &nbsp 
					<input id="input-bairro-pessoa" type="text" name="bairro" required/> &nbsp  
				<h4 id="texto-cid-pessoa">Cidade:</h4><span id="cid-span-pessoa" >*</span> &nbsp 
					<input id="input-cid-pessoa" type="text" name="cidade"  required/>
				<h4 id="texto-uf-pessoa">UF:</h4><span id="uf-span-pessoa">*</span> &nbsp 
					<input id="input-uf-pessoa" type="text" name="uf"  required/>
				<input id="btn-salvar-pessoa" type="submit" name="salvar_temp" value="Salvar" />&nbsp 
				<input id="btn-cancelar-pessoa" type="button" name="cancelar_temp" value="Cancelar"  onclick="Novo();"/>	
			</form>
		</div>	
	<div class="container">&nbsp
				<table id="table_pessoas" border="2">
				<thead>
				<tr>
					<th id="gridcod">Código</th>
					<th id="gridnome">Perfil</th>
					<th id="gridnome">Nome</th>
					<th id="gridnome">Sexo</th>
					<th id="gridnome">CPF</th>
					<th id="gridnome">Telefone</th>
					<th id="gridnome">Celular</th>
					<th id="gridnome">Email</th>
					<th id="gridnome">Endereco</th>
					<th id="gridnome">Data Nascimento</th>
					<th id="gridnome" colspan='2'>Ação</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<th id="gridcod">Código</th>
					<th id="gridnome">Perfil</th>
					<th id="gridnome">Nome</th>
					<th id="gridnome">Sexo</th>
					<th id="gridnome">CPF</th>
					<th id="gridnome">Telefone</th>
					<th id="gridnome">Celular</th>
					<th id="gridnome">Email</th>
					<th id="gridnome">Endereco</th>
					<th id="gridnome">Data Nascimento</th>
					<th id="gridnome" colspan='2'>Ação</th>
				</tr>
				</tfoot>
				<tbody>
				<?PHP
				$controller = new PessoaController();
				$pessoas = $controller->ListAll();
				while($pessoa=array_pop($pessoas)){
				echo "
				<tr>
					<td align=center id='gridCodigo'>{$pessoa->getCode()}</td>
					<td align=center id='gridPerfil'>{$pessoa->getFKPerfil()}</td>
					<td align=center id='gridNome'>{$pessoa->getNome()}</td>
					<td align=center id='gridSexo'>{$pessoa->getSexo()}</td>
					<td align=center id='gridCPF'>{$pessoa->getCPF()}</td>
					<td align=center id='gridTelefone'>{$pessoa->getTelefone()}</td>
					<td align=center id='gridCelular'>{$pessoa->getCelular()}</td>
					<td align=center id='gridEmail'>{$pessoa->getEmail()}</td>
					<td align=center id='gridEndereco'>{$pessoa->endereco->getAll()}</td>
					<td align=center id='gridDtNascimento'>{$pessoa->getDataNascimento()}</td>
					<td align=center id='gridAcao'> 
						<form class=\"form_edit\" action=\"../helper/PessoaHelper.php?action=edit\" method=\"post\">
						<input type=\"hidden\" name=\"codeEdit\" value=\"{$pessoa->getCode()}\">
                   		<input id=\"btn-edit-sala\" type=\"submit\" value=\"Editar\">
                   		</form>
				   </td>
				   <td align=center>
				   		<form action=\"../helper/PessoaHelper.php?action=delete\" method=\"post\">
				   		<input type=\"hidden\" name=\"codeDelete\" value=\"{$pessoa->getCode()}\">
                   		<input id=\"btn-exc-sala\" type=\"submit\" value=\"Excluir\">
						</form>         	
					</td>
				</tr>
				";
				}
				?>
				</tbody>
				</table>
				
			</div>	

	<div>
			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div id="fo_pessoa" class="footer2_login">
			<div class="container">
				<div class="row">
					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="home_secretario.php">Home</a>| 
								<a href="cadastros.php">Cadastros</a>|
								<a href="cadastro_pessoa.php">Cadastrar Pessoa</a>|
								<a href="cadastro_contaspagar.php">Contas a pagar</a>|
                				<a href="cadastro_contasreceber.php">Contas a receber</a>|
                				<a href="alterar_senha.php">Alterar Senha</a>|
                				<a id="fo-logout" href="../util/logout.php">Logout</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. 
								Site by <a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="assets/js/specific/cadastro_pessoa.js"></script>
</body>
</html>
