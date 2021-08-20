<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'imprimirMetasCurtoPrazo';
require_once 'controle_servico_meta.php';

if (!isset($_GET['erroImprimir'])) {
    $nome_meta[0]['nome_meta'] = isset($listaMetas[0]['nome_meta']) ? $listaMetas[0]['nome_meta'] : '';
    $nome_meta[0]['valor'] = isset($listaMetas[0]['valor']) ? $listaMetas[0]['valor'] : '';
    $nome_meta[0]['data_fim'] = isset($listaMetas[0]['data_fim']) ? $listaMetas[0]['data_fim'] : '';

    if ($nome_meta[0]['valor'] != NULL) {
        $falta = $nome_meta[0]['valor'] - $_SESSION["saldo"];
        $concluido = $_SESSION["saldo"];
        if ($falta <= 0) {
            $falta = 0;
            $concluido = $nome_meta[0]['valor'];
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Poupe Mais | Meta Curto Prazo</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/main.css">
    <!-- copyright: google chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Despesa', 'Valor Total'],
                ['CONCLUÍDO', <?php echo $concluido ?>],
                ['FALTA', <?php echo $falta ?>],
            ]);

            var options = {
                title: '<?php echo $nome_meta[0]['nome_meta']; ?> | R$ <?php echo $nome_meta[0]['valor']; ?> | Data fim: <?php echo $nome_meta[0]['data_fim']; ?>',
                pieHole: 0.4,
                colors: ['#86128A', '#22b6d4']
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>



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
        <br> Cadastre sua meta curto prazo
    </div>

    <div class="cadrastrarMeta">
        <div class="receita-center">
            <form id="register-form-receita" action="controle_servico_meta.php?acao=inserirMetaCurtoPrazo" method="post" name="logar">

                <div class="full-box">
                    <label class="required" for="name">Nome</label>
                    <input type="text" name="nome_meta" id="nome_meta" placeholder="Digite o nome da meta">
                </div>
                <div class="full-box">
                    <label class="required" for="name">Valor</label>
                    <input type="number" step="0.01" min=0.01 name="valor" id="valor" placeholder="Digite o valor">
                </div>
                <div class="full-box">
                    <label for="name">Data Fim</label>
                    <input type="date" name="data_fim" id="data_fim">
                </div>
                <div class="required" style="padding-left:10px;"> Itens obrigatórios</div>
                <div class="full">
                    <input id="btn-submit" type="submit" value="Enviar dados">
                </div>

            </form>
            <div style="background-color:#D6A913; border-radius:10px;">
                <?php if (isset($_GET['metacadastrada']) && $_GET['metacadastrada'] == 1) { ?>
                    <div class="msgForm">
                        <h5> Meta curto prazo cadastrada com sucesso!</h5>
                    </div>
                <?php } else if (isset($_GET['metacadastrada']) && $_GET['metacadastrada'] == 0) { ?>
                    <div class="msgForm">
                        <h5>Atenção: Não foi possível cadastrar, pois só é permitido cadastrar uma única meta
                            de curto prazo por vez!</h5>
                    </div>
                <?php } else if (isset($_GET['inputEmBranco']) && $_GET['inputEmBranco'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Preencha todos os campos obrigatórios!</h5>
                    </div>
                <?php } else if (isset($_GET['erroCadastrar']) && $_GET['erroCadastrar'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Erro ao cadastrar, tente novamente!</h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if ($nome_meta[0]['valor'] != NULL) { ?>
        <div class="grafico" id="donutchart" style="width: 900px; height: 500px; text-align:center"></div>

        <form id="" action="controle_servico_meta.php?acao=excluirMetaCurtoPrazo" method="post" name="">
            <div style="margin-left:580px;">
                <div class="ful">
                    <input id="btn-submit" type="submit" value="Excluir meta">
                </div>
            </div>
        </form>

    <?php } ?>

    <div class="clear"></div>
    <div class="graficomsg">

        <?php if (isset($_GET['metaexcluida']) && $_GET['metaexcluida'] == 1) { ?>
            <div class="msgForm">
                <h5>Meta excluída com sucesso!!</h5>
            </div><?php }
                if (isset($_GET['erroImprimir']) && $_GET['erroImprimir'] == 1) { ?>
            <div class="msgForm">
                <h5>Erro ao imprimir, tente novamente!</h5>
            </div><?php }
                if (isset($_GET['erroExcluir']) && $_GET['erroExcluir'] == 1) { ?>
            <div class="msgForm">
                <h5>Erro ao excluir, tente novamente!</h5>
            </div> <?php } ?>
    </div>

</body>

</html>