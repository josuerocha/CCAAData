<!DOCTYPE html>
<?PHP
require_once (__DIR__."/../util/autoload.php");
spl_autoload_register("LoadClass");
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
	<title>CCAA- Controle de Presença do Professor</title>
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
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
                    <h1 id="text_freq_prof">Controle de Presença do Professor</h1>
                </div>
    </header>


    <div class="container">
		<div class="frequencia_professor">
			<!-- TABELA DE LANÇAMENTO DE FREQUENCIA DOS ALUNOS-->
				<!-- Exemplo de linhas que devem ser geradas para cada aluno -->
				<form action="../helper/PresencaProfessorHelper.php?action=save" method="post">
					<h3 id="text_presenca_prof">Presença do Professor</h3>
					<select id="sltProf" name="sltProf">
					<?PHP
					$pessoaControl = new PessoaController();
					$perfilControl = new PerfilController();
					$perfil = $perfilControl->getByDescricao("Professor");
					$professores = $pessoaControl->ListByPerfil($perfil->getCode());
					while($professor = array_pop($professores)){
					
					echo "<option value='{$professor->getCode()}'>{$professor->getNome()}</option>";
					}
					?>
					</select>
					<input class="input_check" name="situacao" type="checkbox">&nbsp 
					<?PHP
						echo "<input type=\"hidden\" name=\"data\" value=\"".date("Y-m-d")."\" >";
					?>
			<input type="submit" class="btn_salvar_freq_prof" name="salvar_temp" value="Salvar">&nbsp 
			<input type="button" class="btn_cancelar_freq_prof" value="Cancelar"/>
			</form>
			</div>
			</div>

			<div class="container">
			<div id = "result">
			<table id="tabela_frequencia" class="display nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th >Código</th>
						<th >Professor</th>
						<th >Situacao</th>
						<th >Data</th>
						<th colspan="2" id="gridAcao">Ação</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th >Código</th>
						<th >Professor</th>
						<th >Situacao</th>
						<th >Data</th>
						<th colspan="2" id="gridAcao">Ação</th>
					</tr>
				</tfoot>
                <?PHP
				$controller = new PresencaController();
				$presencas = $controller->ListAll();
				while($presenca=array_pop($presencas)){
				$pessoaControl = new PessoaController();
				$pessoa = $pessoaControl->ListByCode($presenca->getCodePessoa());

				echo "
				<tr>
                <th>	{$presenca->getCode()}	</th>
				<th>	{$pessoa->getNome()}	</th>
				<th>	{$presenca->getSituacao()}	</th>
				<th>	{$presenca->getData()}	</th>
                <th>
				   <form id=\"formDelete\" action=\"../helper/PresencaProfessorHelper.php?action=delete\" method=\"post\">
				   <input type=\"hidden\" name=\"deleteCode\" id=\"deleteCode\" value=\"{$presenca->getCode()}\"/>
                   <input type=\"submit\" value=\"Excluir\">
                    </form>
                </th>
				</tr>
				";
				}
				?>
			</table>
			</div>
			</div>
	<!-- COLOQUEI ESSA GUAMBEARRA SÓ PRA MEXER NOS COMPONENTES NA TELA. AINDA FAREI O CSS-->
	
		<div class="clear"></div>
			<!--CLEAR FLOATS-->
		<div class="footer2_aluno">
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
	
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="assets/js/specific/controle_presencaprofessor.js"></script>

</body>
</html>
