<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CCAA-Cadastro - Perfis</title>

	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

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
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="text_cad_perf">Cadastros - Perfis</h1>
                </div>
    </header>

    
    <div class="container" contenteditable>
				<div id="coluna_esquerda">
					<h4 id="text_perfil">Perfil: <span>*</span></h4><input id="input_perfil" type="text" name="perfil">	
					<input id="btn-salvar-perfil" type="submit" name="Salvar" value="Salvar">
					<input id="btn-cancelar-perfil" type="button" name="Cancelar" value="Cancelar">
				<!-- TABELA DO GRID AQUI!!! -->
				<table id="table_perfil" border="2">
					<tr>
						<th id="gridcod">Código</th>
						<th id="gridPerfil">Perfil</th>
						<th colspan="2" id="gridAcao">Ação</th>
					</tr>
				</table>
			</div>

	</div>
			<div class="clear"></div>
			<!--CLEAR FLOATS-->
			</div>
		<div id="fo_perfil" class="footer2_login">
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
	<script src="assets/js/custom.js"></script>
</body>
</html>
