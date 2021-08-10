<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirMetasLongoPrazo';
require_once 'controle_servico_meta.php';

$nome_meta = $listaMetas;
$i = isset($i) ? 0 : 0;
for ($i = 0; $i < count($nome_meta); $i++) {
    $nome_meta[$i]['nome_meta'] = isset($listaMetas[$i]['nome_meta']) ? $listaMetas[$i]['nome_meta'] : $listaMetas[$i]['nome_meta'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Meta Longo Prazo</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="IMG/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="pagprincipal.php"> Sair </a></ul>
        </div>
    </header>

    <div class="clear"></div>

    <div class="ola">
        <p>Olá, <?php echo $_SESSION["login"]; ?></p>
    </div>
    <div class="fundoPretoLogin">
        <br> Cadastre sua meta longo prazo
    </div>

    <div class="cadrastrarMeta">



        <form id="register-form-receita" action="controle_servico_meta.php?acao=inserirMetaLongoPrazo" method="post" name="logar">
            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome_meta" id="nome_meta" placeholder="Digite o nome da meta">
            </div>
            <div class="full-box">
                <label for="name">Valor</label>
                <input type="number" step="0.01" min=0 name="valor" id="valor" placeholder="Digite o valor">
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
                <h5>Atenção: Meta Longo Prazo cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>

    <div class="clear"></div>
    <div class="metas">
        <div>
            <p class="logar">Metas longo prazo cadastradas</p>
            <div>
                <?php
                $i = isset($i) ? 0 : 0;
                for ($i = 0; $i < count($nome_meta); $i++) { ?>
                    <div>
                        <span><?php echo $nome_meta[$i]['nome_meta']; ?></span>
                        <span> | R$ <?php echo $nome_meta[$i]['valor']; ?></span>
                    </div>
                <?php } ?>
            </div>
</body>

</html>