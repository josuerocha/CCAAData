
$('#editarform').submit(function(event){
    
	event.preventDefault(); // if you want to disable the action
	var $form = $(this),
	codigoValue = $form.find('input[name="code"]').val(),
	type = $form.attr('method'),
	url = $form.attr('action');

	var posting = $.post(url,{code: codigoValue},function(data,status){
			if(status == 'success'){
				var contaEditar = JSON.parse(data);
                alert('oi');
                //alert(contaEditar.code);
            }
        }
		);
});