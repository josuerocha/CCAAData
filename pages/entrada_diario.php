<!DOCTYPE html>
<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$notaControl = new NotaController();
$pessoaControl = new PessoaController();
$perfilControl = new PerfilController();
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de entrada do diário</title>
	
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/entrada_diario.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
		<div class="container">
			<h1>Registro de entrada do diário</h1>
		</div>
	</header>


	<div class="container">
		<div id="coluna_esquerda">&nbsp;

			<form id="form_notas" action="../helper/NotaHelper.php?action=save" method="post">
				<h4>Ano: </h4>

				<select name="ano" id ="ano">
					<?PHP 
					$date = date("Y-m-d");
					$anoAtual =  explode('-', $date);

					for($year = $anoAtual[0]; $year >= $notaControl->getEarliestYear(); $year--){
						echo "<option value=\"{$year}\"> {$year} </option>";
					}
					?>
				</select>			

				<h4>Semestre: </h4>
				<select name="semestre">
					<option value='1'>1º</option>
					<option value='2'>2º</option>
				</select>

				<div id="grade_table_area">
					<table id="table_notas" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th> Número </th>
								<th> Aluno </th>
								<th> Nota final </th>
								<th> Nota midterm </th>
								<th> Oral </th>
								<th> Situação </th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th> Número </th>
								<th> Aluno </th>
								<th> Nota final </th>
								<th> Nota midterm </th>
								<th> Oral </th>
								<th> Situação </th>
							</tr>
						</tfoot>

						<tbody>
							<?PHP
							$perfilControl = new PerfilController();
							$pessoaControl = new PessoaController();

							$perfil = $perfilControl->getByDescricao("Aluno");
							$alunos = $pessoaControl->ListByPerfil($perfil->getCode());
							while($aluno = array_pop($alunos)){
								$controlNota = new NotaController();
								$nota = $controlNota->ListByAluno($aluno->getCode());
								echo "	<tr>	
											<input type='hidden' name='codigoNota[]' value='{$nota->getCode()}' />
											<input type='hidden' name='codigoAluno[]' value='{$aluno->getCode()}' />
											<td>  {$aluno->getCode()} </td>
											<td>  {$aluno->getNome()} </td>
											<td>  <input class=\"input-nota\" type='text' style=\"width: 150px;\" name='notaFinal[]' value='{$nota->getFinal()}'/> </td>
											<td>  <input class=\"input-nota\" type='text' style=\"width: 150px;\" name='notaMid[]' value='{$nota->getMid()}'/> </td>
											<td>  <input class=\"input-nota\" type='text' style=\"width: 150px;\" name='notaOral[]' value='{$nota->getOral()}'/> </td>
											<td>  {$nota->getSituacao()}   </td>
								
										</tr>";
								}
								?>

							</tbody>
						</table>
					</div>

					<input class="btn-salvar" id="btn-salvar" type="submit" name="salvar_temp" value="Salvar">&nbsp 
					<input class="btn-cancelar" id="btn-cancelar" type="button" name="cancelar_temp" value="Cancelar">
				</form>		
			</div>

			<br/>
			<br/>

			<div id="coluna_direita">
				
				<h2><b>Observações</b></h2>
				<form action="../helper/ObservacaoHelper.php?action=save" method="post">
					<input type="hidden" name="codeHidden" id="codeHidden"/>

					<h4>Aluno: &nbsp <select name="codeAluno">
						<?PHP
						$perfil = $perfilControl->getByDescricao("Aluno");
						$alunos = $pessoaControl->ListByPerfil($perfil->getCode());
						while($aluno = array_pop($alunos)){
							echo "<option value='{$aluno->getCode()}'>{$aluno->getNome()}</option>";
						}
						?>
					</select>
				</h4>

				<br/>
				<br/>
				
				<textarea rows="4" cols="160" name="descricao" placeholder="Observações" required></textarea>
				
				<input type="submit" class = "btn-salvar" id = "btn-salvar-notificacao" name="salvar_temp" value="Salvar">&nbsp 
				<input type="button" class = "btn-cancelar" id = "btn-cancelar-notificacao" name="cancelar_temp" value="Cancelar">

				<div id="table_area_observacoes">
					<table id="table_observacoes" class="display"  cellspacing="0" width="100%">
					
					<thead>
						<tr>
							<th> Nome</th>
							<th> Observação</th>
							<th> Ação</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th> Nome</th>
							<th> Observação</th>
							<th> Ação</th>
						</tr>
					</tfoot>

					<?PHP
					$controller = new ObservacaoController();
					$pessoaControl = new PessoaController();
					$observacoes = $controller->ListAll();
					while($observacao = array_pop($observacoes)){
						$aluno = $pessoaControl->GetByCode($observacao->getCodeAluno());
						echo "
						<tr>
							<td> {$aluno->getNome()}</td>
							<td> {$observacao->getDescricao()}</td>

							<td>
								<span style=\"display: inline-block;\">
									<form class=\"form_editar\" action=\"../helper/ObservacaoHelper.php?action=edit\" method=\"post\">
										<input type=\"hidden\" name=\"codeEdit\" value=\"{$observacao->getCode()}\">
	   									<input class=\"button-edit\" id=\"btn-edit-sala\" type=\"submit\" value=\"\">
	   								</form>
		   			
		   							<form class=\"button-inline\" action=\"../helper/ObservacaoHelper.php?action=delete\" method=\"post\">
	       								<input type=\"hidden\" name=\"codeDelete\" value=\"{$observacao->getCode()}\">
	       								<input id=\"btn-exc-sala\" class=\"button-delete\" type=\"submit\" value=\"\">
									</form>

									<form class=\"button-inline\" action=\"../helper/ObservacaoHelper.php?action=delete\" method=\"post\">
	       								<input type=\"hidden\" name=\"codeDelete\" value=\"{$observacao->getCode()}\">
	       								<input id=\"btn-mail-sala\" class=\"button-mail\" type=\"submit\" value=\"\">
									</form>           
								</span>
							</td>
						</tr>
						";
					}
					?>
					</table>
				</div>

		</div>
	</div>
	
	<!--FOOTER GENÉRICA -->
	<?PHP include "../util/GenericFooter.php" ?>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/specific/cadastro_sala.js"></script>
<script src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
