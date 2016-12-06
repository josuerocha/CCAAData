<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>CCAA - Cadastro Tipo Conta</title>
		<meta charset='UTF-8'/>
		<link rel="stylesheet" type="text/css" href="../_css/cadastroIdioma.css" />
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
			<p id="cadastroIdioma">Cadastro - Idioma</p>
			<a id="voltar" href="">Voltar</a>
		</div>
		<div id="conteudo">
			<input id="pesquisar" type="text" name="pesquisar" value="Pesquisar" />
			<table>
				<tr>
					<th id="gridCodigo">Código</th>
					<th id="gridConta">Idioma</th>
					<th colspan="2" id="gridAcao">Ação</th>
				</tr>
				                <?PHP
                require_once (__DIR__."/../util/autoload.php");
				spl_autoload_register("LoadClass");
				$controller = new IdiomaController();
				$idiomas = $controller->List();
				while($idioma=array_pop($idiomas)){
				echo "
				<tr>
                <th id='gridCodigo'>{$idioma->getCode()}</th>
				<th id='gridCodigo'>{$idioma->getDescricao()}</th>
                <th>
				   <form action=\"helper/IdiomaHelper.php?action=delete&code={$idioma->getCode()}\" method=\"post\">
                   <input type=\"submit\" value=\"Excluir\">
                    </form>
                </th>
				</tr>
				";
				}
				?>


			</table>
			<div id="cadastro">
            <form action="helper/IdiomaHelper.php?action=save" method="POST">
				<p id="textoIdioma">Idioma:</p><input id="idioma" type="text" name="descricao" />
				<input id="salvar" type="submit" name="btnSalvar" value="Salvar" />
				<input id="cancelar" type="button" name="btnCancelar" value="Cancelar" />
            </form>
			</div>
		</div>
	</body>
</html>