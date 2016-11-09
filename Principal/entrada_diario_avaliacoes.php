<!DOCTYPE html>
<html lang="en">
<?PHP 
	require_once ("../util/autoload.php");
	spl_autoload_register("LoadClass");
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-Registro de entrada do diário - Avaliações</title>
	<link rel="icon" href="assets/images/favicon.png">
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
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">Sobre</a></li>
					<li><a href="courses.html">Cursos</a></li>
          			<li><a href="courses.html">Estude no CCAA</a></li>
          			<li><a href="courses.html">Unidades</a></li>
					<li><a href="price.html">Preços</a></li>
          			<li><a href="courses.html">Convênios</a></li>
          			<li><a href="courses.html">Contato</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="avaliacoes">Registro de entrada do diário - Avaliações</h1>
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
					<th id="gridnum">Número      </th>&nbsp
					<th id="gridAlunio">Aluno    </th>&nbsp
					<th id="gridNotaFinal">Nota final   </th>&nbsp
					<th id="gridNotaFinal">Nota midterm </th>&nbsp
					<th id="gridNotaOral">Oral     </th>&nbsp
					<th id="gridSituacao">Situacao    </th>&nbsp
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
					$observacoes = $controller->List();
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
								<a href="index.html">Home</a>| 
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/specific/entrada_diario_avaliacoes.js"></script>
</body>
</html>
