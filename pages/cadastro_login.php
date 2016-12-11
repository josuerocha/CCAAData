<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Cadastro de login</title>
	
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
                    <h2 id="texto_altera_senha">Cadastro de login</h2>
                </div>
    	</header>

    
    <div class="container">
		<form action="../helper/LoginHelper.php?action=changePassword" method="POST">
			<h4 id="email">Email*:</h4><input id="inputEmail" type="email" name="senhaAnterior" required/>
			<h4 id="senha">Senha*:</h4><input id="inputSenha" type="password" name="senha" required/>
			<h4 id="confirmar">Confirmar senha*:</h4><input id="inputConfirmar" type="password" name="confirma_senha" required/>
			<input id="salvar" type="submit" name="Eviar" value="Salvar">
			<input id="cancelar" type="button" name="btnCancelar" value="Cancelar" />
		</form>
	</div>
	<div id="tabela">
			<input id="pesquisar" type="text" value="pesquisar" />
			<!--<table>
				<tr>
					<th id="gridCodigo">Nome</th>
					<th id="gridPerfil">Email</th>
					<th id="gridNome">Senha</th>
				</tr>
			</table>-->
			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2_login">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
					<a href="inicio.html">Home</a>
					<a href="sobre.html">Sobre</a>
					<a href="cursos.html">Cursos</a>
          			<a href="estude.html">Estude no CCAA</a>
          			<a href="unidades.html">Unidades</a>
					<a href="precos.html">Preços</a>
          			<a href="convenios.html">Convênios</a>
          			<a href="contato.html">Contato</a>
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
