<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA - Pagamento</title>
	<link rel="icon" href="assets/images/favicon.png">
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
					<li class="active"><a href="home_aluno.php">Home</a></li>
					<li ><a href="aluno_diarios.html">Diários</a></li>
					<li ><a href="aluno_boletim.html">Boletim</a></li>
					<li ><a href="aluno_boletim.html">Materiais</a></li>
					<li ><a href="aluno_boletim.html">Mensalidades</a></li>
					<li ><a href="pagamento.php">Pagamento Online</a></li>
					<li ><a href="alterar_senha.php">Alterar Senha</a></li>
					<li ><a href="../util/logout.php">Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary_login">
            <div class="container">
                    <h1>Pagamento</h1>
                </div>
    </header>

    
    <div class="container">
			<div id="coluna_esquerda">&nbsp;
				<h3>Dados do Cartão</h3>
				
				<form action="../helper/PagamentoHelper.php?action=save" method="post" />
				<h4>Número do Cartão *:</h4><input type="text" name="numCartao" size="20" required pattern="[0-9]+$"title="Somente numeros"/>

				<h4>Data de Vencimento *:</h4><input type="month" name="dtValCartao" required/> 
				
				<h4>Nome e Sobrenome *: </h4><input type="text" name="nome" size="20" required pattern="[a-z\s]+$" title="Somente letras"/>
				
				<h4>Código de Segurança *: </h4><input type="text" name="codSeg" size="3" placeholder="999" required pattern="[0-9]+$" title="Somente numeros"/>
				
			</div>

			<div id="coluna_direita">&nbsp;
				<h3>Dados do Titular do Cartão</h3>

				<h4>CPF *: </h4>&nbsp 
				<input type="text" name="cpf" id="cpf" placeholder="999.999.999-99" pattern="[0-9][0-9][0-9].[0-9][0-9][0-9].[0-9][0-9][0-9]-[0-9][0-9]" title="Somente numeros" required/>
				
				<h4>Telefone *: </h4> &nbsp <input type="text" name="inputTel" size="15" placeholder="(99)99999-9999" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="Somente numeros" required/>

				<h4>Data de Nascimento *: </h4>&nbsp <input type="date" name="dtNasc" required/>
				
				<h4>Nome da Mãe *: </h4>&nbsp <input type="text" name="nmMae" size="20" required pattern="[a-z\s]+$" title="Somente letras"/>

				<br/>
	
				<input type="submit" name="continuar" value="Enviar">&nbsp 
				</form>
				&nbsp;
			</div>
			
	</div>

<div>
			<br/>
			<br/>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2_login">
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
	<script src="assets/js/custom.js"></script>
</body>
</html>
