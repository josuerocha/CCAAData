<?PHP
require_once (__DIR__."/../util/autoload.php");
spl_autoload_register("LoadClass");

$observacaoControl = new ObservacaoController();
$observacoes = $observacaoControl->List();
$alunoControl = new PessoaController();

while($observacao = array_pop($observacoes)){
    $aluno = $alunoControl->ListById($observacao->getCodeAluno());
    
    mail($aluno->getEmail(),"CCAA - Acompanhamento",$observacao->getDescricao());
    echo "<script> alert('Email enviado para {$aluno->getEmail()}'); </script>";
}

    echo "<script>	document.location.href = '../Principal/entrada_diario_avaliacoes.php';</script>";

?>