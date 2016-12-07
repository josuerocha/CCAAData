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
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-Cadastro - Sala</title>
	<link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
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
					<li><a href="home_secretario.php">Home</a></li>
					<li class="active"><a href="cadastros.php">Cadastros</a></li>
					<li><a href="cadastro_pessoa.php">Cadastrar Pessoa</a></li>
					<li><a href="cadastro_contaspagar.php">Contas a Pagar</a></li>
					<li><a href="cadastro_contasreceber.php">Contas a Receber</a></li>
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
                    <h1 id="text_cad_perf">Cadastros - Salas</h1>
                </div>
    </header>

    
    <div class="container">
				<div id="coluna_esquerda">

				<form action="../helper/SalaHelper.php?action=save" method="POST">
					<input type="hidden" id="codeHidden" name="codeHidden">
					<h4 id="textoSala">Salas: <span id="sala-span">*</span></h4>
						<input id="sala" type="text" name="numero" required>
					<input id="btn-salvar-sala" type="submit" name="btnSalvar" value="Salvar">
					<input id="btn-cancelar-sala" type="button" name="btnCancelar" value="Cancelar" onclick="Novo();">
				</form>

				<!-- TABELA DO GRID AQUI!!! -->
				<table id="table_sala" border="2">
					<thead>
						<tr>
							<th id="gridcod">Número</th>
							<th id="gridPerfil">Descrição</th>
							<th colspan="2" id="gridAcao">Ação</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th id="gridcod">Número</th>
							<th id="gridPerfil">Sala</th>
						</tr>
					</tfoot>
					<tbody>
						
						<?PHP
							$salaControl = new SalaController();
							$salas = $salaControl->ListAll();

							while($sala = array_pop($salas)){
								echo "<tr>";
								echo "<td align=center valign=center> {$sala->getNumero()} </td>";
								echo "<td align=center valign=center> {$sala->getDescricao()} </td>";
								echo "	<td align=center valign=center> 
											<form class=\"form_editar\" action=\"../helper/SalaHelper.php?action=edit\" method=\"post\">
											<input type=\"hidden\" name=\"code\" value=\"{$sala->getCode()}\">
               								<input id=btn-edit-sala type=\"submit\" value=\"Editar\">
               								</form>
				   						</td>
				   						<td align=center valign=center>
				   							<form action=\"../helper/SalaHelper.php?action=delete\" method=\"post\">
                   							<input type=\"hidden\" name=\"code\" value=\"{$sala->getCode()}\">
                   							<input id=\"btn-exc-sala\"type=\"submit\" value=\"Excluir\">
											</form>         	
										</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>

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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
	<script type="text/javascript" src="assets/js/specific/cadastro_sala.js"></script>
</body>
</html>
