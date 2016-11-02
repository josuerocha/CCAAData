				$('#loginForm').submit(function(event)
				{	
					event.preventDefault(); // if you want to disable the action
					var $form = $(this),
					emailValue = $form.find('input[name="email"]').val(),
					senhaValue = $form.find('input[name="senha"]').val(),
					type = $form.attr('method'),
					url = $form.attr('action');

					var posting = $.post(url,{email: emailValue, senha: senhaValue},function(data,status){
							if(status == 'success'){
									$("#result").empty().append(data);
								}
							}
						);
				});