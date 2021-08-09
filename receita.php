<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirReceitas';
require_once 'controle_servico_receita.php';

$nome_receita = $listaReceitas;
$i = isset($i) ? 0 : 0;
for ($i = 0; $i < count($nome_receita); $i++) {
    $nome_receita[$i]['nome'] = isset($listaReceitas[$i]['nome']) ?  $listaReceitas[$i]['nome'] : $listareceitas[$i]['nome'];
    $nome_receita[$i]['valor'] = isset($listaReceitas[$i]['valor']) ?  $listaReceitas[$i]['valor'] : $listareceitas[$i]['valor'];
    $nome_receita[$i]['data_rec'] = isset($listaReceitas[$i]['data_rec']) ?  $listaReceitas[$i]['data_rec'] : $listareceitas[$i]['data_rec'];
}
/*$tam = count( $listaReceitas);
    echo $tam;
    echo '<prep>';
    print_r( $listaReceitas);
    echo '</prep>'; */ ?>

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

    <div class="clear"></div>

    <div id="ola">
        <p>Olá, <?php echo $_SESSION["login"]; ?></p>
    </div>

    <div class="fundoPretoLogin">
        <br> Cadastre sua receita
    </div>

    <div class="cadrastrarDespesa">

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
    <div class="receitas">
        <div>
            <p class="logar">Receitas cadastradas</p>
            <div>
                <?php
                $i = isset($i) ? 0 : 0;
                for ($i = 0; $i < count($nome_receita); $i++) { ?>
                    <div>
                        <span><?php echo $nome_receita[$i]['nome']; ?></span>
                        <span> | R$ <?php echo $nome_receita[$i]['valor']; ?></span>
                        <span> | <?php echo $nome_receita[$i]['data_rec']; ?></span>
                    </div>
                <?php } ?>
            </div>
</body>

</html>