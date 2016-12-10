<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html>
<head>
<html lang="pt-br">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatório de contas a pagar</title>
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">

<?include "../util/StandardHeader.php" ?>
<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

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


	<header id="head" class="secondary_aluno">
        <div class="container">
            <h1 id="texto_modulo">Contas à receber</h1>
        </div>
	</header>


<table id="tabela" class="display nowrap" cellspacing="0" width="100%">


<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$contasControl = new ContaReceberController();
$contas = $contasControl->ListAll();

$tipoControl = new TipoContaController();
?>


<thead>
<tr> 
            <th data-type="numeric">Tipo</th>
            <th> Valor</th>
            <th> Data de vencimento</th>
			<th> Data de pagamento</th>
			<th> Situação</th>
			
        </tr>
</thead>


        
    
    <tbody>
		
        <?PHP
		 while ($contaReceber = array_pop($contas)) { 
            $tipoConta = $tipoControl->ListByCode($contaReceber->getTipo());
        echo "
		    <tr align=\"center\">
					<td >{$tipoConta->getTipo()}</th>
					<td >R\$ {$contaReceber->getValor()}</th>
					<td >{$contaReceber->getDtVencimento()}</th>
					<td >{$contaReceber->getDtPagamento()}</th>
					<td >{$contaReceber->getSituacao()}</th>                   
 
		    </tr>
			";
      }
	?>
	</tr>
    </tbody>
</table>

		<div class="footer2_aluno"> <!-- alterar css -->
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
								Copyright &copy; 2016. Template by<a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>

</body>

<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/specific/relatorio_contasreceber.js"></script>


</html>
