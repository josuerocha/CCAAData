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
	<link rel="icon" href="assets/images/favicon.png" >
	<title>CCAA - Recuperar Senha</title>
	<link rel="favicon" href="assets/images/favicon.png">
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

		<!--NAVBAR GENÈRICA !! -->
		<?PHP include "../util/GenericNavBar.php"; ?>

		<header id="head" class="secondary_login">
            <div class="container">
                <h1>Recuperar Senha</h1>
            </div>
    	</header>
        <div class="container">
			<form  method="post">
				<h4 id="usuario_recup">Email*:</h4></p><input type="email" name="email" id="input_email_recup" placeholder="email@email.com" required/>
				<h4 id="texto_matricula">Matrícula:</h4><input type="text" name="matricula" id="input_matricula"/>
				<h4 id="texto_cpf">CPF*:</h4><input type="text" name="cpf" id="cpf" placeholder="999.999.999-99" pattern="[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]-[0-9][0-9]" required/>
				<!--COLOCAR TIPO DATA-->
				<h4 id="texto_dt">Data de Nascimento*:</h4><input type="date" name="dt_nasc" id="input_de_nasc" required/>
				<input id="enviar_info" type="submit" name="btn_enviar_info" value="Continuar">

			</form>
			<div id="result"></div>
			<!-- CASO OS CAMPOS PREENCHIDOS CORRESPONDEREM COM O BANCO DE DADOS, ABRIR A TELA DE ALTERAR SENHA
			PARA QUE A MESMA SEJA RECUPERADA-->
        </div>
		<div class="footer2_login"> <!-- alterar css -->
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="inicio.html">Home</a>| 
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
								Copyright &copy; 2016. Template by<a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
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
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<script type="text/javascript" src="assets/js/login.js"></script>

    </script>
</body>
</html>
