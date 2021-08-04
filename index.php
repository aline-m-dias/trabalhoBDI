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
		<a class="logo" href="cadastrar.html"> <img
				src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
	</header>

	<div class="fundoPretoCadastro">
		<br> Organize os gastos da sua
		<br> família de forma fácil

		<div class="frase">
			<p> A educação financeira que a sua família precisa para conquistarem seus objetivos!</p>
		</div>
	</div>

	<div class="cadastro">

		<p class="cadastrar">Cadastre-se</p>

		<form id="register-form" action="controle_servico_usuario.php?acao=inserirUsuario" method="post" name="cadastro">

			<div class="full-box">
				<label for="name">Nome</label>
				<input type="text" name="login" id="name" placeholder="Digite seu nome">
			</div>
			<div class="full-box">
				<label for="name">Nome da Família</label>
				<input type="text" name="nome_familia" id="nameFamília" placeholder="Digite o nome da família">
			</div>
			<div class="full-box">
				<label for="name">Quantidade de Pessoas</label>
				<input type="text" name="qtd_pessoas" id="quantidadeFamília"
					placeholder="Digite o número de pessoas">
			</div>
			<div class="full-box">
				<label for="name">Senha</label>
				<input type="password" name="senha" id="password" placeholder="Digite sua senha">
			</div>
			<div class="full-box">
				<label for="passconfirmation">Confirmação de senha</label>
				<input type="password" name="passconfirmation" id="passwordconfirmation"
					placeholder="Digite novamente sua senha">
			</div>
			<div>
				<input type="checkbox" name="agreement" id="agreement">
				<label for="agreement" id="agreement-label"> Concordo em enviar meus dados</label>
			</div>
			<div class="full-box">
				<input id="btn-submit" type="submit" value="Cadastre-se">
			</div>
		</form>
		<form id="register-form" action="login.php" method="post" name="logar">
			<div class="login">
				Já tem cadastro?
				<input id="btn-submitLogin" type="submit" value="Login" >
			</div>
		</form>

	</div>


	<script src="JS/scripts.js"></script>

</body>

</html>