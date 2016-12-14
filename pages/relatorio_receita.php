<?PHP
require_once("../util/checkSession.php");
require_once (__DIR__."/../util/autoload.php");
include "../util/StandardHeader.php";
spl_autoload_register("LoadClass");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Relatório de receita</title>
	
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="assets/css/grafico.css">
	<script type="text/javascript" src="assets/js/canvas/canvasjs.js"></script>
	<script type="text/javascript" src="assets/js/canvas/excanvas.js"></script>
	<script type="text/javascript" src="assets/js/canvas/jquery.canvasjs.js"></script>
	<script type="text/javascript" src="assets/js/chart/chart.js"></script>
	<script type="text/javascript" src="assets/js/specific/relatorio_visualizarreceita.js"></script>
</head>

<body onload = "mostrarResultados()">
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="text_cad_perf">Visualizar receita</h1>
                </div>
    </header>

    
    <div class="container" contenteditable>
	<?PHP	
    $receitaControl = new ReceitaController();
	$receitaControl->CalculateProfit();
    

    echo "<h1><b>Gastos:</b>  {$receitaControl->getSpenditures()}  </h1>";
    echo "<h1><b>Receita:</b>  {$receitaControl->getEarnings()}  </h1>";
    echo "<h1><b>Lucro:</b>  {$receitaControl->getProfit()}  </h1>";

    ?>
	</div>


	<div class="caixaGrafico">
	<canvas id="areaGrafico"></canvas>	
	</div>

	<div class="container" contenteditable >

	</div>
	

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
			</div>
		<div id="fo_sala" class="footer2_login">
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
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>
