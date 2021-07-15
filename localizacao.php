<?php
include("config.php");
	
if(isset($_POST['email'])){
	extract($_POST);
	$consulta = $conexao->query("SELECT * from tb_usuario where usu_email = '$email' and usu_senha = '$senha'");
	if($resultado = $consulta->fetch_assoc()) {
		$_SESSION['nomeusuario'] = $resultado['usu_nome'];
		$_SESSION['codigousuario'] = $resultado['usu_codigo'];
		header("location: index.php");
	}
	echo "Usuário ou senha inválida";
}

?>
<html>
<head>
	<link rel="stylesheet" href="foto.css">
	
	</head>
<meta charset="utf-8">
<div class="caixafora"id="caixa" style=" left:100px; top:60px; justify-content:center; position:absolute;border-radius: 10px; height:80% ;width:80%; background-color:AliceBlue	" >

<h3 style="margin-bottom:0;color:black ; font-size:50px; border-radius: 10px;height:10% ;width:90%; 	text-align:center"> Localização </h3>
<hr></hr>
<div class="map-responsive z-depth-3">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5987499633993!2d-37.07124298586018!3d-6.445534564819139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7afec3b2216fb6d%3A0xfd0a7ee7ca8257a9!2sIFRN%20Campus%20Caic%C3%B3!5e0!3m2!1spt-BR!2sbr!4v1609972852674!5m2!1spt-BR!2sbr"
		" width="100%" height="365" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<button  style="	border-radius: 5px; position:absolute; top:91%; left:85%; border:none;width:10%; height:7%; 
	background-color:green;color:white;font-size:18px"> <a href="index.php" style="color:white"> Voltar </a>
</button>
</div>
</html>