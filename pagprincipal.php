<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirSaldo';
require_once 'controle_servico_despesa.php';
require_once 'controle_servico_receita.php';

$saldo = $receitas_totais - $despesas_totais;?>
<!DOCTYPE html>
<html>

<head>
	<title>Poupe Mais</title>
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

	<div id="ola">
		<p>Olá, <?php echo $_SESSION["login"]; ?></p>
	</div>

	<div class="mes">
		<label class="textoReceita" for="mes">Selecione o ano/mês</label>
	</div>

	<div id="receita_despesa">


		<form id="botão" action="pessoa.php" method="post" name="pagpessoa">
			<div>
				<input id="btn-submitLogin" type="submit" value="Pessoa">
			</div>
		</form>
		<form id="botão" action="receita.php" method="post" name="pagreceita">
			<div>
				<input id="btn-submitLogin" type="submit" value="Receita">
			</div>
		</form>
		<form id="botão" action="despesa.php" method="post" name="pagdespesa">
			<div>
				<input id="btn-submitLogin" type="submit" value="Despesa">
			</div>
		</form>
		<form id="botão" action="metaCurtoPrazo.php" method="post" name="pagmetacurto">
			<div>
				<input id="btn-submitLogin" type="submit" value="Meta Curto Prazo">
			</div>
		</form>
		<form id="botão" action="metaLongoPrazo.php" method="post" name="pagmetalongo">
			<div>
				<input id="btn-submitLogin" type="submit" value="Meta Longo Prazo">
			</div>
		</form>

	</div>

	<div class="balanco">
		<p>Saldo | R$ <?php echo $saldo ?></p>
		<br>
		<p>Receitas totais | R$ <?php echo $receitas_totais ?></p>
		<br>
		<p>Despesas totais | R$ <?php echo $despesas_totais ?></p>
		<br>
	</div>

</body>

</html>