<?PHP

$observacaoControl = new ObservacaoController();
$observacoes = $control->List();
$alunoControl = new PessoaController();

while($observacao = array_pop($observacoes)){
    $aluno = $alunoControl->ListById($observacao->getCodeAluno());
    
    mail($aluno->getEmail(),"CCAA - Acompanhamento",$observacao->getDescricao());
    echo "<script> alert('Email enviando para $aluno->getEmail()'); </script>";
}

    echo "<script>	document.location.href = '../Principal/entrada_diario_avaliacoes.php';</script>";

?>