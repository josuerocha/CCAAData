<?php
require_once "../util/autoload.php";
spl_autoload_register("LoadClass");

$action = $_GET["action"];

switch($action){





    		default:
			echo "<script>alert('Acesso negado!'); location.href='../Principal/indice.html';</script>";
		break;
	}	
?>