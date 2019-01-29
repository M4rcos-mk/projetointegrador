<!DOCTYPE html>
<html>
<head lang="pt-br">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	<title>Back in Black Discos e Camisas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<?php
		include_once 'menu2.php';
		?>
		<form action="save.php" method="post">
			<td>Nome:</td>
			<input class="form-control margemform" type="text" id="nome" name="nome" placeholder="Digite seu Nome">
			<td>Email:</td>
			<input class="form-control margemform" type="text" id="email" name="email" placeholder="Digite seu E-mail">
			<td>Assunto:</td>
			<input class="form-control margemform" type="text" id="assunto" name="assunto" placeholder="Digite o assunto de sua Mensagem">

			<div class="form-group">
			<td>Mensagem:<td>    		
    		<textarea class="form-control margemform" id="msg" name="msg" placeholder="Digite sua Mensagem" rows="3"></textarea>
  			</div>
  			<input class="btn btn-dark" type="submit" value="Enviar">
		</form>
		
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>