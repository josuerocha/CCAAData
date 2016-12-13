<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$perfilControl = new PerfilController();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de perfis</title>

	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/cadastro_perfil.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
</head>

<body>
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="text_cad_perf">Cadastro de perfis</h1>
                </div>
    </header>

    
    <div class="container" contenteditable>
		<div id="coluna_esquerda">

			<form action="../helper/PerfilHelper.php?action=save" method="POST">
				<input type="hidden" id="codeHidden" name="codeHidden" />

				<h4 id="text">Perfil: <span>*</span></h4>
				<div id="div_buttons">
					<input id="descricao" name="descricao" type="text" name="perfil">	
				</div>

				<h4 id="text">&nbspCadastros <br>&nbsp simples: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="cadastro1" name="cadastro" value="1"> Permitido
					<input type="radio" id="cadastro2" name="cadastro" value="0"> Não Permitido
				</div>

				<h4 id="text">Cadastros <br> complexos: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="cadastro_complexo1" name="cadastro_complexo" value="1"> Permitido
					<input type="radio" id="cadastro_complexo2" name="cadastro_complexo" value="0"> Não Permitido
				</div>

				<h4 id="text">Relatórios <br> simples: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="relatorio1" name="relatorio" value="1"> Permitido
					<input type="radio" id="relatorio2" name="relatorio" value="0"> Não Permitido
				</div>

				<h4 id="text">Relatórios <br> complexos: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="relatorio_complexo1" name="relatorio_complexo" value="1"> Permitido
					<input type="radio" id="relatorio_complexo2" name="relatorio_complexo" value="0"> Não Permitido
				</div>

				<h4 id="short-text">Estudante: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="estudante1" name="estudante" value="1"> Permitido
					<input type="radio" id="estudante2" name="estudante" value="0"> Não Permitido
				</div>

				<h4 id="short-text">Professor: <span>*</span></h4>
				<div id="div_buttons">
					<input type="radio" id="professor1" name="professor" value="1"> Permitido
					<input type="radio" id="professor2" name="professor" value="0"> Não Permitido
				</div>

					<input id="btn-salvar-perfil" class="btn-salvar" type="submit" name="Salvar" value="Salvar">
					<input id="btn-cancelar-perfil" class="btn-cancelar" name="Cancelar" value="Cancelar" type="button" onclick="Novo();">
			</form>
		</div>

		<div id="table_area">
			<table id="table_perfil" class="stripe row-border order-column" cellspacing="0" width="100%">
				
				<thead>
					<tr>
						<th>Perfil</th>
						<th>Cadastros</th>
						<th>Cadastros complexos</th>
						<th>Relatórios</th>
						<th>Relatórios complexos</th>
						<th>Professor</th>
						<th>Aluno</th>
						<th>Ação</th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>Perfil</th>
						<th>Cadastros</th>
						<th>Cadastros complexos</th>
						<th>Relatórios</th>
						<th>Relatórios complexos</th>
						<th>Professor</th>
						<th>Aluno</th>
						<th>Ação</th>
					</tr>
				</tfoot>

				<tbody>
					<?PHP
						$perfis = $perfilControl->ListAll();
						while($perfil = array_shift($perfis)){
							echo "	<tr>
										<td> {$perfil->getDescricao()} </td>

										{$perfil->DisplayPermissionsTabular()}

										<td>
											<form class=\"form_edit\" action=\"../helper/PerfilHelper.php?action=edit\" method=\"post\">
												<input type=\"hidden\" name=\"codeEdit\" value=\"{$perfil->getCode()}\">
                   								<input id=\"btn-edit-sala\" type=\"submit\" value=\"Editar\">
                   							</form>
							   				
							   				<form action=\"../helper/PerfilHelper.php?action=delete\" method=\"post\">
							   					<input type=\"hidden\" name=\"codeDelete\" value=\"{$perfil->getCode()}\">
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
	<script type="text/javascript" src="assets/js/specific/cadastro_perfil.js"></script>
</body>
</html>
