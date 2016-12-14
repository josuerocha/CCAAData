<?php


class ReceitaController {

    private $spenditures;
    private $earnings;
    private $profit;

    function __construct(){
        $this->spenditures = 0;
        $this->earnings = 0;
        $this->profit = 0;
    }

    function CalculateProfit() {
        $contaPagarControl = new ContaPagarController();
        $contaReceberControl = new ContaReceberController();
        $presencaProfessorControl = new PresencaController();
        $pessoaControl = new PessoaController();

        $contasPagar = $contaPagarControl->ListAll();

        while($contaPagar = array_pop($contasPagar)){
            $this->spenditures += $contaPagar->getValor();

        }

        $contasReceber = $contaReceberControl->ListAll();

        while($contaReceber = array_pop($contasReceber)){
            if($contaReceber->getSituacao() == "quitado"){
                $this->earnings += $contaReceber->getValor();
            }
        }

        $presencas = $presencaProfessorControl->ListAll();

        while($presenca = array_pop($presencas)){
            $professor = $pessoaControl->getByCode($presenca->getCodePessoa());

            $this->spenditures += $professor->getHoraAula();
        }

        $this->profit = $this->earnings - $this->spenditures; 
    }

    function getSpenditures(){
        return $this->spenditures;
    }

    function getEarnings(){
        return $this->earnings;
    }

    function getProfit(){
        return $this->profit;
    }
      
}
?> 
