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
	<link rel="stylesheet" href="CSS/main.css">
</head>

<body>

	<header class="cabecalho">
		<a class="logo" href="index.php"> <img src="IMG/c58e573f-254b-4987-be09-1f4b1cf7324f.jpg"> </a>
	</header>

	<div class="fundoPretoLogin">
		<br> Faça seu login
	</div>

	<div class="fazerLogin">

		<p class="logar">Login</p>

		<div class="login-center">
			<form id="register-form" action="controle_servico_usuario.php?acao=logar" method="post" name="logar">

				<div class="full-box">
					<label class="required" for="name">Login</label>
					<input type="text" name="login" id="login" placeholder="Digite seu login">
				</div>
				<div class="full-box">
					<label class="required" for="name">Senha</label>
					<input type="text" name="senha" id="senha" placeholder="Digite sua senha">
				</div>
				<div class="required" style="padding-left:10px;"> Itens obrigatórios</div>
				<div class="full">
					<input id="btn-submit" type="submit" value="Entrar">
				</div>

			</form>
			<div style="background-color:#D6A913; border-radius:10px;">
				<?php if (isset($_GET['loginnegado']) && $_GET['loginnegado'] == 1) { ?>
					<div class="msgForm">
						<h5>Atenção: Login ou senha incorretos!</h5>
					</div>
				<?php }
				if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
					<div class="msgForm">
						<h5>Erro ao logar, tente novamente!</h5>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="clear"></div>
</body>

</html>