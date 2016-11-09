<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>CCAA - Cadastro Tipo Conta</title>
		<meta charset='UTF-8'/>
		<link rel="stylesheet" type="text/css" href="../_css/cadastroTipoConta.css" />
		<link rel="icon" href="assets/images/favicon.png" >
	</head>
	<body>
		<div id="barraFerramentas">
			<img id="imgLogo" src="../_img/logo-ccaa-cadastros.png">
			<a id="textIconHome" href="">Home</a>
			<a id="textIconFinanceiro" href="">Financeiro</a>
			<a id="textIconAcademico" href="">Acadêmico</a>
			<a id="textIconAdministrativo" href="">Administrativo</a>
		</div>
		<div id="barraPrincipal">
			<p id="cadastroTipoConta">Cadastro - Tipo Conta</p>
			<a id="voltar" href="">Voltar</a>
		</div>
		<div id="conteudo">
			<input id="pesquisar" type="text" name="pesquisar" value="Pesquisar" />
			<table>
				<tr>
					<th id="gridCodigo">Código</th>
					<th id="gridConta">Conta</th>
					<th colspan="2" id="gridAcao">Ação</th>
				</tr>
                 <?PHP
                require_once ("../util/autoload.php");
				spl_autoload_register("LoadClass");
				$controller = new TipoContaController();
				$tipoContas = $controller->List();
				while($tipoConta=array_pop($tipoContas)){
				echo "
				<tr>
                <th id='gridCodigo'>{$tipoConta->getCode()}</th>
				<th id='gridCodigo'>{$tipoConta->getTipo()}</th>
                <th>
				   <form action=\"../helper/TipoContaHelper.php?action=delete&code={$tipoConta->getCode()}\" method=\"post\">
                   <input type=\"submit\" value=\"Excluir\">
                    </form>
                </th>
				</tr>
				";
				}
				?>
				<div id="cadastro">
                <form action="../helper/TipoContaHelper.php?action=save" method="POST">
                    <p id="textoTipoConta">Conta:</p><input id="tipoConta" type="text" name="tipoconta" />
                    <input id="salvar" type="submit" name="btnSalvar" value="Salvar" />
                    <input id="cancelar" type="button" name="btnCancelar" value="Cancelar" />
                </form>
			</div>
			</table>
		</div>
	</body>
</html>