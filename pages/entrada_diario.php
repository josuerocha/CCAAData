<!DOCTYPE html>
<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$notaControl = new NotaController();

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
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="assets/css/font-awesome-4.1.0/css/font-awesome.min.css" type="text/css" media="screen">
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
				<h3>Avaliações</h3>
				<br/>
				
				<br/>
				<form id="tabelaNotas" action="../helper/NotaHelper.php?action=save" method="post">
				<h4>Ano: &nbsp <select name="ano" id ="ano"></h4>
					<?PHP 
						$date = date("Y-m-d");
						$anoAtual =  explode('-', $date);

						for($year = $anoAtual[0]; $year >= $notaControl->getEarliestYear(); $year--){
							echo "<option value=\"{$year}\"> {$year} </option>";
						}
					?>
				</select>			

			<h4>Semestre: &nbsp <select name="semestre"></h4>
				<option value='1'>1º</option>
				<option value='2'>2º</option>
			</select>
			<br>
			<br>
			<table id="example" class="display" cellspacing="0" width="100%">
			
				<thead>
				<tr>
					<th> Número </th>
					<th> Aluno </th>
					<th> Nota final </th>
					<th> Nota midterm </th>
					<th> Oral </th>
					<th> Situacao </th>
				</tr>
				</thead>

				<tbody>
				<?PHP
					$perfilControl = new PerfilController();
					$pessoaControl = new PessoaController();

					$perfil = $perfilControl->getByDescricao("Aluno");
					$alunos = $pessoaControl->ListByPerfil($perfil->getCode());
					while($aluno = array_pop($alunos)){
						$controlNota = new NotaController();
						$nota = $controlNota->ListByAluno($aluno->getCode());
						echo "<tr>	
							<input type='hidden' name='codigoNota[]' value='{$nota->getCode()}' />
							<input type='hidden' name='codigoAluno[]' value='{$aluno->getCode()}' />
							<th>  {$aluno->getCode()} </th>
							<th>  {$aluno->getNome()}  </th>
							<th>  <input type='text' name='notaFinal[]' value='{$nota->getFinal()}' />    </th>
							<th>  <input type='text' name='notaMid[]' value='{$nota->getMid()}' />    </th>
							<th>  <input type='text' name='notaOral[]' value='{$nota->getOral()}' />    </th>
							<th>  {$nota->getSituacao()}   </th>
							<th>";
							echo "</tr>";
					}
				?>

			</tbody>
			</table>

			<br/>

			<input class="btn-primary" type="submit" name="salvar_temp" value="Salvar">&nbsp 
			<input class="btn-danger" type="button" name="cancelar_temp" value="Cancelar">
			</form>		
		</div>

		<br/>
		<br/>

		<div id="coluna_direita">
				
				<h3>Observações</h3>
				<form action="../helper/ObservacaoHelper.php?action=save" method="post">
				<h4>Aluno: &nbsp <select name="codeAluno">
					<?PHP
					require_once (__DIR__."/../util/autoload.php");
					spl_autoload_register("LoadClass");
					$pessoaControl = new PessoaController();
					$perfilControl = new PerfilController();
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
				
				<input type="text" name="descricao" placeholder="Observações" size="40">
				<br/>
				<br/>
				
				<input type="submit" name="salvar_temp" value="Salvar">&nbsp 
				<input type="button" name="cancelar_temp" value="Cancelar">
				<!-- BOTÃO NOTIFICAR POR EMAIL -->
				</form>
				<form action="../util/EnviarEmail.php" method="post">
				<input class="btn-notifica" type="submit" name="notifica_temp" value="Notificar Email">
				</form>
				<table id="listaContas" border="2">
					
					<tr>
						<th id="gridtipo">Nome</th>&nbsp
						<th id="gridVl">Observacao</th>&nbsp

					</tr>
				<?PHP
					$controller = new ObservacaoController();
					$pessoaControl = new PessoaController();
					$observacoes = $controller->ListAll();
					while($observacao = array_pop($observacoes)){
					$aluno = $pessoaControl->ListById($observacao->getCodeAluno());
					echo "
					<tr>
					<th id='gridVl'>{$aluno->getNome()}</th>
					<th id='gridDt_venc'>{$observacao->getDescricao()}</th>
					
					<th>
					<form action=\"../helper/ObservacaoHelper.php?action=delete\" name=\"editarform\" id=\"editarform\" method=\"post\">
					<input type=\"hidden\" name=\"codeDelete\" id=\"codeDelete\" value={$observacao->getCode()}>
					<input type=\"submit\" value=\"Excluir\">
						</form>
					</th>
					</tr>
					";
					}
					?>
					</table>


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
	<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
