$('#formCadastro').submit(function(event){	
	event.preventDefault(); // if you want to disable the action
	var $form = $(this),
	tipoValue = document.getElementById('contatipo').value,
	type = $form.attr('method'),
	url = $form.attr('action');
    alert(tipoValue);
	var posting = $.post(url,{contatipo: tipoValue},function(data,status){
			if(status == 'success'){
					$("#conteudo").empty().append(data);
				}
			}
		);
});

$('#formDelete').submit(function(event){	
	event.preventDefault(); // if you want to disable the action
	var $form = $(this),
	deleteCodeValue = document.getElementById('deleteCode').value,
	type = $form.attr('method'),
	url = $form.attr('action');
    alert(tipoValue);
	var posting = $.post(url,{deleteCode: deleteCodeValue},function(data,status){
			if(status == 'success'){
					$("#conteudo").empty().append(data);
				}
			}
		);
});