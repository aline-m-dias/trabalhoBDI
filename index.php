<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Poupe Mais | Cadastrar</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale 1">
</head>

<body>

	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

	<header class="cabecalho">
		<a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
	</header>

	<div class="fundoPretoCadastro">
		<br> Organize os gastos da sua
		<br> família de forma fácil

		<div class="frase">
			<p> A educação financeira que a sua família precisa para conquistarem seus objetivos!</p>
		</div>
	</div>

	<div class="cadastro">

		<p class="cadastrar">CADASTRE-SE</p>

		<form id="register-form" action="controle_servico_usuario.php?acao=inserirUsuario" method="post" name="cadastro">

			<div class="full-box">
				<label for="name">Login*</label>
				<input type="text" name="login" id="login" placeholder="Digite seu nome" >
			</div>
			<div class="full-box">
				<label for="name">Nome da Família*</label>
				<input type="text" name="nome_familia" id="name_familia" placeholder="Digite o nome da família">
			</div>
			<div class="full-box">
				<label for="name">Quantidade de Pessoas*</label>
				<input type="text" name="qtd_pessoas" id="qtd_pessoas" placeholder="Digite o número de pessoas" >
			</div>
			<div class="full-box">
				<label for="name">Senha*</label>
				<input type="password" name="senha" id="senha" placeholder="Digite sua senha">
			</div>
			<div class="full-box">
				<label for="passconfirmation">Confirmação de senha</label>
				<input type="password" name="passconfirmation" id="passwordconfirmation" placeholder="Digite novamente sua senha" >
			</div>
			<div class="full">
				<input id="btn-submit" type="submit" value="Cadastre-se">
			</div>
			<div>* Itens obrigatórios</div>
		</form>

		<?php if (isset($_GET['inputEmBranco']) && $_GET['inputEmBranco'] == 1) { ?>
			<div class="msgForm">
				<h5>Preencha todos os campos obrigatórios</h5>
			</div> 
		<?php } if (isset($_GET['usuarioexistente']) && $_GET['usuarioexistente'] == 1) { ?>
			<div class="msgForm">
				<h5>Usuário existente já, escolha um outro login</h5>
			</div>
		<?php }	if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
			<div class="msgForm">
				<h5>Erro ao cadastrar, tente novamente!!</h5>
			</div>
		<?php }	?>

		<form id="register-form" action="login.php" method="post" name="logar">
			<div class="login">
				Já tem cadastro?
				<div class="full">
					<input id="btn-submit" type="submit" value="Login">
				</div>
			</div>
		</form>

	</div>

	<script src="JS/scripts.js"></script>

</body>

</html>