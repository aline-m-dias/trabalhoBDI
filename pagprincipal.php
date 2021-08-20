<?php
if (!isset($_SESSION)) {
	session_start();
}
$acao = 'calcularTotal';
require_once 'controle_servico_despesa.php';
require_once 'controle_servico_receita.php';



$_SESSION["saldo"] = $receitas_totais - $despesas_totais; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Poupe Mais</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/main.css">
</head>

<body>
    <!--
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />-->

	<header class="cabecalho">
		<a class="logo" href="index.php"> <img src="IMG/c58e573f-254b-4987-be09-1f4b1cf7324f.jpg"> </a>
		<div class="botão-sair">
			<ul><a href="controle_servico_logout.php"> Sair </a></ul>
		</div>
	</header>

	<div class="ola">
		<p>Olá, Família <?php echo $_SESSION["nome_familia"]; ?></p>
	</div>

	<div class="receita_despesa">
		<!--
		<form id="botão" action="pessoa.php" method="post" name="pagpessoa">
			<div class="full">
				<input id="btn-submitLogin" type="submit" value="Pessoa">
			</div>
		</form> -->
		<form id="botão" action="receita.php" method="post" name="pagreceita">
			<div class="ful">
				<input id="btn-submitLogin" type="submit" value="Receita">
			</div>
		</form>
		<form id="botão" action="despesa.php" method="post" name="pagdespesa">
			<div class="ful">
				<input id="btn-submitLogin" type="submit" value="Despesa">
			</div>
		</form>
		<form id="botão" action="metaCurtoPrazo.php" method="post" name="pagmetacurto">
			<div class="ful">
				<input id="btn-submitLogin" type="submit" value="Meta Curto Prazo">
			</div>
		</form>
		<form id="botão" action="metaLongoPrazo.php" method="post" name="pagmetalongo">
			<div class="ful">
				<input id="btn-submitLogin" type="submit" value="Meta Longo Prazo">
			</div>
		</form>

	</div>
	<div class="clear"></div>
	<div class="balanco">

		<h1 class="logar"> BALANÇO </h1>
		<div class="centrobalanco">
			<!--- <label for="mes">Selecione o ano/mês</label>
			<select type="month" name="mes" id="mes"> </select> -->
			<h1>Saldo | R$ <?php echo $_SESSION["saldo"] ?></h1>
			<br>
			<h2>Receitas totais | R$ <?php echo $receitas_totais ?></h2>
			<br>
			<h2>Despesas totais | R$ <?php echo $despesas_totais ?></h2>
			<br>
		</div>

</body>

</html>