<?PHP
require_once("../util/checkSession.php");
?>
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
	<title>CCAA-Alteração de hora-aula do professor</title>
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
					<li><a href="home_coordenador.php">Home</a></li>
					<li><a href="altera_horario_escola.php">Horário da Escola</a></li>
					<li><a href="contas.php">Contas</a></li>
					<li><a href="montagem_grade.php">Grade de Horário</a></li>
					<li class="active"><a href="alterar_hora_aula.php">Hora/Aula</a></li>
					<li><a href="visualizar-receita.php">Receita</a></li>
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
                    <h1 id="alterar_hora_aula">Alteração de hora-aula do professor</h1>
                </div>
    </header>

    
    <div class="container">
<form action="../helper/PessoaHelper.php?action=horaAula" method = "post">
		<h3 id="text_hora_prof">Professor:</h3><span id="hora-span-professor">*</span>&nbsp 
		<select id="select_hora_prof"name="prof">
		<?PHP
								$codProfessor = 0;
								$perfilControl = new PerfilController();
								$perfis = $perfilControl->ListAll();
								while($perfil=array_pop($perfis)){                                                 
									if($perfil->getDescricao() == "Professor"){
										$codProfessor = $perfil->getCode();
									}
								}
								$controller = new PessoaController();
								$pessoas = $controller->ListAll();
								while($pessoa=array_pop($pessoas)){
									if($pessoa->getFKPerfil() == 1)
									echo "<option value='{$pessoa->getCode()}'>{$pessoa->getNome()}</option>";
								}
		?>
		</select>
		
		
			<h3 id="text_valor_hora_prof">Valor da hora/aula (R$):</h3> &nbsp<span id="hora-span-aula">*</span> <h5><input id="input_valor_hora_prof" type="number" name="valor" min="1" max="500" required/></h5>
			<input id="btn_reset-hora-aula" type="reset" />&nbsp 
			<input id="btn_salvar_hora_prof" type="submit" onclick="alert('Tem certeza que deseja alterar hora/aula do professor?')" name="salvar_temp" value="Salvar"/>&nbsp 
			<input id="btn_cancelar_hora_prof" type="button" name="cancelar_temp" value="Cancelar"/>
</form>
</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div id="fo_hora-professor" class="footer2_login">
			<div class="container">
				<div class="row">
					<div class="col-md-6 panel">
						<div class="panel-body">
							<p id="fo-home-hora-professor" class="simplenav">
								<a href="home_coordenador.php">Home</a>| 
								<a href="altera_horario_escola.php">Horário Escola</a>|
								<a href="contas.php">Contas</a>|
                				<a href="montagem_grade.php">Grade Horário</a>|
                				<a href="alterar_hora_aula.php">Hora/Aula</a>|
                				<a href="visualizar_receita.php">Receita</a>|
                				<a href="alterar_senha.php">Alterar Senha</a>|
                				<a id="footer-login" href="../util/logout.php">Logout</a>
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
