<?PHP

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Redefinição de senha</title>
	
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
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
					<li class="active"><a href="inicio.html">Home</a></li>
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="cursos.html">Cursos</a></li>
          <li><a href="estude.html">Estude no CCAA</a></li>
          <li><a href="unidades.html">Unidades</a></li>
					<li><a href="precos.html">Preços</a></li>
          <li><a href="convenios.html">Convênios</a></li>
          <li><a href="contato.html">Contato</a></li>
					<li><a href="login.php">Login</a></li>
          </ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary_login">
        <div class="container">
                <h2 id="texto_altera_senha">Redefiniçaõ de senha</h2>
            </div>
	</header>

    
    <div class="container">
		<form action="../helper/LoginHelper.php?action=redefine" method="POST">
			<input type="hidden" name="codeHidden" id="codeHidden" value="<?PHP echo $_GET['code']; ?>">
			<h4 id="nova_senha">Nova senha *: </h4><input id="input_nova_senha" type="password" name="senha" required/>
			<h4 id="confirmar_senha">Confirmar senha *: </h4><input id="input_confirma_senha" type="password" name="confirma_senha" required/>
			<input id="btn_alterar_senha" type="submit" name="Eviar" value="Enviar">
		</form>
	</div>
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
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
