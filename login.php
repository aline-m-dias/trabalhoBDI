<!DOCTYPE html>
<html>

<head>
	<title>Poupe Mais | Login</title>
	<meta charset="utf-8" />
</head>

<body>

	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

	<header class="cabecalho">
		<a class="logo" href="cadrastrar.html"> <img
				src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
	</header>

	<div class="fundoPretoLogin">
		<br> Faça seu login
	</div>

	

	<div class="fazerLogin">

		<p class="logar">Login</p>

		<form id="register-form" action="controle_servico_usuario.php?acao=logar" method="post" name="logar">

			<div class="full-box">
				<label for="name">Login</label>
				<input type="text" name="login" id="login" placeholder="Digite seu login">
			</div>
			<div class="full-box">
				<label for="name">Senha</label>
				<input type="text" name="senha" id="senha" placeholder="Digite sua senha">
			</div>
			<div class="full-box">
				<input id="btn-submit" type="submit" value="Entrar">
			</div>
			<?php if( isset($_GET['loginnegado']) && $_GET['loginnegado'] == 1 ) { /*verifico se na variavel GET 
			tem inclusão, e se inclusão(variavel de retorno) é igual a 1, se for, apresentar mensagem
			de erro de login*/
			?> 
			<div class="msgErro">
				<h5>Atenção: Login ou senha incorretos!</h5>
			</div>
		<?php } ?>

	</div>

	<div class="clear"></div>
</body>

</html>