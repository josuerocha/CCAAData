<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA-Cadastro Contas a Receber</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
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
                    <h1>Cadastro Contas a Receber</h1>
                </div>
    </header>

    
    <div class="container">
			<div id="coluna_esquerda">&nbsp;

			<form action="../helper/ContaReceberHelper.php?action=save" method="POST">
				<input type="hidden" id="codeHidden" name="codeHidden" />
				<h3>Tipo: </h3>&nbsp <select id="tipo_conta" name="tipo_conta">
					<?php
					require_once (__DIR__."/../util/autoload.php");
					spl_autoload_register("LoadClass");
					$tipoContaControl = new TipoContaController();
					$tipos = $tipoContaControl->ListAll();
					while($tipo=array_pop($tipos)){                                                 
					echo "<option value='{$tipo->getCode()}'>{$tipo->getTipo()}</option>";
					}
					?>
					</select>
				
		
				<h3>Valor: &nbsp <input type="number" id="valor" name="valor" size="10" min="1" max="500"></h3>
					
				<h3>Data de Vencimento: &nbsp <input type="date" id="Dt_venc" name="Dt_venc"></h3>
				<h3>Data de Pagamento: &nbsp <input type="date" id="Dt_pag" name="Dt_pag"></h3>
				<h3>Situação: &nbsp 
					<input type="radio" id="Situacao1" name="Situacao" value="quitado"> Quitado &nbsp 
					<input type="radio" id="Situacao2" name="Situacao" value="pendente"> Pendente
					</h3>

				<input type="submit" class="btn-primario" name="Salvar" value="Salvar">
				<input type="button" class="btn-danger" name="Cancelar" value="Cancelar" onclick="Novo();">
				</form>
			</div>

			<div id="coluna_esquerda">&nbsp;
				
				
				<form onsubmit="return tagSearch(this)">
    			<input type="date" name="Dt_venc" onfocus="if (this.value == '{text:Search Label}') {this.value=''}" onblur="if (this.value == '') {this.value='{text:Search Label}'}" />
    			<input type="submit" value="Search" />
				</form>

				<table id="listaContas" border="2">
					
					<tr>
						<th id="gridtipo">Tipo</th>&nbsp
						<th id="gridVl">Valor</th>&nbsp
						<th id="gridDt_venc">Data de vencimento</th>&nbsp
						<th id="gridDt_Pg">Data de Pagamento</th>&nbsp
						<th id="gridSituacao">Situacao</th>&nbsp
						<th id="gridAção">Ação</th>
					</tr>
					<?PHP
					require_once ("../util/autoload.php");
					spl_autoload_register("LoadClass");
					$controller = new ContaReceberController();
					$contasReceber = $controller->ListAll();
					while($contaReceber=array_pop($contasReceber)){
					echo "
					<tr>
					<th id='gridtipo'>{$contaReceber->getTipo()}</th>
					<th id='gridVl'>{$contaReceber->getValor()}</th>
					<th id='gridDt_venc'>{$contaReceber->getDtVencimento()}</th>
					<th id='gridDt_Pg'>{$contaReceber->getDtPagamento()}</th>
					<th id='gridSituacao'>{$contaReceber->getSituacao()}</th>
					<th>
					<form action=\"../helper/ContaReceberHelper.php?action=delete&code={$contaReceber->getCode()}\" method=\"post\">
					<input type=\"submit\" value=\"Excluir\">
						</form>
					</th>

					<th>
					<form id=\"editarForm\" action=\"../helper/ContaReceberHelper.php?action=edit\" method=\"post\">
					<input type=\"hidden\" name=\"codeEdit\" id=\"codeEdit\" value={$contaReceber->getCode()}>
					<input type=\"submit\" value=\"Editar\">
						</form>
					</th>
					</tr>
					";
					}
					?>

				</table>
		</div>

	</div>
<div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2_login">
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
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/specific/contas_receber.js"></script>
</body>
</html>
