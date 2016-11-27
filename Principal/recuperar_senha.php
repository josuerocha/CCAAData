<?PHP
session_start();
if(isset($_SESSION["email"]))
{
	header("Location: home_aluno.php");
}
else
{

}
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
					<li ><a href="inicio.html">Home</a></li>
					<li><a href="about.html">Sobre</a></li>
					<li><a href="courses.html">Cursos</a></li>
                    <li><a href="courses.html">Estude no CCAA</a></li>
                    <li><a href="courses.html">Unidades</a></li>
					<li><a href="price.html">Preços</a></li>
                    <li><a href="courses.html">Convênios</a></li>
                    <li><a href="courses.html">Contato</a></li>
					<li class="active"><a href="login.html">Login</a></li>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/login.js"></script>

    </script>
</body>
</html>
