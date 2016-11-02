$('#tabelaNotas').submit(function(event)
{	
    event.preventDefault(); // if you want to disable the action
    var codigos = new Array();
    var notasFinais = new Array();
    var notasMid = new Array();
    var notasOrais = new Array();
    var form = $(this),
    type = $form.attr('method'),
    url = $form.attr('action');
    length = $form.find('input[name="qtd"]').val();

    for (i = 1; i < length; i++){

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'codigo' + i + final;
        var $codigoValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaFinal' + i + final;
        var $notaFinalValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaMid' + i + final;
        var $notaMidValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaOral' + i + final;
        var $notaOralValue = $form.find(pesquisa).val();

        $codigos.push($codigoValue);
        $notasFinais.push($notaFinalValue);
        $notasMid.push($notaMidValue);
        $notasOrais.push($notaOralValue);

    }

    var posting = $.post(url,{'Codigos[]' : codigos, 'notasFinais[]' : notasFinais, 'notasMid[]' : notasMid, 'notasOrais[]' : $notasOrais},function(data,status){
            if(status == 'success'){
                    alert('Registros salvos com sucesso!!');
            }
        }
        );
        alert('FUNFA :D');
});