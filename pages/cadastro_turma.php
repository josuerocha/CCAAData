<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$salaControl = new SalaController();
$idiomaControl = new IdiomaController();
$turmaControl = new TurmaController();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?include "../util/StandardHeader.php" ?>
	<title>Cadastro de turmas</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/cadastro_turma.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">

</head>

<body>
		
		<!--NAVBAR GENÈRICA !! -->
		<?PHP include "../util/GenericNavBar.php"; ?>

		<!-- Titulo da página-->
		<header id="head" class="secondary_login">
            <div class="container">
                <h1>Cadastro de turmas</h1>
            </div>
    	</header>


        <div class="container">
			<form action = "../helper/TurmaHelper.php?action=save" method="post">
				<!-- CODIGO DA TURMA -->
				<input type="hidden" id="codeHidden" name="codeHidden" />
				<!-- SELECIONAR SALA -->
				<h4 id="texto_sala">Sala:</h4>
				
				<select name="select_sala" id="select_sala" required>
					<option value="">Selecione</option>
					<?PHP
					$salas = $salaControl->ListAll();
					while($sala = array_shift($salas)){
						echo "<option value=\"{$sala->getCode()}\"> {$sala->getNumero()} </option>";
					}
					?>
				</select> 

				<!-- SELECIONAR IDIOMA -->
				<h4 id="texto_idioma_turma">Idioma:</h4> 

				<select id="select_idioma" name="select_idioma" required>
					<option value="">Selecione</option>
					<?PHP
					$idiomas = $idiomaControl->ListAll();
					while($idioma = array_shift($idiomas)){
						echo "<option value=\"{$idioma->getCode()}\"> {$idioma->getDescricao()} </option>";
					}
					?>
				</select> 

				<!-- DESCRIÇÃO DA TURMA -->
				<h4 id="texto_horario">Horario:</h4>
				<input name="horario_turma" id="horario_turma" type="time" required/>

				<!-- DESCRIÇÃO DA TURMA -->
				<h4 id="textoDesc">Descrição:</h4>
				<input name="desc_turma" id="desc_turma" type="text" required/>

				<input id="add_turma" class="btn-salvar" type="submit" name="btnAdd" value="Adicionar" />
				<input id="cancel_turma" class="btn-cancelar" type="button" name="btnCancel" value="Cancelar" onclick="Novo();" />
			</form>
			
        </div>

        <div id="table_area">
        	<table id="table_turmas" class="stripe row-border order-column" cellspacing="0" width="100%">
        		<thead>
					<th>Descrição</th>
					<th>Sala</th>  
					<th>Idioma</th>
					<th>Horário</th>     
					<th>Ação</th>			
        		</thead>

        		<tfoot>
        			<th>Descrição</th>
					<th>Sala</th>  
					<th>Idioma</th>
					<th>Horário</th>
					<th>Ação</th>    
        		</tfoot>

        		<tbody>
        			<?PHP
        				$turmas = $turmaControl->ListAll();
        				while($turma = array_shift($turmas)){
        					$idioma = $idiomaControl->getByCode($turma->getIdioma());
        					echo 	"<tr>
        								<td> {$turma->getDescricao()} </td>
        								<td> {$turma->getSala()} </td>
        								<td> {$idioma->getDescricao()} </td>
        								<td> {$turma->getHorario()} </td>
        								<td> 
        									<form class=\"form_edit\" action=\"../helper/TurmaHelper.php?action=edit\" method=\"post\">
												<input type=\"hidden\" name=\"codeEdit\" value=\"{$turma->getCode()}\">
	                   							<input id=\"btn-edit-sala\" class=\"button-edit\" type=\"submit\" value=\"\">
	                   						</form>
								   			<form class=\"button-inline\" action=\"../helper/TurmaHelper.php?action=delete\" method=\"post\">
								   				<input type=\"hidden\" name=\"codeDelete\" value=\"{$turma->getCode()}\">
				                   				<input id=\"btn-exc-sala\" class=\"button-delete\" type=\"submit\" value=\"\">
											</form>
        								</td>
        						  	</tr>";

        				}
        			?>
        		</tbody>

        	</table>
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
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.fixedColumns.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="assets/js/specific/cadastro_turma.js"></script>
</body>
</html>
