<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/dataTablesCss.css">
</head>

<body>
<table id="tabela" class="display" cellspacing="0" width="100%">


<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");
$control = new ContaReceberController();
$contas = $control->ListAll();
?>


<thead>
<tr class="bootgrid-header"> 
            <th data-column-id="Código" data-type="numeric">Tipo</th>
            <th data-column-id="Nome da turma"> Valor</th>
            <th data-column-id="Horario" data-order="desc">Data de vencimento</th>
			<th data-column-id="Nível" data-order="desc">Data de pagamento</th>
			<th data-column-id="Descricao" data-order="desc">Situação</th>
			
        </tr>
</thead>


        
    
    <tbody>
		
        <?PHP
		 while ($contaReceber = array_pop($contas)) {         
        echo "
		    <tr>
					<td >{$contaReceber->getTipo()}</th>
					<td >{$contaReceber->getValor()}</th>
					<td >{$contaReceber->getDtVencimento()}</th>
					<td >{$contaReceber->getDtPagamento()}</th>
					<td >{$contaReceber->getSituacao()}</th>                   
 
		    </tr>
			";
      }
	?>
	</tr>
        ...
    </tbody>
</table>



</body>
<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/dataTables.js"></script>
<script type="text/javascript" src="assets/js/relatorio_contasreceber.js"></script>

</html>