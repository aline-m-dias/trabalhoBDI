<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirPessoas';
require_once 'controle_servico_pessoa.php';

$nome_pessoa = $listaPessoas;
$i = isset($i) ? 0 : 0;
for ($i = 0; $i < count($nome_pessoa); $i++) {
    $nome_pessoa[$i]['nome_pessoa'] = isset($listaPessoas[$i]['nome_pessoa']) ? $listaPessoas[$i]['nome_pessoa'] : $listaPessoas[$i]['nome_pessoa'];
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Cadastro pessoa</title>
    <meta charset="utf-8" />
</head>

<body>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <header class="cabecalho">
        <a class="logo" href="pagprincipal.php"> <img src="IMG/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="controle_servico_logout.php"> Sair </a></ul>
        </div>
    </header>

    <div class="clear"></div>

    <div class="ola">
        <p>Olá, Família <?php echo $_SESSION["nome_familia"]; ?></p>
    </div>
    <div class="receita_despesa">

        <form id="botão" action="pessoa.php" method="post" name="pagpessoa">
            <div class="full">
                <input id="btn-submitLogin" type="submit" value="Pessoa">
            </div>
        </form>
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

    <div class="fundoPretoLogin">
        <br> Cadastre uma pessoa
    </div>

    <div class="cadrastrarDespesa">
        <div class="receita-center">
            <form id="register-form" action="controle_servico_pessoa.php?acao=inserirPessoa" method="post" name="logar">
                <div class="full-box">
                    <label class="required" for="name">Nome</label>
                    <input type="text" name="nome_pessoa" id="nome" placeholder="Digite o nome completo">
                </div>
                <div class="full-box">
                    <label class="required" for="name">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF (apenas números)">
                </div>
                <div class="full-box">
                    <label for="name">Parentesco</label>
                    <input type="text" name="parentesco" id="parentesco" placeholder="Digite o parentesco">
                </div>
                <div class="full-box">
                    <label for="name">Data</label>
                    <input type="date" name="data_nasc" id="data">
                </div>
                <div class="required" style="padding-left:10px;"> Itens obrigatórios</div>
                <div class="full">
                    <input id="btn-submit" type="submit" value="Enviar dados">
                </div>

            </form>
            <div style="background-color:#D6A913; border-radius:10px;">
                <?php if (isset($_GET['pessoacadastrada']) && $_GET['pessoacadastrada'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Pessoa cadastrada com sucesso!</h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="pessoacadastrada">
        <div>
            <p class="logar">Pessoas cadastradas</p>
            <div class="centro">
                <?php
                $i = isset($i) ? 0 : 0;
                for ($i = 0; $i < count($nome_pessoa); $i++) { ?>
                    <div class="espacopessoa"><?php echo $nome_pessoa[$i]['nome_pessoa']; ?></div>
                <?php } ?>
            </div>
</body>

</html>