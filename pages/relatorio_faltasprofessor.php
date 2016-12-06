
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
<table id="tabela" class="display nowrap" cellspacing="0" width="100%">

<h3><select name="professor">
<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$pessoaControl = new PessoaController();
$perfilControl = new PerfilController();

$perfil = $perfilControl->getByDescricao("Professor");
$professores = $pessoaControl->ListByPerfil($perfil->getCode());

	
 	while ($professor = array_pop($professores)) { 
        $perfil = $pessoaControl->ListByCode($professor->getCode());
        echo "<option value=\"{$professor->getCode()}\" > {$professor->getNome()} </option>";
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
		
	</tr>
    </tbody>
</table>

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
