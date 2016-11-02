
<!DOCTYPE html>
<html lang="en">
<?PHP 
	require_once (__DIR__."/../util/autoload.php");
	spl_autoload_register("LoadClass");
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA--Alteração de hora-aula do professor</title>
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

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Alteração de hora-aula do professor</h1>
                </div>
    </header>

    
    <div class="container">
<form action="../helper/PessoaHelper.php?action=horaAula" method = "post">
		<h3>Professor:&nbsp <select name="prof">
		<?PHP
								$codProfessor = 0;
								$perfilControl = new PerfilController();
								$perfis = $perfilControl->List();
								while($perfil=array_pop($perfis)){                                                 
									if($perfil->getDescricao() == "Professor"){
										$codProfessor = $perfil->getCode();
									}
								}
								$controller = new PessoaController();
								$pessoas = $controller->List();
								while($pessoa=array_pop($pessoas)){
									if($pessoa->getFKPerfil() == 1)
									echo "<option value='{$pessoa->getCode()}'>{$pessoa->getNome()}</option>";
								}
		?>
								</select>
		</h3>

		<br/>
		
		<h3>Valor da hora/aula: &nbsp R$<input type="number" name="valor" min="1" max="500">

		</h3>

			<input type="submit" onclick="alert('Tem certeza que deseja alterar hora/aula do professor?')" name="salvar_temp" value="Salvar">&nbsp 
			<input type="button" name="cancelar_temp" value="Cancelar">
</form>
</div>
			<br/>
			<br/>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
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
