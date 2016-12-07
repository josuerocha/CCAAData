<!DOCTYPE html>
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
	<title>CCAA--Registro de entrada do diário - Frequência e Trabalhos</title>
	<link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="assets/css/font-awesome-4.1.0/css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" type="text/css" media="screen">
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
					<li><a href="inicio.html">Home</a></li>
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
                    <h1 id="avaliacoes">Registro de entrada do diário - Frequência e Trabalhos</h1>
                </div>
    </header>


    <div class="container">
    	<div class="trabalhos_aluno">
    	<h3 id="texto_trabalhos_aluno">Entrega de Trabalhos</h3>
    	<h4 id="texto_pesquisar_trabalhos">Pesquisar: </h4><input class="input_pesquisar_trabalhos" type="text">
    	<!-- TABELA DE LANÇAMENTO DE TRABALHOS DOS ALUNOS-->
			<table id="table_trabalhos_aluno" border='2'>
				<!-- Atributos da tabela -->
				<tr>
					<td>Numero</td>
					<td>Aluno</td>
					<td>01</td>
					<td>02</td>
					<td>03</td>
					<td>04</td>
					<td>05</td>
					<td>06</td>
					<td>07</td>
					<td>08</td>
					<td>09</td>
					<td>10</td>
				</tr>
				<!-- Exemplo de linhas que devem ser geradas para cada aluno -->
				<tr>
					<td>1</td>
					<td>Amanda Nunes</td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
					<td><input class="input_check" type="checkbox"></td>
				</tr>
			</table>
			<input type="button" class="btn_salvar" value="Salvar"/>
			<input type="button" class="btn_cancelar" value="Cancelar"/>
		</div>
		<div class="frequencia_aluno">
			<h3 id="texto_frequencia_aluno">Presença</h3>
			<h4 class="texto_pesquisar_frequencia">Pesquisar: </h4><input class="input_pesquisar_frequencia" type="text">
			<!-- TABELA DE LANÇAMENTO DE FREQUENCIA DOS ALUNOS-->
			<table id="table_frequencia_aluno" border='2'>
				<!-- Atributos da tabela -->
				<tr>
					<td>Numero</td>
					<td>Aluno</td>
					<td>Presença</td>
				</tr>
				<!-- Exemplo de linhas que devem ser geradas para cada aluno -->
				<tr>
					<td>1</td>
					<td>Amanda Nunes</td>
					<td><input class="input_check" type="checkbox"></td>
				</tr>
			</table>
		</div>
			
	</div>
	<!-- COLOQUEI ESSA GUAMBEARRA SÓ PRA MEXER NOS COMPONENTES NA TELA. AINDA FAREI O CSS-->
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div class="clear"></div>
			<!--CLEAR FLOATS-->
		<div class="footer2">
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
	<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
