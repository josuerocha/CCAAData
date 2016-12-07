<?php
	
	$idUsuario = $_POST['idUsuario'];
	
	
	$conexao = new mysqli("localhost", "root", "", "ccaa");
	
	$query = "SELECT COUNT(cdAluno) AS valor, nmTurma as nomeTurma FROM tbAluno as A inner join tbTurma as T on A.cdTurma=T.cdTurma WHERE  T.cdUsuario = {$idUsuario}	GROUP BY T.cdTurma ORDER BY T.cdTurma";
	$resultado = $conexao->query($query);		
	
	$dados = array();
	
	while($registro = mysqli_fetch_assoc($resultado)) {

		array_push($dados, $registro['valor']);
		array_push($dados, $registro['nomeTurma']);
	}	
	
	$resultado->close();		
	$conexao->close();
		
				  
	echo json_encode($dados);
?>