<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-Cadastro - Idioma</title>
	<link rel="icon" href="assets/images/favicon.png">
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
					<li><a href="home_secretario.php">Home</a></li>
					<li class="active"><a href="cadastros.php">Cadastros</a></li>
					<li><a href="cadastro_pessoa.php">Cadastrar Pessoa</a></li>
					<li><a href="contas_pagar.php">Contas a Pagar</a></li>
					<li><a href="contas_receber.php">Contas a Receber</a></li>
          			<li><a href="alterar_senha.php">Alterar Senha</a></li>
					<li><a href="../util/logout.php">Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="text_cad_perf">Cadastros - Idiomas</h1>
                </div>
    </header>

    
    <div class="container" contenteditable>
				<div id="coluna_esquerda">
					<h4 id="text_idioma">Idioma: <span>*</span></h4><input id="input_idioma" type="text" name="descricao">	
					<input id="btn-salvar-idioma" type="submit" name="btnSalvar" value="Salvar">
					<input id="btn-cancelar-idioma" type="button" name="btnCancelar" value="Cancelar">
    			
				

				<!-- TABELA DO GRID AQUI!!! -->
				<table id="table_idioma" border="2">
					<tr>
						<th id="gridcod">Código</th>
						<th id="gridPerfil">Idioma</th>
						<th colspan="2" id="gridAcao">Ação</th>
					</tr>
					<tr>
						<td id="gridcod">1</td>
						<td id="gridPerfil">Espanhol</td>
						<td colspan="2" id="gridAcao"><input type="button" name="btnCancelar" value="Excluir"></td>
					</tr>
				</table>
			</div>

	</div>
			<div class="clear"></div>
			<!--CLEAR FLOATS-->
			</div>
		<div id="footer2_perfil" class="footer2_login">
			<div class="container">
				<div class="row">
					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="home_secretario.php">Home</a>| 
								<a href="cadastros.php">Cadastros</a>|
								<a href="cadastro_pessoa.php">Cadastrar Pessoa</a>|
								<a href="contas_pagar.php">Contas a pagar</a>|
                				<a href="contas_receber.php">Contas a receber</a>|
                				<a href="alterar_senha.php">Alterar Senha</a>|
                				<a href="../util/logout.php">Logout</a>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
