
<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html>
<head>

<?include "../util/StandardHeader.php" ?>
<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">

</head>

<body>
<div id = "result">
<table id="tabela" class="display nowrap" cellspacing="0" width="100%">

<form id="formularioProfessor" action="../pages/relatorio_faltasprofessor.php" method="post">
<h3><select name="professorCode" id="professorCode">
<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$pessoaControl = new PessoaController();
$perfilControl = new PerfilController();

$perfil = $perfilControl->getByDescricao("Professor");
$professores = $pessoaControl->ListByPerfil($perfil->getCode());
$codeProfessor = 0;
	
 	while ($professor = array_pop($professores)){ 
 		$codeProfessor = $professor->getCode();
        $perfil = $pessoaControl->ListByCode($professor->getCode());
        echo "<option value=\"{$professor->getCode()}\"> {$professor->getNome()} </option>";
    }
echo "</select>";
echo "</form>";

if(isset($_POST['professorCode'])){
	$codeProfessor = $_POST['professorCode'];
	echo "<script> alert('{$codeProfessor}'); </script>";
}



?>
</select>
</h3>
<thead>
		<tr> 
            <th> Data</th>
            <th> Presença</th>
        </tr>
</thead>
<tfoot>
	<tr> 
        <th> Data</th>
        <th> Presença</th>	
    </tr>
</tfoot>
    <tbody>    	
    	<?PHP
    		$presencaProfessorControl = new PresencaProfessorController();
    		$presencas = $presencaProfessorControl->ListByProfessor($codeProfessor);
    		while ($presenca = array_pop($presencas)) { 
    			echo "<tr>
    					  <td align=\"center\">{$presenca->getData()}</td>";
    					  if($presenca->getSituacao()){
    					  	echo "<td align=\"center\"><img src=\"assets/images/checkmark.png\" alt=\"Presente\" ></td>";

    					  }
    					  else{
    					  	echo "<td align=\"center\"><img src=\"assets/images/xmark.png\" alt=\"Ausente\" ></td>";

    					  }
    					  

    			echo "</tr>";
    		}
		?>
		
    </tbody>
</table>
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
<script type="text/javascript" src="assets/js/specific/relatorio_presencaprofessor.js"></script>
</script>

</html>
