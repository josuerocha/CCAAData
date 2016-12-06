<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>CCAA - Cadastro Sala</title>
		<meta charset='UTF-8'/>
		<link rel="stylesheet" type="text/css" href="../_css/cadastroSala.css" />
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
			<p id="cadastroSala">Cadastro - Sala</p>
			<a id="voltar" href="">Voltar</a>
		</div>
		<div id="conteudo">
			<input id="pesquisar" type="text" name="pesquisar" value="Pesquisar" />
			<table>
				<tr>
					<th id="gridCodigo">Sala</th>
					<th id="gridCodigo">Ação</th>
				</tr>

                <?PHP
                require_once (__DIR__."/../util/autoload.php");
				spl_autoload_register("LoadClass");
				$controller = new SalaController();
				$salas = $controller->List();
				while($sala=array_pop($salas)){
				echo "
				<tr>
				<th id='gridCodigo'>{$sala->getDescricao()}</th>
                <th>
				   <form action=\"helper/SalaHelper.php?action=delete&code={$sala->getCode()}\" method=\"post\">
                   <input type=\"submit\" value=\"Excluir\">
                    </form>
                </th>
				</tr>
				";
				}
				?>



			</table>
			<div id="cadastro">
            <form action="helper/SalaHelper.php?action=save" method="POST">
				<p id="textoSala">Sala:</p><input id="sala" type="text" name="code" />
				<input id="salvar" type="submit" name="btnSalvar" value="Salvar" />
				<input id="cancelar" type="button" name="btnCancelar" value="Cancelar" />
            </form>
			</div>
		</div>
		
	</body>
</html>