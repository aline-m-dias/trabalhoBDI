<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirMetasLongoPrazo';
require_once 'controle_servico_meta.php';

$nome_meta[0]['nome_meta'] = isset($listaMetas[0]['nome_meta']) ? $listaMetas[0]['nome_meta'] : '';
$nome_meta[0]['valor'] = isset($listaMetas[0]['valor']) ? $listaMetas[0]['valor'] : '';


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
            <div class="full">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['metacadastrada']) && $_GET['metacadastrada'] == 1) { ?>
            <div class="msgForm">
                <h5>Meta Longo Prazo cadastrada com sucesso!</h5>
            </div>
        <?php } else if (isset($_GET['metacadastrada']) && $_GET['metacadastrada'] == 0) { ?>
            <div class="msgForm">
                <h5>Atenção: Não foi possível cadastrar, pois só é permitido cadastrar uma única meta
                    de longo prazo por vez!</h5>
            </div>
        <?php } ?>
    </div>

    <div class="clear"></div>

    <?php if ($nome_meta[0]['valor'] != NULL) {
        $falta = $nome_meta[0]['valor'] - $_SESSION["saldo"];
        $concluido = $_SESSION["saldo"];
        if ($falta <= 0) {
            $falta = 0;
            $concluido = $nome_meta[0]['valor'];
        }
        $porcentagem = ($concluido / $nome_meta[0]['valor']) * 100;
        $porcentagem = number_format($porcentagem, 2, '.', '');
    ?>
        <div class="metas">
            <div>
                <p class="logar"><?php echo $nome_meta[0]['nome_meta']; ?></p>
                <div>
                    <div>
                        <h2> Valor para atingir: R$ <?php echo $nome_meta[0]['valor']; ?></h2>
                        <h2> Já concluído: R$ <?php echo $concluido; ?></h2>
                        <h2> Porcentagem de conclusão: <?php echo $porcentagem; ?> %</h2>
                        <form id="" action="controle_servico_meta.php?acao=excluirMetaLongoPrazo" method="post" name="">
                            <div class="full">
                                <input id="btn-submit" type="submit" value="Excluir meta">
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
    <?php if (isset($_GET['metaexcluida']) && $_GET['metaexcluida'] == 1) { ?>
            <div class="msgForm">
                <h5>Meta excluída com sucesso!!</h5>
            </div>
    <?php } ?>
</body>

</html>