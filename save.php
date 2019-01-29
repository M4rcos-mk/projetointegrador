<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Back in Black Discos e Camisas</title>
</head>
<body>
	<?php

	date_default_timezone_set("america/sao_paulo");

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$assunto = $_POST ["assunto"];
	$msg = $_POST ["msg"]; 

 	$sql = "insert into cliente values( null, null,'".$nome."','".$email."','".$assunto."','".$msg."', 'ativo')";

 	
 	include_once 'db.php';
 	if(mysqli_query($con, $sql)){
 		$msg = "Mensagem enviada!";

	 } else {
	 $msg = "Erro ao enviar mensagem.";

	} mysqli_close($con);
	echo"<script>alert('".$msg."');location.href='index.php';</script>";
        
        
        
  ?>

</body>
</html>