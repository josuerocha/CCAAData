<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?include "../util/StandardHeader.php" ?>
	<title>CCAA - Cadastro Turma</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
		
		<!--NAVBAR GENÈRICA !! -->
		<?PHP include "../util/GenericNavBar.php"; ?>

		<!-- Titulo da página-->
		<header id="head" class="secondary_login">
            <div class="container">
                <h1>Cadastro de Turma</h1>
            </div>
    	</header>


        <div class="container">
			<form>
				<!-- CODIGO DA TURMA -->
				<input type="hidden" name="cod_turma" />
				<!-- SELECIONAR SALA -->
				<h4 id="textoSala">Sala:</h4><select class="select_sala"></select> 
				<!-- SELECIONAR IDIOMA -->
				<h4 id="texto_idioma_turma">Idioma:</h4> <select class="select_idioma"></select> 
				<!-- DESCRIÇÃO DA TURMA -->
				<h4 id="textoDesc">Descrição:</h4><input class="desc_turma" type="text"/>
				<input id="add_turma" type="submit" name="btnAdd" value="Adicionar" />
				<input id="cancel_turma" type="button" name="btnCancel" value="Cancelar" />
			</form>
			
        </div>
        <!-- COLOQUEI ESSA GUAMBEARRA SÓ PRA MEXER NOS COMPONENTES NA TELA. AINDA FAREI O CSS-->
        <br><br><br><br><br><br><br><br><br><br>
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
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/login.js"></script>

    </script>
</body>
</html>
