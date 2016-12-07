	
	function mostrarResultados(){
		$.ajax({
			type:'POST',
			url:'grafico_comp.php',
			data:'idUsuario='+1,
			
			success:function(dados){
				var valores = eval(dados);

				var quantidades = [];
				var turmas = [];
				cont = 0;
				
				while(cont < valores.length){
					quantidades.push(valores[cont].toString())
					cont++;
					turmas.push(valores[cont].toString())
					cont++;
				}

				var data = {
					labels: turmas,								
					datasets: [
						{
							fillColor: "#F7464A",
							data : quantidades
						}
					]					
				}
				
				var ctx = document.getElementById("areaGrafico").getContext("2d");
				var GraficoTurma = new Chart(ctx).Bar(data, { responsive : true });	

			}
		});
		return false;
	}	