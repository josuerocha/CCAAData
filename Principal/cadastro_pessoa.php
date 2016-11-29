<!--
Author: Nick
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-Cadastros - Pessoas</title>
	<link rel="icon" href="assets/images/favicon.png" >
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">Sobre</a></li>
					<li><a href="courses.html">Cursos</a></li>
          			<li><a href="courses.html">Estude no CCAA</a></li>
          			<li><a href="courses.html">Unidades</a></li>
					<li><a href="price.html">Preços</a></li>
          			<li><a href="courses.html">Convênios</a></li>
          			<li><a href="courses.html">Contato</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1>Cadastros - Pessoas</h1>
                </div>
    </header>

    
    <div class="container">
	<form action="../helper/PessoaHelper.php?action=save" method="POST">
				<h3>Perfil: &nbsp <select name="SltPerfil">
					<?php
					require_once (__DIR__."/../util/autoload.php");
					spl_autoload_register("LoadClass");
					$perfilControl = new PerfilController();
					$perfis = $perfilControl->ListAll();
					while($perfil=array_pop($perfis)){                                                 
					echo "<option value='{$perfil->getCode()}'>{$perfil->getDescricao()}</option>";
				}
			?>
								</select>
				</h3>
		
				<h3>Nome Completo: &nbsp <input type="text" name="inputNome" size="20" pattern="[a-z\s]+$"></h3>

				<h3>Sexo: &nbsp <select name="sexo">
								<option value="f">Feminino</option>
								<option value="m">Masculino</option>
								</select>
				</h3>
					
				<h3>CPF*: &nbsp <input type="text" name="cpf" id="cpf" placeholder="999.999.999-99" pattern="[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]-[0-9][0-9]" required/></h3>

				<h3>Telefone*: &nbsp <input type="text" name="inputTel" size="15" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" required> &nbsp  
				Celular*: &nbsp <input type="text" name="inputCel" size="15" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}$" required><h3>

				<h3>Email*: &nbsp <input type="email" name="email" size="20" placeholder="email@email.com" required></h3>

				<h3>Logradouro: &nbsp <input type="text" name="logradouro" size="20"> &nbsp  
					Número: &nbsp <input type="number" name="num" size="4"> &nbsp  
					Complemento: &nbsp <input type="text" name="compl" size="4">
				</h3>

				<h3>Bairro: &nbsp <input type="text" name="bairro" size="10"> &nbsp  
					Cidade: &nbsp <input type="text" name="cidade" size="10" pattern="[a-z\s]+$">
				</h3>

				<h3>Data de Nascimento: <input type="date" name="dtNasc"></h3>

				<input type="submit" name="salvar_temp" value="Salvar">&nbsp 
				<input type="button" name="cancelar_temp" value="Cancelar">	
			</form>
		</div>

				
	
	
	<div class="container">&nbsp
				<br/>
				<div id="divBusca">
    				<input type="text" id="txtBusca" placeholder="Buscar..."/>
    				<input type="button" name="btnBusca" value="Buscar"/>
				</div>
				
				<br/>

				<table border="2">
				
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
				</tr>
				<?PHP
				$controller = new PessoaController();
				$pessoas = $controller->ListAll();
				while($pessoa=array_pop($pessoas)){
				echo "
				<tr>
					<td id='gridCodigo'>{$pessoa->getCode()}</td>
					<td id='gridPerfil'>{$pessoa->getFKPerfil()}</td>
					<td id='gridNome'>{$pessoa->getNome()}</td>
					<td id='gridSexo'>{$pessoa->getSexo()}</td>
					<td id='gridCPF'>{$pessoa->getCPF()}</td>
					<td id='gridTelefone'>{$pessoa->getTelefone()}</td>
					<td id='gridCelular'>{$pessoa->getCelular()}</td>
					<td id='gridEmail'>{$pessoa->getEmail()}</td>
					<td id='gridEndereco'>{$pessoa->getEndereco()}</td>
					<td id='gridDtNascimento'>{$pessoa->getDataNascimento()}</td>
					<td colspan='2' id='gridAcao'> <form id=\"meu_formulario\" action=\"helper/PessoaHelper.php?action=edit&code={$pessoa->getCode()}\" method=\"post\">
                   <input type=\"submit\" value=\"Editar\">
                   </form>
				   
				   <form action=\"../helper/PessoaHelper.php?action=delete&code={$pessoa->getCode()}\" method=\"post\">
                   <input type=\"submit\" value=\"Excluir\">
</form>      </th>
				</tr>
				";
				}
				?>
				</table>
				
			</div>	

	<div>
			<br/>
			<br/>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2_login">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.html">Home</a>| 
								<a href="about.html">Sobre</a>|
								<a href="courses.html">Cursos</a>|
                				<a href="videos.html">Estude no CCAA</a>|
                				<a href="videos.html">Unidades</a>|
                				<a href="price.html">Preços</a>|
                				<a href="price.html">Convênios</a>|
                				<a href="contact.html">Contato</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. 
								<br/>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
