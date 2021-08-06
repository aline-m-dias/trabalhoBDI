<?php 
	if(!isset($_SESSION)){
		session_start();
	}	
?>
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
		<a class="logo" href="cadastrar.html"> <img src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
		<button name="button">Sair</button>
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


	<div class="receita">
		<p>Receita</p>
		<div>
			<ul>
				<li> Nome da receita - R$ Valor</li>
			</ul>
			<ul>
				<li> Nome da receita - R$ Valor</li>
			</ul>
			<ul>
				<li> Nome da receita - R$ Valor</li>
			</ul>
		</div>

	</div>

	<div class="despesa">
		<p>Despesa</p>
		<br>
		R$ Valor

	</div>

	<div class="balanco">
		<p>Balanço</p>
		<br>
		R$ Valor

	</div>


	<div class="despesaCategorias">
		<p>Despesa Categorias</p>


	</div>



	<!--
	
	<div class="fundoAzul">
		<br> + Receita - <br>
		<br> + Despesa -
	</div>
	<div class="fundoPreto">
		<br> Metas
		<br> + Metas curto prazo - <br>
		<br> + Metas longo prazo -
	</div>
	<div class="fundoAzul">
		<br> Receita
		<br> Lista de receita
	</div>
	<div class="fundoPreto">
		<br> Despesas
		<br> Valor R$xxx,xxx
	</div>
	<div class="fundoAzul">
		<br> Balanço
		<br> Valor R$xxx,xxx
	</div>
	<div class="fundoPreto">
		<br> Despesas por categorias
	</div>
	<div class="fundoAzul">
		<br> Meta curto prazo
	</div>
	<div class="fundoPreto">
		<br> Meta longo prazo
	</div>
--->


</body>

</html>