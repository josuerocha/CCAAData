<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>CCAA--Montagem da Grade de Horário</title>
	<link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">Sobre</a></li>
					<li><a href="courses.html">Cursos</a></li>
          			<li><a href="courses.html">Estude no CCAA</a></li>
          			<li><a href="courses.html">Unidades</a></li>
					<li><a href="price.html">Preços</a></li>
          			<li><a href="courses.html">Convênios</a></li>
          			<li><a href="courses.html">Contato</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Montagem da Grade de Horário</h1>
                </div>
    </header>

    
    <div class="container">
			<div id="coluna_esquerda">&nbsp;
				<h3>Descrição: &nbsp <input type="text" name="desc" size="20"><h3>


				<h3>Professor: &nbsp <select name="prof">
								<option value="prof1">Fulano</option>
								<option value="prof2">Beltrano</option>
								<option value="prof3">Cicrano</option>
								<option value="prof4">Josue</option>
								</select>
				</h3>
		
				<h3>Sala: &nbsp <select name="sala">
								<option value="S1">Sala 1</option>
								<option value="S2">Sala 2</option>
								<option value="S3">Sala 3</option>
								<option value="S4">Sala 4</option>
								</select>
				</h3>
					
				<h3>Idioma: &nbsp <select name="idioma">
								<option value="Ingles">Ingles</option>
								<option value="Frances">Frances</option>
								<option value="Italiano">Italiano</option>
								<option value="Japones">Japones</option>
								</select>
				</h3>
				
			</div>

			<div id="coluna_meio">&nbsp;
				<table>
				
				<tr>
					<th id="gridnome">Aluno</th>


				</tr>

				<tr>
					<th id="Aluno1">Josue</th>&nbsp
					<th><input type="button" name="excluir_aluno1" value="Excluir"></th>
					</tr>
				<tr>
					<th id="Aluno2">Jessica</th>&nbsp
					<th><input type="button" name="excluir_aluno2" value="Excluir"></th>
					</tr>
				</table>
				
			</div>	

				<br/>

			<div id="coluna_direita">
				<h3>Aluno: &nbsp <select name="Aluno">
								<option value="Aluno1">Antonio</option>
								<option value="Aluno2">Jose</option>
								<option value="Aluno3">Jessica</option>
								<option value="Aluno">Josue</option>
								</select>
				</h3>

				<input type="button" name="Add_Aluno" value="Adicionar Aluno">	

				<br/>
				<br/>
				
				<input type="reset">&nbsp 	
				<input type="button" name="salvar_temp" value="Salvar">&nbsp 
				<input type="button" name="cancelar_temp" value="Cancelar">	
				
				&nbsp;
			</div>
			<br/>
			<br/>
			
		<input type="month" name="ano" value= "Ano">

		<br/>
		<br/>

		<table border="2">
				
				<tr>
					<th id="gridhorario">Horário</th>&nbsp
					<th id="gridSeg">Segunda</th>&nbsp
					<th id="gridTer">Terca</th>&nbsp
					<th id="gridQua">Quarta</th>&nbsp
					<th id="gridQui">Quinta</th>&nbsp
					<th id="gridSex">Sexta</th>&nbsp
					<th id="gridSab">Sabado</th>&nbsp
					<th id="gridDom">Domingo</th>&nbsp


				</tr>

				<tr>
					<th id="gridHorario1">07:00</th>&nbsp
					<th id="gridSeg">Segunda</th>&nbsp
					<th id="gridTer">Terca</th>&nbsp
					<th id="gridQua">Quarta</th>&nbsp
					<th id="gridQui">Quinta</th>&nbsp
					<th id="gridSex">Sexta</th>&nbsp
					<th id="gridSab">Sabado</th>&nbsp
					<th id="gridDom">Domingo</th>&nbsp
					
					</tr>
				<tr>
					<th id="gridHorario2">09:00</th>&nbsp
					<th id="gridSeg">Segunda</th>&nbsp
					<th id="gridTer">Terca</th>&nbsp
					<th id="gridQua">Quarta</th>&nbsp
					<th id="gridQui">Quinta</th>&nbsp
					<th id="gridSex">Sexta</th>&nbsp
					<th id="gridSab">Sabado</th>&nbsp
					<th id="gridDom">Domingo</th>&nbsp
					
					</tr>
				</table>
				<br/>
				
				<input type="button" name="Edit_turma" value="Editar Turma">&nbsp 
				<input type="button" name="Excluir_turma" value="Excluir">	


	</div>


<div>
			<br/>
			<br/>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.html">Home</a>| 
								<a href="about.html">Sobre</a>|
								<a href="courses.html">Cursos</a>|
                				<a href="videos.html">Estude no CCAA</a>|
                				<a href="videos.html">Unidades</a>|
                				<a href="price.html">Preços</a>|
                				<a href="price.html">Convênios</a>|
                				<a href="contact.html">Contato</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. 
								<br/>
								Site by <a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
