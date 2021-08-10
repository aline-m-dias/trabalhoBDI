<?php
if (!isset($_SESSION)) {
	session_start();
}
?>

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
		<a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
		<div class="botão-sair">
            <ul><a href="index.php"> Sair </a></ul>
        </div>
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
		</form>
		<?php if (isset($_GET['loginnegado']) && $_GET['loginnegado'] == 1) { ?>
			<div class="full-box">
				<h5>Atenção: Login ou senha incorretos!</h5>
			</div>
		<?php } ?>
	</div>

	<div class="clear"></div>
</body>

</html>