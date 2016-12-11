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
	<title>Boletim online</title>
	<?include "../util/StandardHeader.php" ?>
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
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

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
				$aluno = $pessoaControl->getByEmail($_SESSION['email']);
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
	<script type="text/javascript" src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
