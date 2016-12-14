<?php
	require_once ("../util/autoload.php");
	spl_autoload_register("LoadClass");
	

	$receitaControl = new ReceitaController();
	$receitaControl->CalculateProfit();

	

	$dados = array();

	array_push($dados, $receitaControl->getSpenditures());
	array_push($dados, "Gastos");

	array_push($dados, $receitaControl->getEarnings());
	array_push($dados, "Receita");

	array_push($dados, $receitaControl->getProfit());
	array_push($dados, "Lucros");	
				  


	echo json_encode($dados);
?>