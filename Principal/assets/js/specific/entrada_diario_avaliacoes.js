//$(document).ready(function() {
//    $('#example').DataTable();
//} );

/*
$('#tabelaNotas').submit(function(event)
{	
    event.preventDefault(); // if you want to disable the action
    var form = document.getElementById('#tabelaNotas'),
    type = $form.attr('method'),
    url = $form.attr('action');
    length = $form.find('input[name="qtd"]').val();


        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'codigo[]' + i + final;
        var $codigoValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaFinal[]' + i + final;
        var $notaFinalValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaMid[]' + i + final;
        var $notaMidValue = $form.find(pesquisa).val();

        var inicio = 'input[name="';
        var final = '"]';
        var pesquisa = inicio + 'notaOral[]' + i + final;
        var $notaOralValue = $form.find(pesquisa).val();

    var posting = $.post(url,{'Codigos[]' : codigos, 'notasFinais[]' : notasFinais, 'notasMid[]' : notasMid, 'notasOrais[]' : $notasOrais},function(data,status){
            if(status == 'success'){
                    alert('Registros salvos com sucesso!!');
            }
        }
        );
        alert('FUNFA :D');
});
*/