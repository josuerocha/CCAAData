

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
<script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>


<table id="tabela" class="display" cellspacing="0" width="100%">
<?PHP
$controle = new TurmaController();
$turmas = new Turma();
$idUsuario = $_SESSION["idUsuario"];


$turmas = $controle->listar($idUsuario);

echo "<thead>
<tr class=\"bootgrid-header\"> 
            <th data-column-id=\"Código\" data-type=\"numeric\">Código</th>
            <th data-column-id=\"Nome da turma\">Nome da turma</th>
            <th data-column-id=\"Horario\" data-order=\"desc\">Horario</th>
			<th data-column-id=\"Nível\" data-order=\"desc\">Nível</th>
			<th data-column-id=\"Descricao\" data-order=\"desc\">Descricao</th>
			<th data-column-id=\"commands\" data-formatter=\"commands\" data-sortable=\"false\" </th>
			
        </tr>
</thead>


        
    
    <tbody>
        ";
		
		

	 
		 while ($row = array_pop($turmas)) {
         $id= $row->getIdTurma();
         
        echo "
		    <tr>
            <td>".$row->getIdTurma()."</td>
            <td>".$row->getTurma()."</td>
            <td>".$row->getHorario()."</td>
			<td>".$row->getNivel()."</td>
			<td>".$row->getDescricao()."</td>
			<td>    
			<div class=\"form-inline\">
			       <form id=\"meu_formulario\" action=\"editar_turma.php?id=$id\" method=\"post\">
                   <input class=\"btn btn-primary\" type=\"submit\" value=\"Editar\">
                   </form>
				   
				   <form id=\"meu_formulario\" action=\"helper/TurmaHelper.php?acao=excluir&id=$id\" method=\"post\">
                   <input class=\"btn btn-danger\" type=\"submit\" value=\"Excluir\">
</form>      
                   <form id=\"meu_formulario\" action=\"aluno_view.php?idTurma=$id\" method=\"post\">
                   <input class=\"btn btn-primary\" type=\"submit\" value=\"Alunos\">
</form>           </div> </td>                   
 
		    </tr>
			";
      }



	
		
echo "        </tr>
        ...
    </tbody>
</table>
"













<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>