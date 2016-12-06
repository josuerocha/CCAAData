<!DOCTYPE html>
<html lang="pt-br">
<?PHP 
	require_once ("../util/autoload.php");
	spl_autoload_register("LoadClass");
	require_once("../util/checkSession.php");
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Boletim online</title>
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
                    <h1 id="avaliacoes">Boletim online</h1>
			</div>
    </header>


    <div class="container">
			<div id="coluna_esquerda">&nbsp;
				<h3>Avaliações</h3>
				<br/>
				
				<br/>
			<form id="tabelaNotas" action="../helper/NotaHelper.php?action=save" method="post">
			<?PHP 
				$date = date("Y-m-d");
				$ano =  explode('-', $date);
				echo "<h4>Ano: &nbsp<input type=\"year\" name=\"ano\" value=\"$ano[0]\"></h4>"
			?>
			
			<h4>Semestre: &nbsp<select name="semestre"></h4>
				<option value='1'>1º</option>
				<option value='2'>2º</option>
			</select>
			<br>
			<br>
			<table id="example" class="display" cellspacing="0" width="100%">
			
				<thead>
				<tr>
					<th id="gridnum">Disciplina</th>&nbsp
					<th id="gridNotaFinal">Nota final   </th>&nbsp
					<th id="gridNotaFinal">Nota midterm </th>&nbsp
					<th id="gridNotaOral">Oral     </th>&nbsp
					<th id="gridSituacao">Situacao    </th>&nbsp
				</tr>
				</thead>

				<tbody>
				<?PHP
				$pessoaControl = new PessoaController();
				$pessoa = $pessoaControl->getByEmail($_SESSION['email']);
				$controlNota = new NotaController();
				$nota = $controlNota->ListByAluno($aluno->getCode());

				echo "<tr>
					<th> {$nota->getDisciplina()} </th>
					<th> {$nota->getFinal()} </th>
					<th> {$nota->getMid()}   </th>
					<th> {$nota->getOral()}  </th>
					<th> {$nota->getSituacao()} </th>
					<th>";
					echo "</tr>";
				?>

			</tbody>
			</table>

			<br/>
		</div>

		<br/>
		<br/>

		<div id="coluna_direita">
				

			</div>
			<br/>
			<br/>
			
		


	</div>


<div>
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
	<script src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
