<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['pesquisaDespesa']) && $_GET['pesquisaDespesa'] == 1) {
    $acao = 'imprimirDespesas';
    require_once 'controle_servico_despesa.php';

    $nome_despesa = $listaDespesas;
    $i = isset($i) ? 0 : 0;
    for ($i = 0; $i < count($nome_despesa); $i++) {
        $nome_despesa[$i]['nome'] = isset($listaDespesas[$i]['nome']) ?  $listaDespesas[$i]['nome'] : $listaDespesas[$i]['nome'];
        $nome_despesa[$i]['valor'] = isset($listaDespesas[$i]['valor']) ?  $listaDespesas[$i]['valor'] : $listaDespesas[$i]['valor'];
        $nome_despesa[$i]['data_desp'] = isset($listaDespesas[$i]['data_desp']) ?  $listaDespesas[$i]['data_desp'] : $listaDespesas[$i]['data_desp'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Despesa</title>
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
        <br> Cadastre sua despesa
    </div>

    <div class="cadrastrarDespesa">

        <p class="logar">Despesa</p>

        <form id="register-form-despesa" action="controle_servico_despesa.php?acao=inserirDespesa" method="post" name="logar">
            <div class="full-box">
                <label for="name">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome">
            </div>
            <div class="full-box">
                <label for="name">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" placeholder="Digite o valor">
            </div>
            <div class="full-box">
                <label for="name">Categorias</label>
                <select name='tipo'>
                    <option value="--">--</option>
                    <option value="Alimentação">Alimentação</option>
                    <option value="Saúde">Saúde</option>
                    <option value="Educação">Educação</option>
                    <option value="Moradia">Moradia</option>
                    <option value="Transporte">Transporte</option>
                    <option value="Diversos">Diversos</option>
                </select>
            </div>
            <div class="full-box">
                <label for="name">Data</label>
                <input type="date" name="data_desp" id="data_desp">
            </div>

            <div class="full-box">
                <input id="btn-submit" type="submit" value="Enviar dados">
            </div>
        </form>
        <?php if (isset($_GET['despesacadastrada']) && $_GET['despesacadastrada'] == 1) { ?>
            <div class="full-box">
                <h5>Despesa cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>

    <div class="cadrastrarDespesa">
        <div>
            <p class="logar">Pesquise despesas cadastradas</p>
            <div>

                <form action="despesa.php?pesquisaDespesa=1" method="post" name="logar">
                    <div class="full-box">
                        <label for="name">Categorias</label>
                        <select name='tipo'>
                            <option value="--">Selecione a categoria</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Moradia">Moradia</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Diversos">Diversos</option>
                        </select>
                    </div>
                    <div class="full-box">
                        <input id="btn-submit" type="submit" value="Pesquisar">
                    </div>
                </form>
            </div>

            <div class="despesas">
                <?php
                if (isset($_GET['pesquisaDespesa']) && $_GET['pesquisaDespesa'] == 1) { ?>
                    <div>
                        <p class="logar">Despesas cadastradas </p>
                        <div>
                            <?php
                            $i = isset($i) ? 0 : 0;
                            for ($i = 0; $i < count($nome_despesa); $i++) { ?>
                                <div>
                                    <span><?php echo $nome_despesa[$i]['nome']; ?></span>
                                    <span> | R$ <?php echo $nome_despesa[$i]['valor']; ?></span>
                                    <span> | <?php echo $nome_despesa[$i]['data_desp']; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
</body>

</html>