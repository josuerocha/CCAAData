<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$tipoContaControl = new TipoContaController();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de tipos de conta</title>

	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/cadastro_tipoconta.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">

</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="text_cad_perf">Cadastro de tipos de conta</h1>
                </div>
    </header>

    
    <div class="container" contenteditable>
				<div id="coluna_esquerda">
				<form action="../helper/TipoContaHelper.php?action=save" method="post">
					<input type="hidden" name="codeHidden" id="codeHidden">

					<h4 id="textoTipoConta">Conta: <span>*</span></h4>
					<input id="contatipo" type="text" name="contatipo" required>	

					<input id="btn-salvar-conta" class="btn-salvar"type="submit" name="btnSalvar" value="Salvar">
					<input id="btn-cancelar-conta" class="btn-cancelar" type="button" name="btnCancelar" value="Cancelar" onclick="Novo();">

    			</form>

				<!-- TABELA DO GRID AQUI!!! -->
				<div id="table_area">
					<table id="table_contas" class="stripe row-border order-column" cellspacing="0" width="100%" >
						<thead>
							<tr>
								<th>Conta</th>
								<th>Ação</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>Conta</th>
								<th>Ação</th>
							</tr>
						</tfoot>


						<tbody>
							<?PHP
								$tiposConta = $tipoContaControl->ListAll();

								while($tipoConta = array_shift($tiposConta)){
									echo "	<tr>
												<td> {$tipoConta->getTipo()} </td>
												<td>
													<form class=\"form_edit\" action=\"../helper/TipoContaHelper.php?action=edit\" method=\"POST\">
														<input type=\"hidden\" name=\"codeEdit\" value=\"{$tipoConta->getCode()}\">
		                   								<input id=\"btn-edit-sala\" type=\"submit\" value=\"Editar\">
		                   							</form>
						   							
						   							<form action=\"../helper/TipoContaHelper.php?action=delete\" method=\"POST\">
						   								<input type=\"hidden\" name=\"codeDelete\" value=\"{$tipoConta->getCode()}\">
		                   								<input id=\"btn-exc-sala\" type=\"submit\" value=\"Excluir\">
													</form>         	

												</td>
											</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>

	</div>
			<div class="clear"></div>
			<!--CLEAR FLOATS-->
			</div>
		<div id="fo_perfil" class="footer2_login">
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
	<script type="text/javascript" src="assets/js/specific/cadastro_tipoconta.js"></script>
</body>
</html>
