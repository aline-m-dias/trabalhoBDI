<?php 
	if(!isset($_SESSION)){
		session_start();
	}	
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Meta Curto Prazo</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="cadrastrar.html"> <img src="IMG/WhatsApp_Image_2021-07-26_at_15.21.39-removebg-preview.png"> </a>
    </header>

    <div id="ola">
		<p>Olá, <?php echo $_SESSION["login"]; ?></p>
	</div>

    <div class="fundoPretoReceita">
        <br> Cadastre sua meta curto prazo
    </div>

    <div class="cadrastrarMeta">

        <p class="logar">Meta curto prazo</p>

        <form id="register-form-receita" action="controle_servico_meta.php?acao=inserirMetaCurtoPrazo" method="post" name="logar">

            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome_meta" id="nome_meta" placeholder="Digite o nome da meta">
            </div>
            <div class="full-box">
                <label for="name">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Data Fim</label>
                <input type="date" name="data_fim" id="data_fim">
            </div>
            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['metacadastrada']) && $_GET['metacadastrada'] == 1) { ?>
			<div class="full-box">
				<h5>Atenção: Meta Curto Prazo cadastrada com sucesso!</h5>
			</div>
		<?php } ?>

    </div>

    <div class="clear"></div>
</body>

</html>