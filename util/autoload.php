<?php
function LoadClass($classe)
{
    $classe = ltrim($classe, "\\");
	$arquivo = "";
	
	$caminho = "..";
	
	if(file_exists("{$caminho}/class/DAO/{$classe}.php")){
		$arquivo = "/class/DAO/{$classe}.php";
	}
	else if(file_exists("{$caminho}/class/config/{$classe}.php")){
		$arquivo = "/class/config/{$classe}.php";
	}
	else if(file_exists("{$caminho}/class/controller/{$classe}.php")){
		$arquivo = "/class/controller/{$classe}.php"; 
	}
	else if(file_exists("{$caminho}/class/entity/{$classe}.php")){
		$arquivo = "/class/entity/{$classe}.php";
	}
	
	$caminho = $caminho.$arquivo;
	echo $caminho;
	require_once $caminho;
}

?>
