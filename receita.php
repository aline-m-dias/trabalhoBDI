<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirReceitas';
require_once 'controle_servico_receita.php';

if (!isset($_GET['erroImprimir'])) {
    $nome_receita = $listaReceitas;
    $i = isset($i) ? 0 : 0;
    for ($i = 0; $i < count($nome_receita); $i++) {
        $nome_receita[$i]['nome'] = isset($listaReceitas[$i]['nome']) ?  $listaReceitas[$i]['nome'] : $listareceitas[$i]['nome'];
        $nome_receita[$i]['valor'] = isset($listaReceitas[$i]['valor']) ?  $listaReceitas[$i]['valor'] : $listareceitas[$i]['valor'];
        $nome_receita[$i]['data_rec'] = isset($listaReceitas[$i]['data_rec']) ?  $listaReceitas[$i]['data_rec'] : $listareceitas[$i]['data_rec'];
        $nome_receita[$i]['codigo'] = isset($listaReceitas[$i]['codigo']) ?  $listaReceitas[$i]['codigo'] : $listareceitas[$i]['codigo'];
    }
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Receita</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/main.css">

    <script>
        function acao(codigo) {
            location.href = 'controle_servico_receita.php?acao=excluirReceita&codigo=' + codigo;
        }
    </script>
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

    <div class="clear"></div>

    <div class="ola">
        <p>Olá, Família <?php echo $_SESSION["nome_familia"]; ?></p>
    </div>
    <div class="receita_despes">
        <form id="botão" action="pagprincipal.php" method="post" name="pagprincipal">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="Página principal">
            </div>
        </form>
        <!--
        <form id="botão" action="pessoa.php" method="post" name="pagpessoa">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="Pessoa">
            </div>
        </form>-->
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
        <br> Cadastre sua receita
    </div>

    <div class="cadrastrarReceita">

        <div class="receita-center">
            <form id="register-form-receita" action="controle_servico_receita.php?acao=inserirReceita" method="post" name="logar">
                <div class="full-box">
                    <label class="required" for="name">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite a descrição da receita">
                </div>
                <div class="full-box">
                    <label class="required" for="name">Valor</label>
                    <input type="number" step="0.01" min=0.01 name="valor" id="valor" placeholder="Digite o valor">
                </div>
                <div class="full-box">
                    <label for="name">Data</label>
                    <input type="date" name="data_rec" id="data_rec">
                </div>
                <div class="required" style="padding-left:10px;"> Itens obrigatórios</div>
                <div class="full">
                    <input id="btn-submit" type="submit" value="Enviar dados">
                </div>
            </form>
            <div style="background-color:#D6A913; border-radius:10px;">
                <?php if (isset($_GET['receitacadastrada']) && $_GET['receitacadastrada'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Receita cadastrada com sucesso!</h5>
                    </div>
                <?php } else if (isset($_GET['erroCadastro']) && $_GET['erroCadastro'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Erro ao cadastrar, tente novamente!</h5>
                    </div>
                <?php } else if (isset($_GET['inputEmBranco']) && $_GET['inputEmBranco'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Preencha todos os campos obrigatórios!</h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="receitas">
        <div>
            <p class="logar">Receitas cadastradas</p>
            <div class="centro">
                <?php
                $i = isset($i) ? 0 : 0;
                for ($i = 0; $i < count($nome_receita); $i++) { ?>
                    <div class="espaco">
                        <span style="padding-right:5px"> | Descrição:<?php echo $nome_receita[$i]['nome']; ?></span>
                        <span style="padding-right:5px"> | R$ <?php echo $nome_receita[$i]['valor']; ?></span>
                        <span style="padding-right:5px"> | Data: <?php echo $nome_receita[$i]['data_rec']; ?></span>
                        <div style="float:right; margin-top:-26px; margin-right:30px; padding-top:20px;  ">
                            <input id="btn-submit" onclick="acao(<?php echo $nome_receita[$i]['codigo'] ?>)" type="submit" value="Excluir">
                        </div>
                    <?php } ?>
                    </div>

                    <?php
                    if (isset($_GET['receitaexcluida']) && $_GET['receitaexcluida'] == 1) { ?>
                        <div class="msgForm">
                            <h5>Receita excluída com sucesso!!</h5>
                        </div> <?php }
                            if (isset($_GET['erroImprimir']) && $_GET['erroImprimir'] == 1) { ?>
                        <div class="msgForm">
                            <h5>Erro ao imprimir, tente novamente!</h5>
                        </div><?php }
                            if (isset($_GET['erroExcluir']) && $_GET['erroExcluir'] == 1) { ?>
                        <div class="msgForm">
                            <h5>Erro ao excluir, tente novamente!</h5>
                        </div> <?php } ?>

            </div>
        </div>
    </div>
</body>

</html>