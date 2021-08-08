<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Receita</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
    </header>

    <div id="ola">
        <p>Olá, <?php echo $_SESSION["login"]; ?></p>
    </div>

    <div class="fundoPretoReceita">
        <br> Cadastre sua receita
    </div>

    <div class="cadastrarReceita">

        <p class="logar">Receita</p>

        <form id="register-form-receita" action="controle_servico_receita.php?acao=inserirReceita" method="post" name="logar">
            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite a descrição da receita">
            </div>
            <div class="full-box">
                <label for="name">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Data</label>
                <input type="date" name="data_rec" id="data_rec">
            </div>
            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['receitacadastrada']) && $_GET['receitacadastrada'] == 1) { ?>
            <div class="full-box">
                <h5>Receita cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>

    <div class="clear"></div>
</body>

</html>